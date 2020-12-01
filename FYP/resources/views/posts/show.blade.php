@extends('layouts.admin')

@section('content')
    <script>
        function ConfirmDelete()
        {
            var x = confirm("Confirm post deletion?");
            if (x)
                return true;
            else
                return false;
        }
    </script>
    
    <div class="container" style="padding-top: 50px;">
        <div>
            <a href="{{ url()->previous() }}">Back</a>
        </div>
        <h1>{{$post->title}}</h1>
        <div>
            <img src={{ $imagePath }}>
        </div>
        <div>
            <p>{{$post->body}}</p>
        </div>
        <div>
        </div>
        <hr>
        <small>Posted at {{$post->created_at}}</small>
        <hr>
        <div>
            <a href="{{ route('edit',$post->id) }}" class="btn btn-primary">Edit</a>
            
            <form action="{{ route('destroy',$post->id) }}" method="POST" onsubmit="return ConfirmDelete()">
                @csrf
                <button type="submit">Delete</button>
            </form>
        </div>
    </div>
@endsection
