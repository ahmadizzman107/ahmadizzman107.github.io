@extends('layouts.admin')

@section('content')
    <div class="container" style="padding-top: 50px;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="box-shadow:-5px 2px;">
                    <div class="card-header" style="background-color: #3A0B37;color: white;">Create Post</div>

                    <div class="card-body">
                        <form action="{{ route('posts') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div >
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title" placeholder="Post Title">
                            </div>
                            <div>
                                <label for="body">Body</label>
                                <textarea name="body" id="body" cols="50"
                                    rows="10"></textarea>
                            </div>
                            <label for="body">Image</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name="image">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                            <div>
                                <label for="date">Date</label>
                                <input type="date" id="date" name="date">
                            </div>
                            <div>
                                <label for="time_start">Starting Time</label>
                                <input type="time" id="time_start" name="time_start">
                            </div>
                            <div>
                                <label for="time_end">End Time</label>
                                <input type="time" id="time_end" name="time_end">
                            </div>
                            <div>
                                <label for="location">Location</label>
                                <input type="text" id="location" name="location">
                            </div>
                            <div style="padding-top: 30px">
                                <button type="submit" value="Create" class="button">Create</button>
                                <a href="{{ url()->previous() }}" class="button">Back</a>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
