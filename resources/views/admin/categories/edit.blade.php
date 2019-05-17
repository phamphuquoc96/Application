@extends('layouts.admin')
@section('content')
    <h1>Category</h1>
    {!! Form::model($category,['method' => 'PATCH','action'=>['AdminCategoriesController@update',$category->id],'files'=>true])!!}
    <div class="form-group">
        {!! Form::label('name', 'Name: ')!!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Update Category', ['class' => 'btn btn-primary col-sm-3']) !!}
    </div>
    {!! Form::close()!!}
    {!! Form::open(['method'=>'DELETE','action'=>['AdminCategoriesController@destroy',$category->id]]) !!}
    <div class="form-group">
        {!! Form::submit('Delete Post', ['class' => 'btn btn-danger col-sm-3']) !!}
    </div>
    {!! Form::close()!!}
@stop