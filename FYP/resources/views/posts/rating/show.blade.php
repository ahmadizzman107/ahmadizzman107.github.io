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
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
<div class="container" style="padding-top: 50px;">
    <div class="col-md-12">
        <div class="card" style="box-shadow:-5px 2px;">
            <div class="card-header" style="background-color: #3A0B37;color: white;">
                {{ __('Ratings') }}
            </div>
            <div class="card-body">
                @if (count($ratings) > 0)
                    <table class="table table-bordered table-responsive-lg table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Rating</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ratings as $rating)
                                <tr>
                                    <td scope="row">{{ ++$i }}</td>
                                    <td>{{ $rating->rating }}</td>
                                    <td>
                                        <form action={{ route('delete-rating', $rating->id) }} method="POST"
                                            onsubmit="return ConfirmDelete()">
                                            <a data-toggle="modal" id="LargeButton" data-target="#LargeModal"
                                                data-attr={{ route('detail-rating', $rating->id) }} title="Show">
                                                <i class="fas fa-eye text-success  fa-lg"></i>
                                            </a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" title="Delete"
                                                style="border: none; background-color:transparent;">
                                                <i class="fas fa-trash fa-lg text-danger"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>                    
                @else
                    No ratings yet.
                @endif
            </div>

        </div>
        <a href={{ route('index-rating') }} class="button">Back</a>
    </div>
</div>

@include('events.modal')
@endsection