@extends('layouts.app')

@section('content')
    <script>
        function ConfirmDelete()
        {
            var x = confirm("Confirm post deletion?");
            if (x)
                return true;
            else
                return false;
        }
    </script>
    
    <div class="container">
        <h1>{{$post->title}}</h1>
        <div>
            <img src={{asset('storage/images/'.$post->image)}}>
        </div>
        <div>
            <p>{{$post->body}}</p>
        </div>
        <hr>
        <small>Posted at {{$post->created_at}}</small>
        <hr>
        <div>
            <a href="/admin/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a>
            {!! Form::open(['action' => ['PostsController@destroy',$post->id],'method' => 'POST','onsubmit'=>'return ConfirmDelete()']) !!}
            {{Form::hidden('_method','DELETE')}}
            {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
