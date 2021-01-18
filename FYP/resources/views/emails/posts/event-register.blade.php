@component('mail::message')
@if (empty($post->fees))
# Thank You

You, {{ $participant->name }} have registered to the {{ $post->title }} event.

Below are the details:-
Time: {{ \Carbon\Carbon::parse($post->time_start)->format('h:i A') }}
Location {{ $post->location }}

Enjoy the event.
@else
# Thank You

You, {{ $participant->name }} have registered to the {{ $post->title }} event.

We will confirm your registration soon.
@endif

@component('mail::button', ['url' => route('home') ])
Visit Us
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
