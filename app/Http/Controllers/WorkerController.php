<?php

namespace App\Http\Controllers;
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
        'skills'=>'required|min:7',
        'description'=>'required|min:20'

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

            return response()->json([
                'message' => 'New User created'
            ]);
       
  
    }
}
