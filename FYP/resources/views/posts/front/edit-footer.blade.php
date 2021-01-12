@extends('layouts.admin')

@section('content')
    <div class="container" style="padding-top: 50px;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="box-shadow:-5px 2px;">
                    <div class="card-header" style="background-color: #3A0B37;color: white;">Edit Footer</div>

                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            {{-- Address --}}
                            <div>
                                <label for="address">Address</label>
                                <textarea name="address" id="address" cols="50"
                                    rows="10">{{ $footer->address }}</textarea>
                            </div>
                            {{-- Contacts --}}
                            <div>
                                <label for="tel_no">Tel No. :</label>
                                <input type="tel" name="tel_no" id="tel_no" pattern="(+60)[0-9]-[0-9]{4} [0-9]{4}"
                                    value="{{ $footer->tel_no }}">
                            </div>
                            <div>
                                <label for="fax_no">Fax No. :</label>
                                <input type="tel" name="fax_no" id="fax_no" pattern="(+60)[0-9]-[0-9]{4} [0-9]{4}"
                                    value="{{ $footer->fax_no }}">
                            </div>
                            <div>
                                <label for="email">Email :</label>
                                <input type="email" name="email" id="email" placeholder="example@mail.com"
                                    value="{{ $footer->email }}" size="30">
                            </div>
                            {{-- Websites --}}
                            <div class="card-header" style="background-color: #3A0B37;color: white;">Websites</div>
                            <div>
                                <label for="twitter">Twitter</label>
                                <input type="url" name="twitter" id="twitter" 
                                    value="{{ $footer->twitter }}" size="60">
                            </div>
                            <div>
                                <label for="facebook">Facebook</label>
                                <input type="url" name="facebook" id="facebook" 
                                    value="{{ $footer->facebook }}" size="60">
                            </div>
                            <div>
                                <label for="instagram">Instagram</label>
                                <input type="url" name="instagram" id="instagram" 
                                    value="{{ $footer->instagram }}" size="60">
                            </div>
                            <div>
                                <label for="linkedin">LinkedIn</label>
                                <input type="url" name="linkedin" id="linkedin" 
                                    value="{{ $footer->linkedin }}" size="60">
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
