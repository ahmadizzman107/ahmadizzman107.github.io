@extends('layouts.admin')

@section('content')
    <div class="container" style="padding-top: 50px;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="box-shadow:-5px 2px;">
                    <div class="card-header" style="background-color: #3A0B37;color: white;">Edit Products & Services
                    </div>

                    <div class="card-body">
                        <form action="{{ route('update-services') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            {{-- Products & Services --}}
                            <div>
                                <label for="title">Title</label>
                                <input type="text" name="title_services" id="title_services" placeholder="Post Title"
                                    value="{{ $service->title_services }}">
                            </div>
                            {{-- Tile 1 --}}
                            <div class="card-header" style="background-color: #3A0B37;color: white;">Tile 1</div>
                            <div>
                                <label for="title">Title</label>
                                <input type="text" name="title_tile_1" id="title_tile_1" placeholder="Post Title" size="40"
                                    value="{{ $service->title_tile_1 }}">
                            </div>
                            <div>
                                <label for="body">Description</label>
                                <textarea name="desc_tile_1" id="desc_tile_1" cols="50"
                                    rows="10">{{ $service->desc_tile_1 }}</textarea>

                            </div>
                            {{-- Tile 2 --}}
                            <div class="card-header" style="background-color: #3A0B37;color: white;">Tile 2</div>
                            <div>
                                <label for="title">Title</label>
                                <input type="text" name="title_tile_2" id="title_tile_2" placeholder="Post Title" size="40"
                                    value="{{ $service->title_tile_2 }}">
                            </div>
                            <div>
                                <label for="body">Description</label>
                                <textarea name="desc_tile_2" id="desc_tile_2" cols="50"
                                    rows="10">{{ $service->desc_tile_2 }}</textarea>

                            </div>
                            {{-- Tile 3 --}}
                            <div class="card-header" style="background-color: #3A0B37;color: white;">Tile 3</div>
                            <div>
                                <label for="title">Title</label>
                                <input type="text" name="title_tile_3" id="title_tile_3" placeholder="Post Title" size="40"
                                    value="{{ $service->title_tile_3 }}">
                            </div>
                            <div>
                                <label for="body">Description</label>
                                <textarea name="desc_tile_3" id="desc_tile_3" cols="50"
                                    rows="10">{{ $service->desc_tile_3 }}</textarea>

                            </div>
                            {{-- Tile 4 --}}
                            <div class="card-header" style="background-color: #3A0B37;color: white;">Tile 4</div>
                            <div>
                                <label for="title">Title</label>
                                <input type="text" name="title_tile_4" id="title_tile_4" placeholder="Post Title" size="40"
                                    value="{{ $service->title_tile_4 }}">
                            </div>
                            <div>
                                <label for="body">Description</label>
                                <textarea name="desc_tile_4" id="desc_tile_4" cols="50"
                                    rows="10">{{ $service->desc_tile_4 }}</textarea>

                            </div>
                            {{-- Tile 5 --}}
                            <div class="card-header" style="background-color: #3A0B37;color: white;">Tile 5</div>
                            <div>
                                <label for="title">Title</label>
                                <input type="text" name="title_tile_5" id="title_tile_5" placeholder="Post Title" size="40"
                                    value="{{ $service->desc_tile_5 }}">
                            </div>
                            <div>
                                <label for="body">Description</label>
                                <textarea name="desc_tile_5" id="desc_tile_5" cols="50"
                                    rows="10">{{ $service->desc_tile_5 }}</textarea>

                            </div>
                            {{-- Tile 6 --}}
                            <div class="card-header" style="background-color: #3A0B37;color: white;">Tile 6</div>
                            <div>
                                <label for="title">Title</label>
                                <input type="text" name="title_tile_6" id="title_tile_6" placeholder="Post Title" size="40"
                                    value="{{ $service->title_tile_6 }}">
                            </div>
                            <div>
                                <label for="body">Description</label>
                                <textarea name="desc_tile_6" id="desc_tile_6" cols="50"
                                    rows="10">{{ $service->desc_tile_6 }}</textarea>

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
