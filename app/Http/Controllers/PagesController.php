<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function __construct(){

            $this->middleware('auth');
        
    }

    public function memer(){
        return view('pages.memer');
    }

    public function notification(){
        return view('pages.notification');
    }
}
