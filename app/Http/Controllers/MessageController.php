<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;
class MessageController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function GetContacts(){
          $contacts=User::where('type','=','worker')->get();
         return response()->json(['contacts'=>$contacts]);
    }
}
