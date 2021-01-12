@extends('layouts.admin')

@section('content')

    <div class="container" style="padding-top: 50px;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="box-shadow:-5px 2px;">
                    <div class="card-header" style="background-color: #3A0B37;color: white;">Edit Post</div>

                    <div class="card-body">
                        <form action="{{ route('update', $post->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div>
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title" placeholder="Post Title"
                                    value="{{ $post->title }}">
                            </div>
                            <div>
                                <label for="body">Body</label>
                                <input type="text" name="body" id="body" placeholder="Post Body" value="{{ $post->body }}">
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name="image">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                            <div>
                                <label for="date">Date</label>
                                <input type="date" id="date" name="date" value="{{ $post->date }}">
                            </div>
                            <div>
                                <label for="time_start">Starting Time</label>
                                <input type="time" id="time_start" name="time_start" value="{{ $post->time_start }}">
                            </div>
                            <div>
                                <label for="time_end">End Time</label>
                                <input type="time" id="time_end" name="time_end" value="{{ $post->time_end }}">
                            </div>
                            <div>
                                <label for="location">Location</label>
                                <input type="text" id="location" name="location" value="{{ $post->location }}">
                            </div>
                            <div style="padding-top: 30px">
                                <button type="submit" class="button">Update</button>
                                <a href="{{ url()->previous() }}" class="button">Back</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
