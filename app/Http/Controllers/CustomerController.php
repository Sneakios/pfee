<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Rate;
use App\Models\Worker;
use App\Models\Follower;
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


       public function SetRate(Request $request,$id){
         $rate=new Rate;
         $rate->customer_id=Auth::user()->getAuthIdentifier();
         $rate->worker_id=$id;
         $rate->rate=$request->rate;
         $rate->save();
             
         
         
         $count=Rate::where('worker_id','=',$id)->count();
         $sum=Rate::where('worker_id','=',$id)->sum('rate');

         Worker::where('id_worker','=',$id)->update(
          ['rate'=>$sum/$count],  
        );

         return response()->json(['status'=>'success']);

       }


       public function ResetRate($id){
     
   
        $rate=Rate::where('worker_id','=',$id)->where('customer_id','=',Auth::user()->getAuthIdentifier());   
        $rateValue=Rate::where('worker_id','=',$id)->where('customer_id','=',Auth::user()->getAuthIdentifier())->value('rate');

        $count=Rate::where('worker_id','=',$id)->count();
        $sum=Rate::where('worker_id','=',$id)->sum('rate');
        $rate->delete();  
       

        Worker::where('id_worker','=',$id)->update(
         ['rate'=>(($sum-$rateValue) / $count) ],  
       );
   
   
   
        return response()->json(['status'=>'success']);
        

      }


      public function Follow($id){
        $follow=new Follower;
        $follow->customer_id=Auth::user()->getAuthIdentifier();
        $follow->worker_id=$id;
        
        $follow->save();
            
      return response()->json(['status'=>'success']);

      }

      public function UnFollow($id){
     
   
        $follow=Follower::where('worker_id','=',$id)->where('customer_id','=',Auth::user()->getAuthIdentifier());   
        $follow->delete();  

        return response()->json(['status'=>'success']);
        

      }

      public function GetWorkers(){
        $workers=User::where('type','=','worker')->select('id','name','avatar','ville')->get();
        foreach($workers as $worker){
          $worker->setAttribute('skills',Worker::where('id_worker','=',$worker->id)->value('specialty'));
      }


        return response()->json(['workers'=>$workers]);
      }
}
