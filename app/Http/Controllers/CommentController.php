<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

  public function AddComment(Request $request,$id){
    
    $validator = Validator::make($request->all(),[
        'body'=>'required|min:5',
      ]);
      if($validator->fails()){
          return response()->json(['status'=>'error','errors'=>$validator->errors()]);
      }   
    $comment=new Comment;
    $comment->user_id=Auth::user()->getAuthIdentifier();
    $comment->post_id=$id;
    $comment->body=$request->body;
    $comment->save();    
    $commentt=['body'=>$request->body,'user'=>User::where('id',Auth::user()->getAuthIdentifier())->value('name'),'date'=>'','avatar'=>User::where('id',Auth::user()->getAuthIdentifier())->value('avatar')];        
    return response()->json(['status'=>'success','cmnt'=>$commentt]);
  }

  public function GetComments($id){
    $me=false;
    $comments=[];  
         $cc=Comment::where('post_id',$id)->orderBy("created_at")->get();
         foreach($cc as $c){  
           if($c->user_id==Auth::user()->id){$me=true;}
            $comment=['body'=>$c->body,'user'=>User::where('id',$c->user_id)->value('name'),'date'=>$c->created_at->diffForHumans(),'avatar'=>User::where('id',$c->user_id)->value('avatar'),'me'=>$me,'id'=>$c->id];        
            array_push($comments,$comment);
            $me=false;
         }         
       return response()->json(['comments'=>$comments]);
  }

  public function DeleteMyComment($id){
    $comment=Comment::find($id);
 $comment->delete();
 return response()->json(['status'=>'success']);
}

public function EditMyComment(Request $request,$id){

  $validator = Validator::make($request->all(),[    
      'body'=>'required|min:2',     
    ]);
    if($validator->fails()){
        return response()->json(['status'=>'error','errors'=>$validator->errors()]);
    }
  Comment::find($id)->update(
    ['body'=>$request->body],  
  ); 
  return response()->json(['status'=>'success']);
   }

}
