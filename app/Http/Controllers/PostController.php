<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

   public function SavePost(Request $request){
       
    $validator = Validator::make($request->all(),[
        'body'=>'required|min:10',
      ]);

      if($validator->fails()){
          return response()->json(['status'=>'error','errors'=>$validator->errors()]);
      }

      $post=new Post;
      $post->id_user=Auth::user()->getAuthIdentifier();
      $post->type_user=Auth::user()->type;
      $post->body=$request->body;
      $post->save();
      return response()->json(['status'=>'success']);

   }

   public function GetPosts(){
    $posts=[];
         $pp=Post::select("*")->orderByDesc("created_at")->get();
        
         foreach($pp as $p){  
             $user=User::where('id',$p->id_user)->value('type');
             if(Auth::user()->type=="worker"){
                 if($user=="customer"){
            $post=['id'=>$p->id,'body'=>$p->body,'user'=>User::where('id',$p->id_user)->value('name'),'cmntsNbr'=>Comment::where('post_id',$p->id)->count(),'date'=>$p->created_at->diffForHumans(),'avatar'=>User::where('id',$p->id_user)->value('avatar')];        
            array_push($posts,$post);}}
           
            if(Auth::user()->type=="customer"){
                if($user=="worker"){
           $post=['id'=>$p->id,'body'=>$p->body,'user'=>User::where('id',$p->id_user)->value('name'),'cmntsNbr'=>Comment::where('post_id',$p->id)->count(),'date'=>$p->created_at->diffForHumans(),'avatar'=>User::where('id',$p->id_user)->value('avatar')];        
           array_push($posts,$post);}}
         }
          
       return response()->json(['data'=>$posts]);
   }

   public function GetPostDetails($id){
       $p=Post::find($id);
       $post=['id'=>$p->id,'body'=>$p->body,'user'=>User::where('id',$p->id_user)->value('name'),'cmntsNbr'=>Comment::where('post_id',$id)->count(),'date'=>$p->created_at->diffForHumans(),'avatar'=>User::where('id',$p->id_user)->value('avatar')];        
       return response()->json(['post'=>$post]);


   }

}
