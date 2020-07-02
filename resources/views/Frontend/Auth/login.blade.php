@extends('frontend.layouts.master')


@section('content')

<form action="{{route('userLogin')}}" method="post" >
  @csrf
  @if(session()->has('message'))
    <div class="alert alert-danger">
        {{session('message')}}
    </div>
  @endif

    <div class="form-group">
      <label for="id2">Email</label>
      <input type="text" id="id2" class="form-control" value="{{old('email')}}" name="email" placeholder="Email">
        @if($errors->has('email'))
  <span class="text-danger">
      {{$errors->first('email')}}
  </span>
  @endif
  </div>

    <div class="form-group">
      <label for="id3">Password</label>
      <input type="password" id="id3" class="form-control" name="password" placeholder="Password">
        @if($errors->has('password'))
  <span class="text-danger">
      {{$errors->first('password')}}
  </span>
  @endif
  </div>


      <div class="form-group">
      <input type="submit" value="Login" class="btn btn-primary">
  </div>
</form>

@endsection

