@extends('layouts.admin')
@section('content')
    <h1>Category</h1>
    <div class="col-sm-6">
        {!! Form::open(['method' => 'POST','action'=>['AdminCategoriesController@store'],'files'=>true])!!}
        <div class="form-group">
            {!! Form::label('name', 'Name: ')!!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Create Category', ['class' => 'btn btn-primary']) !!}
        </div>
        {!! Form::close()!!}
    </div>
    <div class="col-sm-6">
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
            @if($categoies)
                @foreach($categoies as $category)
                    <tr>
                        <td><a href="{{route('categories.edit',$category->id)}}">{{$category->id}}</a></td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->created_at ? $category->created_at->diffForHumans() : "null"}}</td>
                        <td>{{$category->updated_at ? $category->updated_at->diffForHumans() : "null"}}</td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@stop