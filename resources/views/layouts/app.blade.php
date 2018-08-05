<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>@yield('title')</title>

        <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    </head>
    <body class="bg-light">
        @section('header')
            @include('layouts.navbar')
        @show
        
        @yield('content')

        <script src="{{ mix('/js/app.js') }}"></script>
    </body>
</html>
