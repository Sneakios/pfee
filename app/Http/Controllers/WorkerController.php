<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
}
