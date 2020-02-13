<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\comment;
use Auth;


class WelcomeController extends Controller
{
   public function index(Request $request)
    {
       
       $cat = $request->category;
       if($cat) {
          $posts = Post::where("category",$cat)->get();
       
       }
       else {
          $posts = Post::all();
         
       }
        //return $posts;
        //$ps=Post::paginate(3);

         return view('welcome')->with(compact('posts'));
        //return view('posts.index', ['posts' => $posts]);
        
      
        
    }

      public function create_comment(Request $request)
    {

        //dd($request->content);
        //echo "$request->post_id";
        //echo "Auth::user()->id";
        // $comment= new Comment();
        // $comment->user_id=Auth::user()->id;
        // $comment->post_id = $request->post_id;
        // $comment->content= $request->content;
        // $comment->save();
          // return redirect("/users/posts/".$request->post_id);



    }


    public function show(Request $request)

    {
        $id = $request->id;
        $posts = Post::where("id",$id)->get();
        $comments = Comment::where("post_id", $id)->get();
        return view('show')->with(compact('posts','comments'));
    }
}
