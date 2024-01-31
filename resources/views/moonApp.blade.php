<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>@yield('title', 'MoonApp')</title>
</head>

<body class="text-white" style="background-color: #003049">
    <div class="container position-absolute top-50 start-50 translate-middle text-center">
        <div class="row">
            <div class="col-12">
                <h1>@yield('title', 'MoonApp')</h1>
                <h5 class="mt-3 mb-3">¡Bienvenido
                    @if (Route::has('login'))
                        @auth
                            {{ $user->name }}!
                        @else
                            {{ 'a MoonApp' }}!
                        @endauth
                    @endif
                </h5>
            </div>
        </div>

        @if (Route::has('login'))
            @auth
                <div class="row mt-4">
                    <div class="col-6">
                        <a href="{{ route('viewStatuses') }}" class="btn btn-light text-black w-75"
                            style="background:#EAE2B7;">
                            <h3 class="fw-normal">Estados</h3>
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="{{ route('viewPackages') }}" class="btn btn-light text-black w-75"
                            style="background:#EAE2B7;">
                            <h3 class="fw-normal">Paquetes</h3>
                        </a>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-6">
                        <a href="{{ route('viewCustomers') }}" class="btn btn-light w-75" style="background:#EAE2B7">
                            <h3 class="fw-normal">Clientes</h3>
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="{{ route('viewUsers') }}" class="btn btn-light text-black w-75"
                            style="background:#EAE2B7;">
                            <h3 class="fw-normal">Usuarios</h3>
                        </a>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-light w-50"
                                style="background-color: #003049; color:#EAE2B7; border-color: #EAE2B7;">
                                <h3 class="fw-normal">Log out</h3>
                            </button>
                        </form>
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('login') }}" class="btn btn-light w-50" style="background:#EAE2B7">
                            <h3 class="fw-normal">Log in</h3>
                        </a>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12">
                        <a href="{{ route('register') }}" class="btn btn-light text-black w-50" style="background:#EAE2B7;">
                            <h3 class="fw-normal">Register</h3>
                        </a>
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
