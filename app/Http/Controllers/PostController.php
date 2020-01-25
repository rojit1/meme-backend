<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;
use App\Comment;
class PostController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth');  
    }

    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'title'=>'required',
            'image'=>'image|nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category'=>'nullable'
        ],[
            'title.required'=>'Title is required'
        ]);

        if($request->hasFile('image')){

            $fwe = $request->file('image')->getClientOriginalName();
           
            $filename = pathinfo($fwe,PATHINFO_FILENAME);
            
            $ext = $request->file('image')->getClientOriginalExtension();

            $imageStore = $filename.'_'.time().'.'.$ext;

            $path = $request->file('image')->storeAs('public/memes/',$imageStore);

        }else{
            $imageStore=null;
        }
        $cat = '';
        foreach($request->category as $c){
            if($c)
            $cat.=$c.',';
        }
        
        $post = new Post();
        $post->user_id = Auth::user()->id;
        $post->title = $request->title;
        $post->image = $imageStore;
        $post->category = $cat;
        $post->save();
        return back();
    }

    

    public function show($id)
    {
        $comment = Comment::where('post_id',$id)->get();
        $post = Post::find($id);
        return view('posts.show')->with(['post'=>$post,'comment'=>$comment]);
    }

    

    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit')->with('post',$post);
    }
    
    public function update(Request $request, $id)
    {
        
        $this->validate($request,[
            'title'=>'required',
            'image'=>'image|nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category'=>'nullable'
        ],[
            'title.required'=>'Title is required'
        ]);

        $post = Post::find($id);

        if($request->hasFile('image')){

            $fwe = $request->file('image')->getClientOriginalName();
           
            $filename = pathinfo($fwe,PATHINFO_FILENAME);
            
            $ext = $request->file('image')->getClientOriginalExtension();

            $imageStore = $filename.'_'.time().'.'.$ext;

            $path = $request->file('image')->storeAs('public/memes/',$imageStore);

            $post->image = $imageStore;


        }

        $cat = '';
        if($request->category)
        foreach($request->category as $c){
            if($c){
                $cat.=$c.',';
            }
        }

        
        $post->title = $request->title;
        $post->category = $cat;
        $post->save();
        return redirect('/profile/view/'.$id);
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('/profile');
    }
}
