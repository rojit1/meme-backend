<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Post;
class UserProfileController extends Controller
{

    public function __construct(){
         $this->middleware('auth');
    }

    public function showProfile(){
        $uid = Auth::user()->id;

        $posts = Post::where('user_id','=',$uid)->latest()->get();
        $user = User::where('id','=',$uid)->get()->first();
        return view('pages.profile')->with(['user'=>$user,'posts'=>$posts]);  
    }

    public function editProfile(User $user){
        return view('pages.edit-profile')->with('user',$user);
    }

    public function updateProfile(Request $request, $id){
        return 'Here';
    }
}
