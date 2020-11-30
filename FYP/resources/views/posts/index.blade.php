@extends('layouts.app')
@section('title')
@section('content'){{--Dashboard layout --}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h1>Posts</h1>
                        <div>
                            @if (count($posts) > 0)
                                @foreach ($posts as $post)
                                    <h3><a href="{{ route('show', $post->id) }}">{{ $post->title }}</a></h3>
                                    <small>Posted at {{ $post->created_at }}</small>
                                @endforeach
                            @else
                                No posts yet.
                            @endif                            
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div>
                <a href="{{ route('posts') }}" class="btn btn-primary">Create</a>
            </div>

        </div>
    </div>
@endsection
