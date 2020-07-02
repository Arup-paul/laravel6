<?php

namespace App\Observers;

use Illuminate\Support\Facades\Cache;

class PostObserver
{
    public function created(){
        Cache::forget('posts');
    }

    public function updated(){
      Cache::forget( 'posts' );
    }

    public function saved(){
       Cache::forget( 'posts' );
    }
     public function deleted(){
       Cache::forget( 'posts' );
    }

}
