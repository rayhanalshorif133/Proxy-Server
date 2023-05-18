<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\History;
use App\Models\Location;
use App\Models\StoreProxy;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;


class ProxyController extends Controller
{
    // Admin

    public function index()
    {
        $histories = History::select('id','username','password','user_id','porxy_ip','porxy_port','porxy_time','service','location','status','created_at')
            ->with('user')
            ->orderBy('created_at', 'desc')
            ->get();
        return view('proxy.index', compact('histories'));
    }

    
    public function locationIndex()
    {
        $locations = Location::select()
            ->orderBy('created_at', 'desc')
            ->get();
        return view('proxy.location', compact('locations'));
    }
    public function locationStoreOrUpdate(Request $request)
    {
        $request->code = strtoupper($request->code);
        if($request->location_id){
            $location = Location::find($request->location_id);
        }else{
            $search = Location::where('code',$request->code)->first();
            if($search){
                return $this->respondWithSuccessWeb('The Location is already added.', redirect()->back(),'danger');
            }
            $location = new Location();
        }
        $location->code = $request->code;
        if($request->name){
            $location->name = $request->name;
        }else{
            $location->name = $request->code;
        }
        $location->name = ucfirst(strtolower($location->name));
        $location->save();
        return $this->respondWithSuccessWeb('The Location is added successfully.', redirect()->back(),'success');
    }
    public function locationDelete($id)
    {
        $location = Location::find($id);
        if($location){
            $location->delete();
            return $this->respondWithSuccess('The Location was deleted successfully.');
        }else{
            return $this->respondWithError('The Location was not found.');
        }
    }


    public function delete($id)
    {
        $history = History::find($id);
        if($history){
            $history->delete();
            return $this->respondWithSuccess('The Proxy was deleted successfully.');
        }else{
            return $this->respondWithError('The Proxy was not found.');
        }
    }

    // User or Web Panel
    public function getProxyByCountry(Request $request)
    {
       
        $proxys = [];
        $proxy_ids = [];
        $history_proxy_ids = [];
        $counts = (int)$request->time_count;

        $histories = History::all();
        foreach ($histories as $history) {
            array_push($history_proxy_ids, $history->porxy_ip);
        }

        for ($i=1; $i <= $counts; $i++) { 
            if(count($proxy_ids) > 0){
                $proxy = StoreProxy::whereNotIn('proxy_address', $proxy_ids)
                    ->whereNotIn('proxy_address', $history_proxy_ids)
                    ->where('country_code',$request->location)
                    ->first();
            }else{
                $proxy = StoreProxy::where('country_code',$request->location)
                    ->whereNotIn('proxy_address', $history_proxy_ids)
                    ->first();
            }
             if($proxy){
                $this->setHistory($proxy,$request);
                array_push($proxys, $proxy);
                array_push($proxy_ids, $proxy->proxy_address);
             }
        }
        return $this->respondWithSuccess("data", $proxys);
    }
    
    public function setHistory($proxy,$request){
        $history = new History();
        $history->user_id = auth()->user()->id;
        $history->porxy_ip = $proxy->proxy_address;
        $history->porxy_port = $proxy->port;
        $history->service = $request->service;
        $history->location = $proxy->city_name . ' (' . $proxy->country_code . ')';
        $history->porxy_time = $request->time;
        $history->username = $proxy->username;
        $history->password = $proxy->password;
        $history->save();
        return true;
    }

    public function history(){
        $today = date("Y-m-d");
        $previousDay = date('Y-m-d', strtotime('-1 day'));
        $histories = History::select('id','user_id','porxy_ip','porxy_port','porxy_time','service','location','created_at','username','password')
            ->where('user_id',auth()->user()->id)
            ->whereDate('created_at', $today)
            ->orWhereDate('created_at', $previousDay)
            ->with('user')
            ->orderBy('created_at', 'desc')
            ->get();
        return view('public.proxy.history',compact('histories'));
    }

    public function storeProxy(Request $request)
    {
        $history = new History();
        $history->user_id = auth()->user()->id;
        $history->porxy_ip = $request->ip;
        $history->porxy_port = $request->port;
        $history->service = $request->service;
        $history->location = $request->location;
        $history->porxy_time = $request->time;
        $history->save();
        return $this->respondWithSuccess('The Proxy was received successfully.',$history);
    }


    public function checkProxy()
    {
        $auth = auth()->user()->id;
        $today = date("Y-m-d");
        $countProxyIPs = History::where('user_id',$auth)
            ->whereDate('created_at', $today)
            ->get()->count();
        // get user role
        $roleName = Auth::user()->roles[0]->name;
        if($roleName == 'admin'){
            $countProxyIPs = 0;
        }
        return $this->respondWithSuccess('The Proxy was received successfully.', $countProxyIPs);
    }




    // Proxy API 
    public function getProxyAndSetProxy(){
        $page_size = 100;
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://proxy.webshare.io/api/v2/proxy/list/?mode=direct&page=1&page_size=' . $page_size,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
          CURLOPT_HTTPHEADER => array(
            'Authorization: fexkymyd62hufrju333crh0okn0xsylbt5opvcua',
            'Cookie: _tid=4992f385-8503-49de-a857-b01ff43f76c0; newDesignLoginToken=r4zbv3tbz2yxbipd6a6fr5y6wcqbkpud307bvlic'
          ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $getData = json_decode($response);

        foreach($getData->results as $data){
            if($data->valid == true){
                $isExist = StoreProxy::where('proxy_id',$data->id)->first();
                if(!$isExist){
                    $storeProxy = new StoreProxy();
                    $storeProxy->proxy_id = $data->id;
                    $storeProxy->username = $data->username ? $data->username : 'No username';
                    $storeProxy->password = $data->password ? $data->password : 'No password';
                    $storeProxy->proxy_address = $data->proxy_address ? $data->proxy_address : 'No proxy address';
                    $storeProxy->port = $data->port ? $data->port : 'No port';
                    $storeProxy->valid = $data->valid ? $data->valid : false;
                    $storeProxy->last_verification = $data->last_verification ? $data->last_verification : false;
                    $storeProxy->country_code = $data->country_code ? $data->country_code : 'No country code';
                    $storeProxy->city_name = $data->city_name ? $data->city_name : 'No city name';
                    $storeProxy->save();
                }else{
                    $isExist->delete();
                }
            }
        }
        return true;
    }


    public function refreshProxy(){
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://proxy.webshare.io/api/v2/proxy/list/refresh/",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_HTTPHEADER => array(
            'Authorization: r1shrhy3pngh2vbnpxgdrmppa4zusulzn9c9jksi',
            'Cookie: _tid=4992f385-8503-49de-a857-b01ff43f76c0; newDesignLoginToken=r4zbv3tbz2yxbipd6a6fr5y6wcqbkpud307bvlic'
          ),
        ));

        $response = curl_exec($curl);
        dd($response);
        dd('refreshProxy------Done');
    }
}
