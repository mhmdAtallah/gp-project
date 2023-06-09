<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ $title ?? 'Watch Store' }}</title>

    <link rel="stylesheet" href="/../css/app.css">
    <link rel="stylesheet" href="/../css/{{ $css }}">

</head>


<body>





    <div class="header">
        <div class="nav">
            <li class="nav-l"><a class="{{ request()->path() === '/' ? 'active' : '' }}" href="/">Home</a></li>
            <li class="nav-l"><a href="/products" class="{{ request()->path() === 'products' ? 'active' : '' }}">
                    Products</a></li>
        </div>

        <div class="auth">
            @auth

                <form action="/logout" method="post">
                    @csrf
                    <button class="link logout" type="submit">Logout</button>
                </form>
            @endauth

            @guest
                <a class="link" href="/register">Register</a>
                <a class="link" href="/login">Login</a>
            @endguest
        </div>
    </div>


    @if (session()->has('auth'))
        <span class="flash"> {{ session()->get('auth') }} </span>
    @endif




    {{ $slot }}


    <footer>
        <h1>contactst </h1>

        @if (session()->has('success'))
            <span class="success-flash"> {{ session()->get('success') }} </span>
        @endif
    </footer>

    <x-cart></x-cart>

    <script src="{{ asset('js/cart.js') }}"></script>


</body>

</html>
