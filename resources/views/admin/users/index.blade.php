@extends('layouts.admin')


@section('content')

  <h1>Users</h1>

  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th>User Status</th>
      </tr>
    </thead>
    <tbody>

      @if($users)

        @foreach($users as $user)

          <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->role->name}}</td>
            <td>{{$user->created_at->diffForHumans()}}</td>
            <td>{{$user->updated_at->diffForHumans()}}</td>
            <td>{{$user->is_active == 1 ? 'Active' : 'Disabled'}}</td>
          </tr>

        @endforeach

      @endif
    </tbody>
  </table>

@endsection
