@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Post</h1>
        {!! Form::open(['action' => ['PostsController@update',$post->id],'files'=>true,'method' => 'POST']) !!}
        <div>
            {{Form::label('title','Title')}}
            {{ Form::text('title',$post->title,['placeholder' => 'Title']) }}
        </div>
        <div>
            {{Form::label('body','Body')}}
            {{ Form::textarea('body',$post->body,['placeholder' => 'Body']) }}
        </div>
        <div>
            {{Form::label('image','Image')}}
            {{Form::file('image')}}
        </div>
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Edit',['class' => 'btn btn-primary'])}}
        {!! Form::close() !!}

    </div>
@endsection
