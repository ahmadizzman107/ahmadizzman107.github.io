@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Create Post</h1>
        <div>
            <a href="{{ url()->previous() }}">Back</a>
        </div>
            <form action="{{ route('posts') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div >
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" placeholder="Post Title">
                </div>
                <div>
                    <label for="body">Body</label>
                    <input type="text" name="body" id="body" placeholder="Post Body">
                </div>
                <div>
                    <label for="image">Image</label>
                    <input type="file" name="image" >
                </div>
                <div>
                    <button type="submit">Create</button>
                </div>
            </form>
    </div>
@endsection
