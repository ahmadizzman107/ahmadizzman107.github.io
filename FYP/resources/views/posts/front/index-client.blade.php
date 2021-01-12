@extends('layouts.admin')
@section('title')
@section('content'){{--Dashboard layout --}}
    <div class="container" style="padding-top: 50px;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="box-shadow:-5px 2px;">
                    <div class="card-header" style="background-color: #3A0B37;color: white;">
                        <h1>Clients</h1>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div>
                            @if (count($clients) > 0)
                                @foreach ($clients as $client)
                                    <a href="{{ route('edit-client', $client->id) }}"><label
                                            style="display: block; font-size: 25px;">{{ $client->name }}</label></a>
                                @endforeach
                            @else
                                No clients yet.
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div>
                <a href="{{ route('create-client') }}" class="button">Create</a>
            </div>

        </div>
    </div>
@endsection
