<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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

                <div class="container p-md-4 px-md-5">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <script src="{{ mix('/js/app.js') }}"></script>

    <script>
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
    </script>
</body>
</html>
