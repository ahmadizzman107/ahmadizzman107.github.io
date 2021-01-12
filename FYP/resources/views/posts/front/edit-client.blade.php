@extends('layouts.admin')

@section('content')
<script>
    function ConfirmDelete()
    {
        var x = confirm("Confirm client deletion?");
        if (x)
            return true;
        else
            return false;
    }
</script>

<div class="container" style="padding-top: 50px;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="box-shadow:-5px 2px;">
                    <div class="card-header" style="background-color: #3A0B37;color: white;">Edit Post</div>

                    <div class="card-body">
                        <form action="{{ route('update-client', $client->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div>
                                <img src={{ $imagePath }}>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name="image">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>

                            <div>
                                <label for="name">Client Name</label>
                                <input type="text" name="name" id="name" placeholder="Client Name" value="{{ $client->name }}">
                            </div>
                            <div style="padding-top: 30px">
                                <button type="submit" class="button">Update</button>
                                <a href="{{ url()->previous() }}" class="button">Back</a>
                            </div>
                        </form>
                        <form action="{{ route('destroy-client',$client->id) }}" method="POST" onsubmit="return ConfirmDelete()">
                            @csrf
                            <button type="submit" class="button">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
