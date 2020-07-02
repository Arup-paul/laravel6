<?php

namespace App\Http\Controllers;

use App\Model\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class StaticController extends Controller
{
    public function show(){

        return view('frontend.home');
    }

    public function allPost(Request $request){

        if($request->cache === 'flush'){
            Cache::flush();
        }


        $data = [];
        // check if cache has post, serve from cache

        $posts = Cache::get('posts',[]);

        if(empty($posts)){
           $posts = Post::with( 'user' )->select( 'user_id', 'body', 'created_at' )->orderBy('id','desc')->get();
           Cache::forever( 'posts', $posts );
        }

        //if cache has no data, load from database & put in cache

        $data['posts'] = $posts;
        return view('frontend.posts.all_post',$data);
    }




}
