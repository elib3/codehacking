@extends('layouts.admin')




@section('content')

    <h1>Edit Posts</h1>
    
    <div class="row">@include('includes.form_alert')</div>
    
    <div class="row">
     <div class="col-sm-3">
         <img src="{{$post->photo ? $post->photo->file : 'http://via.placeholder.com/350x150'}}" alt="" class="img-responsive">
     </div>
      <div class="col-sm-9">
            {!! Form::model($post,['method' => 'PATCH', 'action' => ['AdminPostsController@update',$post->id],'files'=>true]) !!}
            
                <div class="form-group">
                   {!! Form::label('title', 'Title:') !!}
                   {!! Form::text('title', null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                   {!! Form::label('category_id', 'Category:') !!}
                   {!! Form::select('category_id',['' => 'Select Category'] + $categories, null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                   {!! Form::label('photo_id', 'Image:') !!}
                   {!! Form::file('photo_id',null,['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                   {!! Form::label('body', 'Description:') !!}
                   {!! Form::textarea('body', null, ['class' => 'form-control','rows'=>3]) !!}
                </div>
            
                <div class="form-group">
                   {!! Form::submit('Update Post', ['class' => 'btn btn-primary']) !!}
                </div>
            
            {!! Form::close() !!}
            
            
        </div>
        
        {!!  Form::open(['method' => 'DELETE', 'action' => ['AdminPostsController@destroy', $post->id] ])  !!}
            <div class="form-group col-sm-4">
              {!! Form::submit('Delete Post',['class'=>'btn btn-danger']) !!}
            </div>
      {!!  Form::close()  !!}
    </div>
    
    
    

@endsection

