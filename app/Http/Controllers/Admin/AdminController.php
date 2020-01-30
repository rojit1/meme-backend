<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Charts\UserChart;
use App\User;
use Carbon\Carbon;


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
        // $usr = User::find(55);
        // return $usr->created_at->format('D');

        $datas =  $this->findDate();


        $usersChart = new UserChart;
        $usersChart->labels(['Sun', 'Mon', 'Tues','Wed','Thu','Fri','Sat']);
        $usersChart->dataset('Users This week', 'line', $datas)
        ->backgroundcolor("rgb(255, 99, 100)");

        
        
        $data = [
            'total_user'=> count($user),
            "verified"=>$verified,
            "non_verified"=>$non_verified,
            'linedata'=> $usersChart
        ];
        return view('admin.dashboard')->with('data',$data);
    }

    public function findDate(){
        $dt = Carbon::now();
        $a = [0,0,0,0,0,0,0];
        $recentUsers = User::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
        foreach($recentUsers as $ru){
            if($ru->created_at->format('D')=='Sun'){
                $a[0]++;
            }else if($ru->created_at->format('D')=='Mon'){
                $a[1]++;
            }else if($ru->created_at->format('D')=='Tue'){
                $a[2]++;
            }else if($ru->created_at->format('D')=='Wed'){
                $a[3]++;
            }else if($ru->created_at->format('D')=='Thu'){
                $a[4]++;
            }else if($ru->created_at->format('D')=='Fri'){
                $a[5]++;
            }else{
                $a[6]++;
            }
        }
        return $a;

        
    }
}
