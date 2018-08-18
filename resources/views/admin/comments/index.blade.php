@extends('layouts.admin')


@section('content')

    <h1>Comments</h1>
    
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Author</th>
                <th>Email</th>
                <th>Body</th>
            </tr>
        </thead>
        
        @if(count($comments) > 0 )
        
        <tbody>
           @foreach($comments as $comment)
            <tr>
                <td>{{$comment->id}}</td>
                <td>{{$comment->author}}</td>
                <td>{{$comment->email}}</td>
                <td>{{$comment->body}}</td>
                <td><a href="{{route('home.post',$comment->post->id)}}">View Post</a></td>
            </tr>
            @endforeach
        </tbody>
        
        @endif
        
    </table>
    
@endsection