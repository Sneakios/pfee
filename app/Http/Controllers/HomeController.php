<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Worker;
use App\Models\Setting;
use App\Models\Follower;
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

     public function indexAdmin(){
         return view('homeadmin');
     }


    public function index()

    {
        $rate=0;
        $countWorker=-1;
        if(Auth::user()->type=='worker'){
        $countWorker = Worker::where('id_worker','=',Auth::user()->getAuthIdentifier())->count();
        $rate=Worker::where('id_worker','=',Auth::user()->getAuthIdentifier())->value('rate');
    }
    $settings=Setting::find(1);
        return view('home',['count'=>$countWorker,'settings'=>$settings,'rate'=>$rate]);
    }



    //use vue js router//
    public function indexx()

    {
        $rate=0;
        $countWorker=-1;
        if(Auth::user()->type=='worker'){
        $countWorker = Worker::where('id_worker','=',Auth::user()->getAuthIdentifier())->count();
        $rate=Worker::where('id_worker','=',Auth::user()->getAuthIdentifier())->value('rate');
    }
    $settings=Setting::find(1);
        return view('home',['count'=>$countWorker,'settings'=>$settings,'rate'=>$rate]);
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


    public function GetUserDetails($id){

      $u=User::find($id);
      $type=User::where('id',$id)->value('type');
      $followers=-1;
      $skills="";
      $rate=-1;
      $description="";
      $rated=null;
      $followed=null;
      $nbrRates=-1;

      if($type=="worker"){
          $followers=Worker::where('id_worker',$id)->value('followers');
          $skills=Worker::where('id_worker',$id)->value('specialty');
          $rate=Worker::where('id_worker',$id)->value('rate');
          $description=Worker::where('id_worker',$id)->value('description');
          $rated=Rate::where('customer_id','=',Auth::user()->getAuthIdentifier())->where('worker_id',$id) ->count(); 
         $nbrRates=$rated;
          $followers=Follower::where('customer_id','=',Auth::user()->getAuthIdentifier())->where('worker_id',$id) ->count(); 
          if($followers == 0){$followed=false;}else{$followed=true;} 
          if($rated == 0){$rated=false;}else{$rated=true;} 
         
      }

        $user=["name"=>$u->name,"email"=>$u->email,"mobile"=>$u->mobile,"address"=>$u->adresse,"followers"=>$followers,"skills"=>$skills,"rate"=>$rate,"description"=>$description,"avatar"=>$u->avatar,'rated'=>$rated,'followed'=>$followed,'followers'=>$followers,'nbrRates'=>$nbrRates];
        return response()->json(['data'=>$user]);
    }

    public function getAllUsers(Request $request){
        $ser=$request->k;
        $users=User::where('name','like','%'.$ser.'%')->select('id','name','picture')->get();
        return response()->json(['data'=>$users]);


    }


}
