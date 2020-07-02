<?php

namespace App\Http\Controllers;

use App\Model\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
      public function dashboard(){
       $data = [];
       $data['user'] =  auth()->user();
       $data['posts'] = Post::with('user')->where('user_id',auth()->user()->id)->orderBy('id','desc')->get();
        return view('frontend.dashboard',$data);
    }


}
