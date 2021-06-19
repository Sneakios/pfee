<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Worker;
use Illuminate\Support\Facades\Validator;
class PortfolioController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
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


      public function GetPortFolio(){
        $portfolios=Portfolio::where('worker_id','=',Auth::user()->getAuthIdentifier())->select('id','title','picture')->get();
        return response()->json(['portfolios'=>$portfolios]);
      }
}
