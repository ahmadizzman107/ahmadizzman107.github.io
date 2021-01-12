@extends('layouts.admin')

@section('content')
    <div class="container" style="padding-top: 50px;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="box-shadow:-5px 2px;">
                    <div class="card-header" style="background-color: #3A0B37;color: white;">Edit About Us</div>

                    <div class="card-body">
                        <form action="{{ route('update-about') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            {{-- About --}}
                            <div>
                                <label for="title">Title</label>
                                <input type="text" name="title_about" id="title_about" placeholder="Post Title"
                                    value="{{ $about->title_about }}">
                            </div>
                            <div>
                                <label for="body">Description</label>
                                <textarea name="desc_about" id="desc_about" cols="50"
                                    rows="10">{{ $about->desc_about }}</textarea>
                            </div>
                            {{-- Mission --}}
                            <div class="card-header" style="background-color: #3A0B37;color: white;">Mission</div>
                            <div>
                                <label for="title">Title</label>
                                <input type="text" name="title_mission" id="title_mission" placeholder="Post Title"
                                    value="{{ $about->title_mission }}">
                            </div>
                            <div>
                                <label for="body">Description</label>
                                <textarea name="desc_mission" id="desc_mission" cols="50"
                                    rows="10">{{ $about->desc_mission }}</textarea>

                            </div>
                            {{-- People --}}
                            <div class="card-header" style="background-color: #3A0B37;color: white;">People</div>
                            <div>
                                <label for="title">Title</label>
                                <input type="text" name="title_people" id="title_people" placeholder="Post Title"
                                    value="{{ $about->title_people }}">
                            </div>
                            <div>
                                <label for="body">Description</label>
                                <textarea name="desc_people" id="desc_people" cols="50"
                                    rows="10">{{ $about->desc_people }}</textarea>

                            </div>
                            {{-- Vision --}}
                            <div class="card-header" style="background-color: #3A0B37;color: white;">Vision</div>
                            <div>
                                <label for="title">Title</label>
                                <input type="text" name="title_vision" id="title_vision" placeholder="Post Title"
                                    value="{{ $about->title_vision }}">
                            </div>
                            <div>
                                <label for="body">Description</label>
                                <textarea name="desc_vision" id="desc_vision" cols="50"
                                    rows="10">{{ $about->desc_vision }}</textarea>

                            </div>
                            <div style="padding-top: 30px">
                                <button type="submit" class="button">Edit</button>
                                <a href="{{ url()->previous() }}" class="button">Back</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
