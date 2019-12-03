@component('mail::message')
## Bokito {{ $user->name }}, dobro došli na moj blogito!

The body of your message.

@component('mail::button', ['url' => 'http:\\algebra.hr'])
Započnimo s bloganjem!
@endcomponent

Fala<br>
{{ config('app.name') }}
@endcomponent
