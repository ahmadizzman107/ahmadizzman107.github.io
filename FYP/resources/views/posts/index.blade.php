@extends('layouts.app')

@section('content')
    <div class="container">
        <div>
            <h1>Posts</h1>
            <a href="{{route('posts.create')}}" class="btn btn-primary">Create</a>
        </div>
        <div>
            @if(count($posts)>0)
                @foreach($posts as $post)
                    <h3><a href="/admin/posts/{{$post->id}}">{{$post->title}}</a></h3>
                    <small>Posted at {{$post->created_at}}</small>
                @endforeach
            @endif
        </div>

    </div>
@endsection
