@component('mail::message')
# Contact Us

## {{ $mailData['name'] }} - {{ $mailData['email'] }}

<p>{{ $mailData['content'] }}</p>

@component('mail::button', ['url' => $mailData['url']])
Go to HYDRA DONGLE
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
