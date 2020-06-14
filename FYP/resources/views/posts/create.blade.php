@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Post</h1>
            {!! Form::open(['action' => 'PostsController@store','files'=>true,'method' => 'POST']) !!}
                <div>
                    {{Form::label('title','Title')}}
                    {{ Form::text('title','',['placeholder' => 'Title']) }}
                </div>
                <div>
                    {{Form::label('body','Body')}}
                    {{ Form::textarea('body','',['placeholder' => 'Body']) }}
                </div>
                <div>
                    {{Form::label('image','Image')}}
                    {{Form::file('image')}}
                </div>
                {{Form::submit('Create')}}
            {!! Form::close() !!}

    </div>
@endsection
