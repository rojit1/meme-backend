<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
class UserProfileController extends Controller
{

    public function __construct(){
         $this->middleware('auth');
    }

    public function showProfile(){
        $id = Auth::user()->id;
        $user = User::where('id','=',$id)->get()->first();
        return view('pages.profile')->with('user',$user);
        
    }
}
