<?php

namespace App\Http\Controllers;
use App\Models\StoreProxy;
use App\Models\History;

class HomeController extends Controller
{
    
   

    public function home()
    {   

        $proxyIps = [];

        $getHistories = History::select('porxy_ip')
                    ->where('user_id', auth()->user()->id)
                    ->get();
        foreach ($getHistories as $key => $value) {
            array_push($proxyIps, $value->porxy_ip);
        }
        $locations = StoreProxy::select('id', 'proxy_id', 'country_code', 'city_name','proxy_address')
            ->whereNotIn('proxy_address', $proxyIps)
            ->get()
            ->unique('country_code');
        return view('home', compact('locations'));
    }

}
