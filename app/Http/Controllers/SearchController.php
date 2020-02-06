<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class SearchController extends Controller
{
    public function search(Request $request){
        if($request->search_q == ''){
            return back();
        }

        $searchTerm = $request->search_q;

        $posts = Post::query() ->where('title', 'LIKE', "%{$searchTerm}%")->orWhere('category', 'LIKE', "%{$searchTerm}%") 
        ->get();
        return view('pages.search')->with('posts',$posts);
    }
}
