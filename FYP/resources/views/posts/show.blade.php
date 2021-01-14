@extends('layouts.admin')

@section('content')
    <script>
        function ConfirmDelete() {
            var x = confirm("Confirm post deletion?");
            if (x)
                return true;
            else
                return false;
        }

    </script>

    <div class="container" style="padding-top: 50px;">
        <div class="col-md-10">
            <div class="card" style="box-shadow:-5px 2px;">
                <div class="card-header" style="background-color: #3A0B37;color: white;">{{ $post->title }}</div>
                <div class="card-body">
                    <div>
                        <img src={{ $imagePath }}>
                    </div>
                    <div>
                        <p>{{ $post->body }}</p>
                    </div>
                    <div>
                        <span>Date: {{ \Carbon\Carbon::parse($post->date)->format('j F, Y') }}</span>
                        <div>
                            <span>Start Time: {{ \Carbon\Carbon::parse($post->time_start)->format('h:i A') }}</span>
                        </div>
                        <div>
                            <span>End Time: {{ \Carbon\Carbon::parse($post->time_end)->format('h:i A') }}</span>
                        </div>
                    </div>
                    <div>
                        <span>Location: {{ $post->location }}</span>
                    </div>
                    <div>
                        <span>Fees: {{ isset($post->fees) ? 'RM '.$post->fees : 'FOC' }}</span>
                    </div>
                    <hr>
                    <small>Posted at {{ $post->created_at }}</small>
                    <hr>
                    <div>
                        <form action="{{ route('destroy', $post->id) }}" method="POST" onsubmit="return ConfirmDelete()">
                            @csrf
                            <a href="{{ route('edit', $post->id) }}" class="button">Edit</a>
                            <button type="submit" class="button">Delete</button>
                            <a href="{{ url()->previous() }}" class="button">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
