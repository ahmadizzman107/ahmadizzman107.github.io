@extends('layouts.admin')

@section('title')
@section('content')
<div class="container" style="padding-top: 50px;">
    <div class="row justify-content-center">
        <div class="col-md-8" >
            <div class="card" style="box-shadow:-5px 2px;">
                <div class="card-header" style="background-color: #3A0B37;color: white;">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="container">
					  <form action="/action_page.php">
					    <label for="fname">Blog Title</label>
					    <input type="text" id="fname" name="firstname" placeholder="Your name.."><br>

					    <label for="lname">Author</label>
					    <input type="text" id="lname" name="lastname" placeholder="Your last name.."><br>

					    <label for="country">Publish Date</label>
					    <input type="text" id="lname" name="lastname" placeholder="Your last name.."><br>
					    <label for="subject">Summary</label>
					    <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>
					    <br>
					    <input type="submit" value="Published">
					  </form>
					</div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
