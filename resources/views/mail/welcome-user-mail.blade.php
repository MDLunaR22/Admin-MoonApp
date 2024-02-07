<x-mail::message>
# @lang('app.mail.welcome') {{ $name }}!

@lang('app.mail.your_password') *{{ $password }}*
<br>
<x-mail::panel>
### @lang('app.mail.enter_our_site')
<x-mail::button url="{{ config('app.url') }}" color="success">
@lang('app.options.login')
</x-mail::button>
</x-mail::panel>

<br>
{{ config('app.name') }}
</x-mail::message>
