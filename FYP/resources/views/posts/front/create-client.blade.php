@extends('layouts.admin')

@section('content')
<div class="container" style="padding-top: 50px;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="box-shadow:-5px 2px;">
                    <div class="card-header" style="background-color: #3A0B37;color: white;">Edit Post</div>

                    <div class="card-body">
                        <form action="{{ route('store-client') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name="image">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                            
                            <div>
                                <label for="name">Client Name</label>
                                <input type="text" name="name" id="name" placeholder="Client Name">
                            </div>
                            <div style="padding-top: 30px">
                                <button type="submit" class="button">Create</button>
                                <a href="{{ url()->previous() }}" class="button">Back</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
