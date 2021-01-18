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
                {{ __('Registration Validation') }}
            </div>
            <div class="card-body">
                @if (count($participants) > 0)
                    <table class="table table-bordered table-responsive-lg table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Fees</th>
                                <th scope="col">Date Created</th>
                                <th scope="col">Validated</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($participants as $participant)
                                <tr>
                                    <td scope="row">{{ ++$i }}</td>
                                    <td>{{ $participant->name }}</td>
                                    <td>
                                        @if (empty($participant->post->fees))
                                            <span>FOC</span>
                                        @else
                                            {{ $participant->post->fees }}
                                        @endif
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($participant->created_at)->format('j M Y h:i A') }}
                                    </td>
                                    <td>
                                        @if ($participant->validated == true || empty($participant->post->fees))
                                            <i class="fas fa-check-circle fa-lg"></i>
                                        @else
                                            <i class="fas fa-ban fa-lg"></i>
                                        @endif
                                    </td>
                                    <td>
                                        <form action={{ route('delete-validate', $participant->id) }} method="POST"
                                            onsubmit="return ConfirmDelete()">
                                            <a data-toggle="modal" id="LargeButton" data-target="#LargeModal"
                                                data-attr={{ route('show-detail', $participant->id) }} title="Show">
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
                    No registration yet.
                @endif
            </div>

        </div>
        <a href={{ route('index-validate') }} class="button">Back</a>
    </div>
</div>

@include('events.modal')

@endsection