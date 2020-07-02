<?php

namespace App\Http\Controllers;

use App\Model\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
   public function showFrom(){
       $data = [];
       $data['user'] = auth()->user();
       return view('frontend.posts.create',$data);
   }

   public function storePost(Request $request){
      $inputs = $request->except('_token');

      $validator = Validator::make($inputs,[
       'body' => 'required| min:10',
       'status' => 'required'
      ]);

      if($validator->fails()){
          return redirect()->back()->withErrors($validator)->withInput();
      }

      $post = Post::create([
         'user_id' => auth()->user()->id,
         'body'=>trim($inputs['body']),
         'status'=>trim($inputs['status']),
      ]);

      session()->flash('message','Post Created Succefully');
      return redirect()->back();
   }
}
