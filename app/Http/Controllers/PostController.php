<?php

namespace App\Http\Controllers;

use App\Post;
use App\comment;
use Illuminate\Http\Request;
use Auth;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        // $user_id=Auth::user()->id;
        // $posts = Post::where("user_id",$user_id)->get();
        $posts=Auth::user()->posts()->get();

        //return view('posts.index', ['posts' => $posts]);
        return view('posts.index')->with(compact('posts'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $request->validate([
            'user_id' => 'required',
            'title' => 'required',
            'content' => 'required',
        ]);
  
        //Post::create($request->all());
        
        $file = $request->file('image');
        $path=public_path('/images/');
        $ext=$request->file('image')->getClientOriginalExtension();
        $fileToStore= time().'.'.$ext;
        $file->move($path,$fileToStore);

         $post = new Post();
         $post->user_id= $request->user_id;
         $post->title= $request->title;
         $post->category= $request->category;
         $post->content= $request->content;
         $post->published_at= $request->published_at;
         $post->image= $fileToStore;
         $post->save();

        
        return redirect()->route('posts.index')
                        ->with('success','Post created successfully.');
    }
    
    public function create_comment(Request $request)
    {

        //dd($request->content);
        //echo "$request->post_id";
        //echo "Auth::user()->id";
        $comment= new Comment();
        $comment->user_id=Auth::user()->id;
        $comment->post_id = $request->post_id;
        $comment->content= $request->content;
        $comment->save();
        return redirect("/users/posts/".$request->post_id);



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //$comments = Comment::where("post_id", $post->id)->get();
        $comments= $post->comments()->get();
        return view('posts.show',compact('post','comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
         
  
        $post->update($request->all());
  
        return redirect()->route('posts.index')
                        ->with('success','Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
         $post->delete();
  
        return redirect()->route('posts.index')
                        ->with('success','Post deleted successfully');
    }
}
