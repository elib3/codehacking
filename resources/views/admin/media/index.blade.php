@extends('layouts.admin')


@section('content')

    <h1>Media</h1>
    
    @if($photos)
    
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Image</th>
                <th>Created At</th>
                <th>Delete Photo</th>
            </tr>
        </thead>
        <tbody>
           @foreach($photos as $photo)
            <tr>
                <td>{{$photo->id}}</td>
                <td><img src="{{$photo->file}}" height="50px" alt=""></td>
                <td>{{$photo->file}}</td>
                <td>{{$photo->created_at ? $photo->created_at->diffForHumans() : 'No Date'}}</td>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'action' => ['AdminMediaController@destroy',$photo->id]]) !!}
                    
                    <div class="form-group">
                       {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    </div>
                    
                    {!! Form::close() !!}
                    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    @endif
    
@endsection