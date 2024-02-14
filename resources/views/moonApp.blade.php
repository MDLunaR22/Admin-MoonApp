<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>@lang('app.title')</title>
</head>

<body class="text-white" style="background-color: #003049">
    <div class="container position-absolute top-50 start-50 translate-middle text-center">
        <div class="row">
            <div class="col-12">
                <h1>@lang('app.title')</h1>
                <h5 class="mt-2 mb-5">
                    @if (Route::has('login'))
                        @auth
                            @lang('app.messages.welcome_login') {{ $user->name }}!
                        @else
                            @lang('app.messages.welcome_home') @lang('app.title')!
                        @endauth
                    @endif
                </h5>
            </div>
        </div>

        @if (Route::has('login'))
            @auth
                <div class="row mt-4">
                    @can('package_view')
                        <div class="col-6">
                            <a href="{{ route('viewPackages') }}" class="btn btn-light text-black w-75"
                                style="background:#EAE2B7;">
                                <h3 class="fw-normal">@lang('app.rutes.package.title')</h3>
                            </a>
                        </div>
                    @endcan
                    @can('status_view')
                        <div class="col-6">
                            <a href="{{ route('viewStatuses') }}" class="btn btn-light text-black w-75"
                                style="background:#EAE2B7;">
                                <h3 class="fw-normal">@lang('app.rutes.status.title')</h3>
                            </a>
                        </div>
                    @endcan
                </div>
                <div class="row mt-4">
                    @can('customer_view')
                        <div class="col-6">
                            <a href="{{ route('viewCustomers') }}" class="btn btn-light w-75" style="background:#EAE2B7">
                                <h3 class="fw-normal">@lang('app.rutes.customer.title')</h3>
                            </a>
                        </div>
                    @endcan
                    @can('user_view')
                        <div class="col-6">
                            <a href="{{ route('viewUsers') }}" class="btn btn-light text-black w-75"
                                style="background:#EAE2B7;">
                                <h3 class="fw-normal">@lang('app.rutes.user.title')</h3>
                            </a>
                        </div>
                    @endcan
                </div>
                <div class="row mt-4">
                    <div class="col-12">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-light w-75"
                                style="background-color: #003049; color:#EAE2B7; border-color: #EAE2B7;">
                                <h3 class="fw-normal">@lang('app.rutes.logout')</h3>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12">
                        @if (app()->getLocale() == 'es')
                            <a class="btn btn-light w-25"
                                style="background-color: #003049; color:#EAE2B7; border-color: #EAE2B7;"
                                href="{{ route('lang', 'en') }}">@lang('app.language.english')</a>
                        @else
                            <a class="btn btn-light w-25"
                                style="background-color: #003049; color:#EAE2B7; border-color: #EAE2B7;"
                                href="{{ route('lang', 'es') }}">@lang('app.language.spanish')</a>
                        @endif
                    </div>
                </div>
        </div>
    @else
        <div class="row">
            <div class="col-12">
                <a href="{{ route('login') }}" class="btn btn-light w-50" style="background:#EAE2B7">
                    <h3 class="fw-normal">@lang('app.rutes.login')</h3>
                </a>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <a href="{{ route('register') }}" class="btn btn-light text-black w-50" style="background:#EAE2B7;">
                    <h3 class="fw-normal">@lang('app.rutes.register')</h3>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mt-4">
                @if (app()->getLocale() == 'es')
                    <a class="btn btn-light w-25" style="background-color: #003049; color:#EAE2B7; border-color: #EAE2B7;"
                        href="{{ route('lang', 'en') }}">@lang('app.language.spanish')</a>
                @else
                    <a class="btn btn-light w-25" style="background-color: #003049; color:#EAE2B7; border-color: #EAE2B7;"
                        href="{{ route('lang', 'es') }}">@lang('app.language.english')</a>
                @endif
            </div>
        </div>
    @endauth
    @endif
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>

</html>
