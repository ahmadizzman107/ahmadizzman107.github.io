@extends('layouts.admin')

@section('content')
    <div class="container" style="padding-top: 50px;">
        <div class="card" style="box-shadow:-5px 2px;">
            <div class="card-header" style="background-color: #3A0B37;color: white;">Edit Post</div>
                <div class="card-body">
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
        </div>

    </div>
@endsection
