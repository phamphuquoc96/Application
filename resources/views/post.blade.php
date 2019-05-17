@extends('layouts.blog-post')
@section('content')
    <h1>Post</h1>
    <!-- Blog Post -->

    <!-- Title -->
    <h1>{{$post->title}}</h1>

    <!-- Author -->
    <p class="lead">
        by <a href="#">{{$post->user->name}}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    {{--    <p><span class="glyphicon glyphicon-time"></span> Posted on August 24, 2013 at 9:00 PM</p>--}}
    <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="{!! asset($post->photo ? $post->photo->file :"http://placehold.it/900x300") !!}"
         alt="">

    <hr>

    <!-- Post Content -->
    <p class="lead">{{$post->body}}</p>

    <hr>

    <!-- Blog Comments -->

    <!-- Comments Form -->
    <div class="well">
        <h4>Leave a Comment:</h4>
        {{--        <form role="form">--}}
        {{--            <div class="form-group">--}}
        {{--                <textarea class="form-control" rows="3"></textarea>--}}
        {{--            </div>--}}
        {{--            <button type="submit" class="btn btn-primary">Submit</button>--}}
        {{--        </form>--}}
        {!! Form::open(['method'=>'POST','action'=>'PostCommentsController@store']) !!}
        <input type="hidden" name="post_id" value="{{$post->id}}">
        <div class="form-group">
            {!! Form::textarea('body',null , ['class' => 'form-control', 'rows'=>5]) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Submit' , ['class' => 'btn btn-primary']) !!}
            @if(session()->has('comment_message'))
                {{session('comment_message')}}
            @endif
        </div>
        {!! Form::close() !!}

    </div>

    <hr>

    <!-- Posted Comments -->

    <!-- Comment -->
    @if(count($comments)>0)
        @foreach($comments as $comment)
            <div class="media">
                <a class="pull-left" href="#">
                    <img height="64px" width="64px" class="media-object" src="{!! asset($comment->photo) !!}" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">{{$comment->author}}
                        <small>{{$comment->created_at->diffForHumans()}}</small>
                    </h4>
                    {{$comment->body}}

                    @if(count($comment->replies)>0)
                        @foreach($comment->replies as $reply)
                            <div class="media">
                                <a class="pull-left" href="#">
                                    <img height="64px" width="64px" class="media-object"
                                         src="{!!asset($reply->photo)!!}"
                                         alt="">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">{{$reply->author}}
                                        <small>{{$reply->created_at->diffForHumans()}}</small>
                                    </h4>
                                    {{$reply->body}}
                                </div>
                            </div>
                        @endforeach
                        {!! Form::open(['method'=>'POST','action'=>'CommentRepliesController@createReply']) !!}
                        <input type="hidden" name="comment_id" value="{{$comment->id}}">
                        <div class="form-group">
                            {!! Form::label('title' ,'Body: ') !!}
                            {!! Form::textarea('body',null , ['class' => 'form-control', 'rows'=>1]) !!}
                        </div>
                        <div class="form-group"> {!! Form::submit('Submit' , ['class' => 'btn btn-primary']) !!}
                            @if(session()->has('rely_message')) {{session('rely_message')}}
                            @endif
                        </div>
                        {!! Form::close() !!}
                    @endif
                </div>
            </div>
        @endforeach
    @endif
    <!-- Comment -->
    <div class="media">
        <a class="pull-left" href="#">
            <img class="media-object" src="http://placehold.it/64x64" alt="">
        </a>
        <div class="media-body">
            <h4 class="media-heading">Start Bootstrap
                <small>August 25, 2014 at 9:30 PM</small>
            </h4>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras
            purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate
            fringilla. Donec lacinia congue felis in faucibus.
            <!-- Nested Comment -->
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">Nested Start Bootstrap
                        <small>August 25, 2014 at 9:30 PM</small>
                    </h4>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo.
                    Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi
                    vulputate fringilla. Donec lacinia congue felis in faucibus.
                </div>
            </div>
            <!-- End Nested Comment -->
        </div>
    </div>
@endsection
