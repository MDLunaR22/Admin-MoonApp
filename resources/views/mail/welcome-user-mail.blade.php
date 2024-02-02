<x-mail::message style="background-color: red;">
# Welcome {{ $user->name }}

Your password: {{ $password }}
<br>
Enter to our page
<x-mail::button url="{{ config('app.url') }}">
Log In
</x-mail::button>

<br>
{{ config('app.name') }}
</x-mail::message>
