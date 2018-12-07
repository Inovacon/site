<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | Painel</title>

    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

    <!-- Matomo -->
    <script type="text/javascript">
        var _paq = _paq || [];
        /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
        _paq.push(['trackPageView']);
        _paq.push(['enableLinkTracking']);
        (function() {
            var u="//kraft.ads.cnecsan.edu.br/piwik/";
            _paq.push(['setTrackerUrl', u+'piwik.php']);
            _paq.push(['setSiteId', '6']);
            var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
            g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
        })();
    </script>
    <!-- End Matomo Code -->
</head>
<body class="bg-light">
    <div id="root">
        @include('dashboard._navbar')

        <div class="wrapper">
            @include('dashboard._sidebar')

            <div id="content">
                <div class="container p-4 px-md-5">
                    @yield('content')
                </div>
            </div>
        </div>

        <flash type="{{ session('type') ?: 'success' }}" message="{{ session('flash') }}"></flash>
    </div>

    @include('dashboard._footer')
</body>
</html>
