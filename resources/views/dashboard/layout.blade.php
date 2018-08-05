<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
</head>
<body class="bg-light">
    <div id="root">
        @section('header')
            @include('dashboard._nav')
        @show

        <div class="container">
            @yield('content')
        </div>
    </div>

    <script src="{{ mix('/js/app.js') }}"></script>
</body>
</html>
