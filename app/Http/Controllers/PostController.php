<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Interessent;
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
                 $interessent=Interessent::where("user_id","=",Auth::user()->getAuthIdentifier())->where('post_id',$p->id)->count();
                 if($interessent>0){$interessent=true;}else{$interessent=false;}
            $post=['id'=>$p->id,'body'=>$p->body,'user'=>User::where('id',$p->id_user)->value('name'),'cmntsNbr'=>Comment::where('post_id',$p->id)->count(),'date'=>$p->created_at->diffForHumans(),'avatar'=>User::where('id',$p->id_user)->value('avatar'),'interessent'=>$interessent];        
            array_push($posts,$post);}}
           
            if(Auth::user()->type=="customer"){
                if($user=="worker"){
                    $interessent=Interessent::where("user_id","=",Auth::user()->getAuthIdentifier())->where('post_id',$p->id)->count();
                    if($interessent>0){$interessent=true;}else{$interessent=false;}
           $post=['id'=>$p->id,'body'=>$p->body,'user'=>User::where('id',$p->id_user)->value('name'),'cmntsNbr'=>Comment::where('post_id',$p->id)->count(),'date'=>$p->created_at->diffForHumans(),'avatar'=>User::where('id',$p->id_user)->value('avatar'),'interessent'=>$interessent];        
           array_push($posts,$post);}}
         }         
       return response()->json(['data'=>$posts]);
   }

   public function GetPostDetails($id){
       $p=Post::find($id);
       $post=['id'=>$p->id,'body'=>$p->body,'user'=>User::where('id',$p->id_user)->value('name'),'cmntsNbr'=>Comment::where('post_id',$id)->count(),'date'=>$p->created_at->diffForHumans(),'avatar'=>User::where('id',$p->id_user)->value('avatar')];        
       return response()->json(['post'=>$post]);
   }

   public function GetMyPosts(){
    $posts=[];
         $pp=Post::where('id_user',Auth::user()->id)->orderByDesc("created_at")->get();        
         foreach($pp as $p){                 
            $post=['id'=>$p->id,'body'=>$p->body,'user'=>Auth::user()->name,'cmntsNbr'=>Comment::where('post_id',$p->id)->count(),'date'=>$p->created_at->diffForHumans(),'avatar'=>Auth::user()->avatar];        
            array_push($posts,$post);      
         }          
       return response()->json(['data'=>$posts]);
   }

   public function DeleteMyPost($id){
       $post=Post::find($id);
    $post->delete();
    return response()->json(['status'=>'success']);
   }

   public function EditMyPost(Request $request,$id){
    $validator = Validator::make($request->all(),[      
       'body'=>'required|min:5',       
      ]); 
      if($validator->fails()){
          return response()->json(['status'=>'error','errors'=>$validator->errors()]);
      }
    Post::find($id)->update(
      ['body'=>$request->body],  
    );    
    return response()->json(['status'=>'success']);
     }


     public function InteressentPost($id){
     $interessent=new Interessent;
     $interessent->user_id=Auth::user()->id;
     $interessent->post_id=$id;
     $interessent->save();

return response()->json(['status'=>'success']);
     }
   
     public function UnInteressentPost($id){
       $post=Interessent::where("user_id","=",Auth::user()->getAuthIdentifier())->where('post_id',$id);
         $post->delete();
         return response()->json(['status'=>'success']);

     }


}
