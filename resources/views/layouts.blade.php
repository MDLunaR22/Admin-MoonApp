<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>@lang('app.title')</title>
</head>

<body style="background-color: #EAE2B7;">
    <div class="container">
        <div class="row">
            <div class="col-12 position-relative">
                @if (app()->getLocale() == 'es')
                    <a class="text-center link-dark link-underline-opacity-0 link-underline-opacity-0-hover position-absolute top-0 end-0"
                        href="{{ route('lang', 'en') }}"><img class="mt-3" style="width: 35px;"
                            src="{{ asset('img/language.png') }}"><br>@lang('app.language.spanish')</a>
                @else
                    <a class="text-center link-dark link-underline-opacity-0 link-underline-opacity-0-hover position-absolute top-0 end-0"
                        href="{{ route('lang', 'es') }}"><img class="mt-3" style="width: 35px;"
                            src="{{ asset('img/language.png') }}"><br>@lang('app.language.english')</a>
                @endif
            </div>
        </div>
        <div class="row">
            @yield('content')
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>

</html>
