@extends('layouts.blog-post')


@section('content')


     <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <!-- Blog Post -->

                <!-- Title -->
                <h1>{{$post->title}}</h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#">{{$post->user->name}}</a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>

                <hr>
                @if($post->photo)
                <!-- Preview Image -->
                <img class="img-responsive" src="{{$post->photo->file}}" alt="">
                @endif
                <hr>

                <!-- Post Content -->
                <p>{{$post->body}}</p>

                <hr>
                
                @if(Session::has('comment_message'))
                    {{session('comment_message')}}
                @endif

                <!-- Blog Comments -->
                
                @if(Auth::check())

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    
                    {!! Form::open(['method' => 'POST', 'action' => 'PostCommentController@store']) !!}
                    
                    <input type="hidden" name="post_id" value="{{$post->id}}">
                    
                    <div class="form-group">
                       {!! Form::label('body', 'Body:') !!}
                       {!! Form::textarea('body', null, ['class' => 'form-control','rows'=>3]) !!}
                    </div>
                    
                    <div class="form-group">
                       {!! Form::submit('Submit Comment', ['class' => 'btn btn-primary']) !!}
                    </div>
                    
                    {!! Form::close() !!}
                    
                </div>
                
                @else
                
                    <h4>Log in to write comment!</h4>
                
                @endif

                <hr>

                <!-- Posted Comments -->
                
                @if(count($comments) > 0)
                
                @foreach($comments as $comment)
                
                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="{{$comment->photo}}" alt="" width="50px;">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">{{$comment->author}}
                            <small style="display:inline-block">{{$comment->created_at->diffForHumans()}}</small>
                        </h4>
                        {{$comment->body}}
                        
                        <!-- Nested Comment -->
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="{{$comment->photo}}" alt="" width="50px;">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">{{$comment->author}}
                                    <small style="display:inline-block">{{$comment->created_at->diffForHumans()}}</small>
                                </h4>
                                {{$comment->body}}
                            </div>
                            
                            
                            {!! Form::open(['method' => 'POST', 'action' => 'CommentRepliesController@createReply']) !!}
                            
                            <input type="hidden" name="comment_id" value="{{$comment->id}}">
                            
                            <div class="form-group">
                               {!! Form::label('body', 'Write Reply') !!}
                               {!! Form::textarea('body', null, ['class' => 'form-control','rows'=>'1']) !!}
                            </div>
                            
                            <div class="form-group">
                               {!! Form::submit('Reply', ['class' => 'btn btn-primary']) !!}
                            </div>
                            
                            {!! Form::close() !!}
                            
                        </div>
                        
                    </div>
                </div>
                
                @endforeach 

                @endif
            </div>

@endsection