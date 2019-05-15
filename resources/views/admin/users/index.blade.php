@extends('layouts.admin')
@section('content')
    <h1>Users</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Id</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Active</th>
            <th>Create at</th>
            <th>Update at</th>
        </tr>
        </thead>
        <tbody>
        @if($users)
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
{{--                    <td><img height="50px" width="50px" src="{{$user->photo == null ? 'User has not Photo':$user->photo->file}}"></td>--}}
                    <td><img height="50" width="50px" src="{!! asset($user->photo ? $user->photo->file : 'No photo') !!}" alt=""></td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->is_active == 1 ? 'Active' : 'Not Active'}}</td>
                    <td>{{$user->role == null ? 'User has no role': $user->role->name}}</td>
                    <td>{{$user->created_at->diffForHumans()}}</td>
                    <td>{{$user->updated_at->diffForHumans()}}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
@endsection
