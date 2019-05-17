@extends('layouts.admin')
@section('content')
    <h1>Comments</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Id</th>
            <th>Author</th>
            <th>Email</th>
            <th>Body</th>
            <th>Create at</th>
            <th>Update at</th>
        </tr>
        </thead>
        <tbody>
        @if($comments)
            @foreach($comments as $comment)
                <tr>
                    <td>{{$comment->id}}</td>
                    <td>{{$comment->author}}</td>
                    <td>{{$comment->email}}</td>
                    <td>{{$comment->body}}</td>
                    {{--                    <td><img height="50px" width="50px" src="{{$user->photo == null ? 'User has not Photo':$user->photo->file}}"></td>--}}
                    {{--                    <td><img height="50" width="50px"--}}
                    {{--                             src="{!! asset($user->photo ? $user->photo->file : 'No photo') !!}" alt=""></td>--}}
                    {{--                    <td><a href="{{route('users.edit',$user->id)}}">{{$user->name}}</a></td>--}}
                    {{--                    <td>{{$user->email}}</td>--}}
                    {{--                    <td>{{$user->is_active == 1 ? 'Active' : 'Not Active'}}</td>--}}
                    {{--                    <td>{{$user->role == null ? 'User has no role': $user->role->name}}</td>--}}
                    <td>{{$comment->created_at->diffForHumans()}}</td>
                    <td>{{$comment->updated_at->diffForHumans()}}</td>
                    <td><a href="{{route('home.post',$comment->post->id)}}">View Post</a></td>
                    <td>
                        @if($comment->is_active == 1)
                            {!! Form::open(['method'=>'PATCH','action'=>['PostCommentsController@update',$comment->id]]) !!}
                            <input type="hidden" name="is_active" value="0">
                            <div class="form-group">
                                {!! Form::submit('un-approve' , ['class' => 'btn btn-success']) !!}
                            </div>
                            {!! Form::close() !!}
                        @else
                            {!! Form::open(['method'=>'PATCH','action'=>['PostCommentsController@update',$comment->id]]) !!}
                            <input type="hidden" name="is_active" value="1">
                            <div class="form-group">
                                {!! Form::submit('Approve' , ['class' => 'btn btn-info']) !!}
                            </div>
                            {!! Form::close() !!}
                        @endif
                    </td>
                    <td>
                        {!! Form::open(['method'=>'DELETE','action'=>['PostCommentsController@destroy',$comment->id]]) !!}
                        <div class="form-group">
                            {!! Form::submit('Delete' , ['class' => 'btn btn-danger']) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
@endsection
