@extends('layouts.admin')
@section('content')
    <h1>Users</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Id</th>
            <th>Owner</th>
            <th>Title</th>
            <th>Body</th>
            <th>Create at</th>
            <th>Update at</th>
        </tr>
        </thead>
        <tbody>
        @if($posts)
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->user->name}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->body}}</td>
                    <td>{{$post->created_at ? $post->created_at->diffForHumans() : "null"}}</td>
                    <td>{{$post->updated_at ? $post->updated_at->diffForHumans() : "null"}}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
@stop