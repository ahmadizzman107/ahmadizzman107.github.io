@component('mail::message')
# Hello {{ $participant->name }},

We would like you to fill in this rating form regarding the recent event that you have joined, {{ $post->title }}.

@component('mail::button', ['url' => route('rating-form')])
Open
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
