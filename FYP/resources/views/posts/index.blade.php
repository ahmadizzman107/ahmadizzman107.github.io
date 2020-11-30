@extends('layouts.admin')

@section('content')
    <div class="container" style="padding-top: 50px;">
        <h1>Posts</h1>

        <div>
           
            @if(count($posts)>0)
            
                @foreach($posts as $post)
                
                    <h3><a href="/admin/posts/{{$post->id}}">{{$post->title}}</a></h3>
                    <small>Posted at {{$post->created_at}}</small>
                
                @endforeach
            
            @endif
        </div>
        <div>
            
            <a href="{{route('posts.create')}}" class="btn btn-primary"> Create</a>
        </div>
    </div>
@endsection
