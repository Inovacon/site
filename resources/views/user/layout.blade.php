<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | Minha conta</title>

    <link rel="stylesheet" href="{{ mix('/css/dashboard.css') }}">
</head>
<body class="bg-light">
    <div id="root">
        @include('user._navbar')

        <div class="wrapper">
            @include('user._sidebar')

            <div id="content">
                <div class="container p-4 px-md-5">
                    @yield('content')
                </div>
            </div>
        </div>

        <flash type="{{ session('type') ?: 'success' }}" message="{{ session('flash') }}"></flash>


    </div>

    <script src="{{ asset('/js/admin.js') }}"></script>

    @stack('scripts')
</body>
</html>
