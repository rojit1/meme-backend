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

    public function showProfile($id){
        $uid = $id;

        $posts = Post::where('user_id','=',$uid)->latest()->get();
        $user = User::where('id','=',$uid)->get()->first();
        return view('pages.profile')->with(['user'=>$user,'posts'=>$posts]);  
    }

    public function editProfile(User $user){
        return view('pages.edit-profile')->with('user',$user);
    }

    public function updateProfile(Request $request, $id){
        $this->validate($request,[
            'phone'=>'nullable',
            'country'=>'nullable',
            'image'=>'image|nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $user = User::find($id);

        if($request->hasFile('image')){

            $fwe = $request->file('image')->getClientOriginalName();
           
            $filename = pathinfo($fwe,PATHINFO_FILENAME);
            
            $ext = $request->file('image')->getClientOriginalExtension();

            $imageStore = $filename.'_'.time().'.'.$ext;

            $path = $request->file('image')->storeAs('public/profile/',$imageStore);

            $user->image = $imageStore;

        }

        $user->country = $request->country;
        $user->phone = $request->phone;
        $user->save();
        return redirect('/profile/view/'.$id);
        

    }
}
