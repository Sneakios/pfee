<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Worker;
use App\Models\Setting;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    
    {    
        
        $countWorker=-1;
        if(Auth::user()->type=='worker'){
        $countWorker = Worker::where('id_worker','=',Auth::user()->getAuthIdentifier())->count();
        
    }
    $settings=Setting::find(1);
    
        return view('home',['count'=>$countWorker,'settings'=>$settings]);
        
    }


    public function change_avatar(Request $request)
    {
        if ($request->hasFile('picture')) {
        $n=Auth::user()->id;
        $avatar=$request->file('picture');
        $filename=time().'.'.$avatar->getClientOriginalExtension();
        $request->file('picture')->move(public_path('assets/avatars'), $filename);
       User::find($n)->update(['avatar' =>$filename]);
        }

       return redirect('home');
    }


}
