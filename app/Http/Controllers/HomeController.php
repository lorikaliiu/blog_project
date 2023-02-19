<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;
class HomeController extends Controller
{
    function index(Request $request){
    	// $posts=Post::orderBy('id','desc')->simplePaginate(1);
    	if($request->has('q')){
    		$q=$request->q;
    		$posts=Post::where('title','like','%'.$q.'%')->orderBy('id','desc')->paginate(2);
    	}else{
    		$posts=Post::orderBy('id','desc')->paginate(2);
    	}
        return view('home',['posts'=>$posts]);
    }

        

}
