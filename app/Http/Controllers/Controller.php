<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Contact;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Setting;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function welcome()
    {$settings=Setting::find(1);
        return view('welcome',compact('settings'));
    }

    public function ContactUs(Request $request){
        $contact=new Contact;
        $contact->name=$request->name;
        $contact->email=$request->email;
        $contact->subject=$request->subject;
        $contact->message=$request->message;
        $contact->save();

        return redirect('/')->with('success', 'Your message has been sent');
    }
}
