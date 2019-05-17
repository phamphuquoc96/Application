@extends('layouts.admin')
@section('content')
    <h1>Post</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Id</th>
            <th>Owner</th>
            <th>Category</th>
            <th>Photo</th>
            <th>Title</th>
            <th>Body</th>
            <th></th>
            <th></th>
            <th>Create at</th>
            <th>Update at</th>
        </tr>
        </thead>
        <tbody>
        @if($posts)
            @foreach($posts as $post)
                <tr>
                    <td><a href="{{route('posts.edit',$post->id)}}">{{$post->id}}</a></td>
                    <td>{{$post->user->name}}</td>
                    <td>{{$post->category ? $post->category->name : 'No category'}}</td>
                    <td><img height="50" width="50px"
                             src="{!! asset($post->photo ? $post->photo->file : 'No photo') !!}" alt=""></td>
                    <td>{{$post->title}}</td>
                    <td>{{str_limit($post->body,20)}}</td>
                    <td><a href="{{route('home.post',$post->id)}}">View Post</a></td>
                    <td><a href="{{route('comments.show',$post->id)}}">View Comment</a></td>
                    <td>{{$post->created_at ? $post->created_at->diffForHumans() : "null"}}</td>
                    <td>{{$post->updated_at ? $post->updated_at->diffForHumans() : "null"}}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
@stop
