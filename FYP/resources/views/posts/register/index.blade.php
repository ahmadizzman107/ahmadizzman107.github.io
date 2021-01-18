@extends('layouts.admin')
@section('content')
    <div class="container" style="padding-top: 50px;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="box-shadow:-5px 2px;">
                    <div class="card-header" style="background-color: #3A0B37;color: white;">
                        <h1>Posts</h1>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div>
                            <form action={{ route('email-validate') }} method="POST">
                                @csrf
                                @method('PUT')
                                @if (count($posts) > 0)
                                    @foreach ($posts as $post)
                                        <a href="{{ route('show-validate', $post->id) }}"><label
                                                style="display: block; font-size: 25px;">{{ $post->title }}</label></a>
                                        @if (count($post->participant) > 0)
                                            <input type="checkbox" class="broadcast_check" name="check[]"
                                                value={{ $post->id }}>
                                        @endif
                                        <small>Posted at {{ $post->created_at }}</small>
                                    @endforeach
                                @else
                                    No events yet.
                                @endif
                        </div>

                    </div>
                </div>
                

            <div class="float-right"><input type="checkbox" name="check[]" id="check_all" value="-1"><label
                    for="check_all">Select
                    All</label>
                <button type="submit" class="button">Validate</button>
                <a href={{ route('admin') }} class="button">Back</a>
            </div>
            </div>            
            </form>
        </div>
    </div>
<script>
    $(function() {
        $("#check_all").change(function() {
            $("input:checkbox.broadcast_check").prop('checked', $(this).prop("checked"));
        });
        $(".broadcast_check").change(function() {
            _tot = $(".broadcast_check").length
            _tot_checked = $(".broadcast_check:checked").length;

            if (_tot != _tot_checked) {
                $("#check_all").prop('checked', false);
            }
        });
    });

</script>    
@endsection