<div class="col-lg-3 col-md-6 footer-newsletter">
    <h4>Feedback</h4>
    <div>
        {!! Form::open(['action'=>'WelcomeController@store','method'=>'POST']) !!}
        <div>
            {{ Form::text('name',null,['placeholder'=>'Your Name','style'=>'width: 100%;margin-bottom:10px;padding: 5px 5px']) }}
        </div>
        <div>
            {{Form::email('email',null,['placeholder'=>'Your Email','style'=>'width: 100%;margin-bottom:10px'])}}
        </div>
        <div>
            {{Form::textarea('message',null,['placeholder'=>'Your Message','style'=>'width: 100%; height:80px;padding: 0px 5px'])}}
        </div>
        {{Form::submit('Send Feedback')}}
    </div>
</div>
