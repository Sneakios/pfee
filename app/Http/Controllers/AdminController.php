<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('is_admin');
    }


    


    public function indexAdmin(){
        return view('homeadmin');
    }


    public function getUsers(){
       $users=User::all();
       foreach($users as $user){
        $user->setAttribute('added_at',$user->created_at->diffForHumans());        
       }
       
       return response()->json(['data'=>$users]);
      }


      public function getSettings(){
          $settings=Setting::find(1);
          return response()->json(['data'=>$settings]);
      }

      public function SaveSettings(Request $request){
       
        $validator = Validator::make($request->all(),[
            'email1'=>'required|min:5',
            'email2'=>'required|min:5',
            'mobile1'=>'required|min:8',
            'mobile2'=>'required|min:8',
            'location'=>'required|min:8',
          ]);
    
          if($validator->fails()){
              return response()->json(['status'=>'error','errors'=>$validator->errors()]);
          }
        
        $setting=Setting::find(1);
        $setting->email1=$request->email1;
        $setting->email2=$request->email2;
        $setting->mobile1=$request->mobile1;
        $setting->mobile2=$request->mobile2;
        $setting->location=$request->location;

        $setting->save();
        return response()->json(['status'=>'success']);

      }
    
}
