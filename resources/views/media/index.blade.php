@extends('layouts.admin')
@section('content')
    <h1>Media</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Create at</th>
            <th>Update at</th>
        </tr>
        </thead>
        <tbody>
        @if($photos)
            @foreach($photos as $photo)
                <tr>
                    <td>{{$photo->id}}</td>
                    <td>{{$photo->file}}</td>
                    <td><img height="50" width="50px"
                             src="{!! asset($photo->file) !!}" alt=""></td>
                    <td>{{$photo->created_at ? $photo->created_at->diffForHumans() : "null"}}</td>
                    <td>{{$photo->updated_at ? $photo->updated_at->diffForHumans() : "null"}}</td>
                    <td>
                        {!! Form::open(['method'=>'DELETE','action'=>['AdminMediasController@destroy',$photo->id]]) !!}
                        <div class="form-group">
                            {!! Form::submit('Delete IMG', ['class' => 'btn btn-danger']) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
@endsection