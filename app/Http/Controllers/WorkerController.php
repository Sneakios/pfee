<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Worker;

class WorkerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function AddWorkerInfo(Request $request)
    {
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
