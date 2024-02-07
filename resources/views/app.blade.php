<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@lang('app.title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body class="bg-body-primary" style="background-color: #EAE2B7;">
    <nav class="navbar navbar-expand-lg text-white" style="background-color: #003049;" data-bs-theme="dark">
        <div class="container-fluid container">
            <a class="navbar-brand" href="/">@lang('app.title')</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('viewStatuses') ? 'active' : '' }}"
                            href="{{ route('viewStatuses') }}">@lang('app.rutes.status.title')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('viewCustomers') ? 'active' : '' }} "
                            href="{{ route('viewCustomers') }}">@lang('app.rutes.customer.title')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('viewPackages') ? 'active' : '' }}"
                            href="{{ route('viewPackages') }}">@lang('app.rutes.package.title')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('viewUsers') ? 'active' : '' }}"
                            href="{{ route('viewUsers') }}">@lang('app.rutes.user.title')</a>
                    </li>
                </ul>
                <div class="dropdown">
                    <button class="btn nav-link dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-bs-auto-close="false">
                        @lang('app.inputs.options')
                    </button>
                    <div class="dropdown-menu">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item"
                                href="{{ route('logout') }}">@lang('app.options.logout')</button>
                        </form>
                        <div class="dropdown-divider"></div>
                        @if (app()->getLocale() == 'es')
                            <a class="dropdown-item" href="{{ route('lang', 'en') }}">@lang('app.language.english')</a>
                        @else
                            <a class="dropdown-item" href="{{ route('lang', 'es') }}">@lang('app.language.spanish')</a>
                        @endif
                    </div>
                </div>

                {{--                 
                <form class="dropdown" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn nav-link dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        @lang('app.inputs.options')
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <button class="btn nav-link" type="submit">@lang('app.rutes.logout')</button>
                        </li>
                        <li>
                            <div class="dropdown">
                                <button class="btn nav-link dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">@lang('app.language.title')</button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" ">@lang('app.language.english')</a></li>
                                    <li><a class="dropdown-item" ">@lang('app.language.spanish')</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </form> --}}

            </div>
        </div>
    </nav>
    @yield('content')

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>

</html>
