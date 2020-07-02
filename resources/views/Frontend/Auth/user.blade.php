@extends('frontend.layouts.master')


@section('content')

<a href="{{route('userList')}}" class="btn btn-primary">User </a>
<form action="{{route('updateUser',$user->id)}}" method="post" enctype="multipart/form-data">
   @method('PUT')
  @csrf
  @if(session()->has('message'))
    <div class="alert alert-success">
        {{session('message')}}
    </div>
  @endif
  <div class="form-group">
      <label for="id1">Username</label>
  <input type="text" id="id1" value="{{$user->username}}" class="form-control" name="username" placeholder="Username">
  @if($errors->has('username'))
  <span class="text-danger">
      {{$errors->first('username')}}
  </span>
  @endif
  </div>
    <div class="form-group">
      <label for="id2">Email</label>
      <input type="text" id="id2" class="form-control" value="{{$user->email}}" name="email" placeholder="Email">
        @if($errors->has('email'))
  <span class="text-danger">
      {{$errors->first('email')}}
  </span>
  @endif
  </div>

   
     <div class="form-group">
 
      <label for="id5">Profile Photo</label>
      <input type="file" id="id5" class="form-control" name="profile_photo" >
          <img src="{{url('uploads/'.$user->profile_photo)}}" width="100px;" alt="">
         @if($errors->has('profile_photo'))
    <span class="text-danger">
        {{$errors->first('profile_photo')}}
    </span>
    @endif
      
  </div>
      <div class="form-group">
      <input type="submit" value="Edit Profile" class="btn btn-primary">
  </div>
</form>

<form action="{{route('delete',$user->id)}}" method="post">
  @method('DELETE')
  @csrf
  <button type="submit" class="btn btn-danger">Delete</button>
</form>

@endsection

