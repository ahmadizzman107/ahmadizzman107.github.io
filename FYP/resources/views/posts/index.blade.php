@extends('layouts.admin')
@section('title')
@section('content'){{--Dashboard layout --}}
    <div class="container" style="padding-top: 50px;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="box-shadow:-5px 2px;">
                    <div class="card-header" style="background-color: #3A0B37;color: white;">Dashboard</div>

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
                                    <a href="{{ route('show', $post->id) }}"><label style="display: block; font-size: 25px;">{{ $post->title }}</label></a>
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
