 @extends('frontend.layouts.master')

 @section('content')
   <h2 class="text-center text-success">ALL POST</h2>

    <div class="col-md-12">
       <table class="table table-bordered">
        <thead>
            <tr>
                <th>SL</th>
                <th>Post Details</th>
                <th>Post Create By</th>
                <th>Date</th>
            </tr>
        </thead>

        <tbody>
            @foreach($posts as $key => $post)
            <tr>
            <td>{{$key+1}}</td>
            <td>{{$post->body}}</td>
            <td>{{$post->user->username}}</td>
            <td>{{$post->created_at}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
   {{-- {{ $posts->links() }} --}}
    </div>





 @endsection

