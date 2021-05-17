<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        
    }
    public function ShowCustomerSettings(){
        $customer=User::find(Auth::user()->getAuthIdentifier());
        return response()->json(['customer'=>$customer]);
       }
    
       public function ChangeCustomerSettings (Request $request)
       {
    
        $validator = Validator::make($request->all(),[
          
         
          'firstname'=>'required|min:3',
          'lastname'=>'required|min:3',
          'adresse'=>'required|min:10',
          'mobile'=>'required|min:8|numeric',
          
        ]);
    
        if($validator->fails()){
            return response()->json(['status'=>'error','errors'=>$validator->errors()]);
        }
    
    
      
        $name=$request->firstname." ".$request->lastname;
      User::find(Auth::user()->getAuthIdentifier())->update(
        ['name'=>$name,
        'adresse'=>$request->adresse,
        'mobile'=>$request->mobile,
        'ville'=>$request->ville],  
      );
      
      return response()->json(['status'=>'success']);
       }
}
