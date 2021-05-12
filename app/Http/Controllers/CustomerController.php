<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Worker;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
}
