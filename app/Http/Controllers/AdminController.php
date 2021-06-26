<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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

    
}
