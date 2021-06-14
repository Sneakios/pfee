<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Worker;
use Illuminate\Support\Facades\Validator;

class WorkerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function AddWorkerInfo(Request $request)
    {

      $validator = Validator::make($request->all(),[
        'skills'=>'required|min:7|max:50',
        'description'=>'required|min:20',

      ]);

      if($validator->fails()){
          return response()->json(['status'=>'error','errors'=>$validator->errors()]);
      }
        $worker =new Worker;
           
           $worker->id_worker = Auth::user()->getAuthIdentifier();
            $worker->specialty= $request->skills;
            $worker->description=$request->description;
            $worker->followers= 0;
            $worker->rate= 0;  
            $worker->save();
            return response()->json(['status'=>'success']);
    }

   public function ShowWorkerSettings(){
    $worker=User::find(Auth::user()->getAuthIdentifier());
    $workerInfo=Worker::where('id_worker',Auth::user()->getAuthIdentifier())->get();
    return response()->json(['workerInfo'=>$workerInfo,'worker'=>$worker]);
   }

   public function ChangeWorkerSettings (Request $request)
   {

    $validator = Validator::make($request->all(),[
      
      'description'=>'required|min:20',
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
  Worker::where('id_worker',Auth::user()->getAuthIdentifier())->update(
    ['specialty'=>$request->skills,
    'description'=>$request->description],    
  );
  return response()->json(['status'=>'success']);
   }

public function SavePortFolio(Request $request){

  $validator = Validator::make($request->all(),[     
    'description'=>'required|min:10',
    'title'=>'required|min:3',
    'picture'=>'required',
  ]);
  if($validator->fails()){
    return response()->json(['status'=>'error','errors'=>$validator->errors()]);
}
  $portfolio=new Portfolio;
   if($request->file()){
    $file=$request->file('picture');
    $filename=time().'.'.$file->getClientOriginalExtension();
    $file->move(public_path('assets/avatars'), $filename); 
  }   
    $portfolio->worker_id=Auth::user()->getAuthIdentifier();
    $portfolio->picture=$filename;
      $portfolio->title=$request->title;
      $portfolio->description=$request->description;
       $portfolio->save();
      return response()->json(['status'=>'success']);

}

}
