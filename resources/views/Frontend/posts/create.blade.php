 @extends('frontend.layouts.master')

 @section('content')


    <div class="alert alert-success">
       you have been logged in as {{optional($user)->email}}

    <a href="{{route('logout')}}" class="btn btn-danger">Logout</a>
    </div>


  <div class="col-md-12">
      <div class="well">
            @csrf
  @if(session()->has('message'))
    <div class="alert alert-success">
        {{session('message')}}
    </div>
  @endif
  @if($errors->any())
    <div class="alert alert-danger">
        {{$errors->first()}}
    </div>
  @endif
<form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
         @csrf
         <div class="form-group">
             <label for="">Post Details</label>
         <textarea class="form-control" name="body" id="" cols="30" rows="10">{{old('body')}}</textarea>
            
         </div>
         <div class="form-group">
             <label for="">Status</label>
             <select class="form-control" name="status" id="">
                 <option value="pending">Pending</option>
                 <option value="publish">Publish</option>
             </select>
         </div>
      
         

         <div class="form-group">
            <input class="form-control btn btn-success" type="submit" value="Add Post"  >
         </div>
     </form>
      </div>
  </div>


 @endsection
 
