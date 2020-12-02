@extends('layouts.admin')

@section('content')

    <div class="container" style="padding-top: 50px;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="box-shadow:-5px 2px;">
                    <div class="card-header" style="background-color: #3A0B37;color: white;">Edit Post</div>

                    <div class="card-body">
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
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name="image">
                                <label class="custom-file-label" for="customFile">Choose file</label>
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
