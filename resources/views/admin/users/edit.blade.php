@extends('layouts.admin')
@section('content')
    <h1>Edit Users</h1>
    <div class="row">
        <div class="col-sm-3">
            <img src="{!! asset($user->photo ? $user->photo->file : 'https://znews-photo.zadn.vn/w660/Uploaded/jaroin/2016_06_20/HoaiNhon4.png') !!}"
                 alt="" class="img-responsive img-rounded">
        </div>
        <div class="col-sm-9">
            {!! Form::model($user, ['method' => 'PATCH','action'=>['AdminUsersController@update',$user->id],'files'=>true])!!}
            <div class="form-group">
                {!! Form::label('name', 'Name: ')!!}
                {!! Form::text('name',null , ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email', 'Email: ')!!}
                {!! Form::email('email', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('role', 'Role: ')!!}
                {!! Form::select('role_id', array(''=>'Choose Option')+ $roles,null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('status', 'Status: ')!!}
                {!! Form::select('is_active', array(1=>'Active',0=>'Not Active'),null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('file', 'File: ')!!}
                {!! Form::file('photo_id',null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('password', 'Password: ')!!}
                {!! Form::password('password', ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Update User', ['class' => 'btn btn-primary col-sm-3']) !!}
            </div>
            {!! Form::close() !!}
            {!! Form::open(['method'=>'DELETE','action'=>['AdminUsersController@destroy',$user->id]]) !!}
            <div class="form-group">
                {!! Form::submit('Delete User', ['class' => 'btn btn-danger col-sm-3']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    <div class="col">
        @include('includes.form_error')
    </div>
@endsection
