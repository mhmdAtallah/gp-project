<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ $title ?? 'Watch Store' }}</title>

    <link rel="stylesheet" href="/../css/app.css">
    <link rel="stylesheet" href="/../css/{{ $css }}">
    {{-- @dd(public_path($css ?? '')) --}}
</head>


<body>

    <div class="header">
        <div class="nav">
            <li class="nav-l"><a class="{{ request()->path() === '/' ? 'active' : '' }}" href="/">Home</a></li>
            <li class="nav-l"><a href="/products" class="{{ request()->path() === 'products' ? 'active' : '' }}">
                    Products</a></li>
        </div>

        <div class="auth">
            <a href="/register">Register</a>
        </div>
    </div>




    @if (session()->has('auth'))
        <span class="flash"> {{ session()->get('auth') }} </span>
    @endif

    {{ $slot }}

</body>

</html>
