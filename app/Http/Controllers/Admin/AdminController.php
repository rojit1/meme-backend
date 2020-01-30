<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }   

    public function index(){
        $user = User::all();
        $verified= 0;
        $non_verified = 0;
        foreach($user as $u){
            if($u["email_verified_at"]){
                $verified++;
            }else{
                $non_verified++; 
            }
        }

        $data = ['total_user'=> count($user),"verified"=>$verified,"non_verified"=>$non_verified];
        return view('admin.dashboard')->with('data',$data);
    }
}
