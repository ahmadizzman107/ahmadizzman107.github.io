@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Edit Post</h1>
        <div>
            <a href="{{ url()->previous() }}">Back</a>
        </div>
        <form action="{{ route('update',$post->id) }}" method="POST"  enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div >
            <label for="title">Title</label>
            <input type="text" name="title" id="title" placeholder="Post Title" value="{{ $post->title }}">
        </div>
        <div>
            <label for="body">Body</label>
            <input type="text" name="body" id="body" placeholder="Post Body" value="{{ $post->body }}">
        </div>
        <div>
            <label for="image">Image</label>
            <input type="file" name="image" id="image">
        </div>
        <div>
            <button type="submit">Update</button>
        </div>
        </form>
    </div>
@endsection
