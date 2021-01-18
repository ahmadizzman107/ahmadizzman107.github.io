@component('mail::message')
@if ($participant->validated)
# Congratulations

Your registration for {{ $post->title }} is approved.

Below are the details:-
Time: {{ \Carbon\Carbon::parse($post->time_start)->format('h:i A') }}
Location {{ $post->location }}

Enjoy the event.
@else
# Sorry

Your registration for {{ $post->title }} is denied.

Please registration again or contact us for more information.
@endif

@component('mail::button', ['url' => route('home') ])
Visit Us
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent