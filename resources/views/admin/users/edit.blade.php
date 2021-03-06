@extends('layouts.admin')


@section('content')

<div class="row">
      <h1>Edit Users</h1>
      
      <div class="col-sm-12">
             @include('includes.form_alert')
        </div>
      
          
          <div class="col-sm-3">
              <img src="{{$user->photo ? $user->photo->file : '/images/default.png'}}" alt="" class="img-responsive img-rounded">
          </div>
       
      
        <div class="col-sm-9">
                  
                   {!! Form::model($user,['method' => 'PATCH', 'action' => ['AdminUsersController@update', $user->id],'files'=>true]) !!}
                    <div class="form-group">
                      {!! Form::label('name', 'Name:') !!}
                      {!! Form::text('name',null ,['class'=>'form-control']) !!}
                    </div>
      
                    <div class="form-group">
                      {!! Form::label('email', 'Email:') !!}
                      {!! Form::email('email',null ,['class'=>'form-control']) !!}
                    </div>
      
                    <div class="form-group">
                      {!! Form::label('is_active', 'Status:') !!}
                      {!! Form::select('is_active',array(1 => 'Active', 0 => 'Disabled'), null ,['class'=>'form-control']) !!}
                    </div>
      
                    <div class="form-group">
                      {!! Form::label('role_id', 'Role:') !!}
                      {!! Form::select('role_id',['' => 'Select Role'] + $roles,null ,['class'=>'form-control']) !!}
                    </div>
      
                    <div class="form-group">
                      {!! Form::label('photo_id', 'Upload Image:') !!}
                      {!! Form::file('photo_id',null ,['class'=>'form-control']) !!}
                    </div>
      
                    <div class="form-group">
                      {!! Form::label('password', 'Password:') !!}
                      {!! Form::password('password',['class'=>'form-control']) !!}
                    </div>
      
                    <div class="form-group col-sm-4">
                      {!! Form::submit('Update User',['class'=>'btn btn-primary']) !!}
                    </div>
                  {!! Form::close() !!}
                  
                  
                  {!!  Form::open(['method' => 'DELETE', 'action' => ['AdminUsersController@destroy', $user->id] ])  !!}
                        <div class="form-group col-sm-4">
                          {!! Form::submit('Delete User',['class'=>'btn btn-danger']) !!}
                        </div>
                  {!!  Form::close()  !!}
      
        </div>
  </div>
  

  
@endsection
