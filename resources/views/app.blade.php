<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MoonApp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body class="bg-body-primary" style="background-color: #EAE2B7;">
    <nav class="navbar navbar-expand-lg text-white" style="background-color: #003049;" data-bs-theme="dark">
        <div class="container-fluid container">
            <a class="navbar-brand" href="home">MoonApp</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('viewStatuses')}}">Statuses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('viewCustomers')}}">Customers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('viewPackages')}}">Package</a>
                    </li>
                </ul>
                <div class="btn-group" role="group">
                    <a class="dropdown-toggle link-light" data-bs-toggle="dropdown" aria-expanded="false">
                        Options
                    </a>
                    @if (Route::has('login'))
                        @auth
                            <ul class="dropdown-menu">
                                <li>
                                    <form class="dropdown-item" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="nav-link">Log out</button>
                                    </form>
                                </li>
                                <li>
                                    <a class="dropdown-item" class="nav-link" href="">Profile</a>
                                </li>
                            </ul>
                        @else
                            <ul class="dropdown-menu">
                                <li>
                                    <form class="dropdown-item" action="{{ route('login') }}">
                                        <button type="submit" class="nav-link">Log in</button>
                                    </form>
                                </li>
                                <li>
                                    <form class="dropdown-item" action="{{ route('register') }}">
                                        <button type="submit" class="nav-link">Register</button>
                                    </form>
                                </li>
                            </ul>
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </nav>
    @yield('content')

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>

</html>