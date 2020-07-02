 @extends('frontend.layouts.master')

 @section('content')


    <div class="alert alert-success">
       you have been logged in as {{optional($user)->email}}

    <a href="{{route('logout')}}" class="btn btn-danger">Logout</a>
    </div>
    <div class="col-md-12">
       <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Post Details</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>
            @foreach($posts as $key=> $post)
            <tr>
            <td>{{$key+1}}</td>
            <td>{{$post->user->username}}</td>
            <td>{{$post->body}}</td>
            <td>{{$post->status}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
   {{-- {{ $posts->links() }} --}}
    </div>


    <div class="well-sm">
    <a href="{{route('posts.create')}}" class="btn btn-block btn-success">Create Post</a>
    </div>

  <div class="col-md-12">
      <div class="well">
            @csrf
  @if(session()->has('message'))
    <div class="alert alert-success">
        {{session('message')}}
    </div>
  @endif
      <form action="{{route('profile.update')}}" method="POST" enctype="multipart/form-data">
         @method('PUT')
         @csrf
         <div class="form-group">
             <label for="">Email</label>
            <input class="form-control" type="email" name="email" value="{{$user->email}}">
         </div>
         <div class="form-group">
             <label for="">Username</label>
            <input class="form-control" type="text" name="username" value="{{$user->username}}">
         </div>
         <div class="form-group">
             <label for="">Profile Photo</label>
            <input class="form-control" type="file" name="profile_photo" >
         </div>
           <img src="{{url('uploads/'.$user->profile_photo)}}" width="100px;" alt="">
         @if($errors->has('profile_photo'))
            <span class="text-danger">
                {{$errors->first('profile_photo')}}
            </span>
         @endif

         <div class="form-group">
            <input class="form-control btn btn-primary" type="submit" value="update"  >
         </div>
     </form>
      </div>
  </div>


 @endsection

