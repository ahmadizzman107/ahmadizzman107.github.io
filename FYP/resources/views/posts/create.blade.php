@extends('layouts.admin')

@section('content')
        <div>
            
        </div>
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
                                <input type="text" name="body" id="body" placeholder="Post Body">
                            </div>
                            <label for="body">Image</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name="image">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                            <div style="padding-top: 30px">
                                <button type="submit" value="Create"></button>
                                <button href="{{ url()->previous() }}">ss</button>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
