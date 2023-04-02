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

    @auth

        @if (auth()->user()->cart()->count())
            <div class="cart collapse" id="cart">
                <div class="cart-header" id="cart-header">
                    <h4> <b id="cart-name">Show Cart</b>
                        <span class="count">{{ auth()->user()->cart()->count() }}</span>
                    </h4>


                </div>
                <div class="cart-list hide" id="cart-list">
                    @foreach (auth()->user()->cart()->get() as $cart)
                        <div class="cart-item">product:{{ $cart->product_name }} <br> quantity:
                            {{ $cart->quantity }} total
                            price :{{ $cart->total }}$</div>
                    @endforeach
                </div>
            </div>
        @endif
    @endauth


    <script src="{{ asset('js/cart.js') }}"></script>


</body>

</html>
