<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;


class ContactController extends Controller
{
    public function publicIndex()
    {
        return view('public.contact');
    }

     // Admin Part/ Authorization
    public function index()
    {
        $contacts = Contact::select()->orderBy('id', 'desc')->get();
        foreach ($contacts as $contact) {
            $contact->created_at = date('d M Y', strtotime($contact->created_at));
            $contact->badge = "badge-soft-" . $this->getRandomBadge();
        }
        return view('contact.index', compact('contacts'));
    }

    public function checkedStatusUpdate($id)
    {
        $contact = Contact::find($id);
        if($contact->status == 'unchecked'){
            $contact->status = 'checked';
            $contact->save();
        }
        return $this->respondWithSuccess('Status updated successfully',$contact);
    }

    public function contactSubmit(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|string|email|min:3|max:255',
            'message' => 'required|string|min:5|max:255',
        ]);
        
        if ($validator->fails()) {
            return $this->respondWithErrorWeb($validator->errors()->first(),null,'red');
        }

        try{
            Contact::create([
                'name' => $request->name,
                'email' => $request->email,
                'message' => $request->message,
            ]);
            return $this->respondWithSuccessWeb('Your message has been sent successfully',null,'green');
        }catch(\Exception $e){
            return $this->respondWithErrorWeb($e->getMessage(),null,'red');
        }
    }

}
