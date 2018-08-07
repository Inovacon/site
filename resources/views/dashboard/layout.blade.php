<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Painel | @yield('title')</title>

    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
</head>
<body class="bg-light">
    <div id="root">
        <div class="wrapper">
            <nav id="sidebar">
                @include('dashboard._sidebar')
            </nav>

            <div id="content">
                @include('dashboard._nav')

                <div class="container p-4 px-md-5">
                    @yield('content')
                </div>
            </div>
        </div>

        <flash type="{{ session('type') }}" message="{{ session('flash') }}"></flash>
    </div>

    <script src="{{ mix('/js/app.js') }}"></script>

    <script>
        $('#sidebarCollapse').on('click', function (event) {
            event.preventDefault();

            $('#sidebar').toggleClass('active');
        });
    </script>
</body>
</html>
