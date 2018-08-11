@extends('layouts.admin')




@section('content')
    
     @if(Session::all())
          <p class="alert-danger">{{session('deleted_post')}}</p>
      @endif

    <h1>Posts</h1>
    
    <table class="table">
        <thead>
            <tr>
               <th>ID</th>
               <th>Photo</th>
               <th>Owner</th>
               <th>Category</th>
                <th>Title</th>
                <th>Body</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        
        <tbody>
           @if($posts)
               @foreach($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td><img height="25px" src="{{$post->photo ? $post->photo->file : '/images/default.png'}}" alt=""></td>
                <td>{{$post->user->name}}</td>
                <td>{{$post->category ? $post->category->name : 'Uncategorized'}}</td>
                <td><a href="{{route('admin.posts.edit',$post->id)}}">{{$post->title}}</a></td>
                <td>{{str_limit($post->body,15)}}</td>
                <td>{{$post->created_at->diffForHumans()}}</td>
                <td>{{$post->updated_at->diffForHumans()}}</td>
            </tr>
                @endforeach
            @endif
            
        </tbody>
    </table>

@endsection