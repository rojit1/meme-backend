<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;
use App\Post;
use App\User;
use Auth;
class LikesController extends Controller
{
    public function addLike(Post $post){
        $like = new Like();
        $like->post_id = $post->id;
        $like->user_id = Auth::user()->id;
        $like->save();
        return back();
    }
}
