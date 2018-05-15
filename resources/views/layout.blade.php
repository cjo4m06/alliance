<!doctype html>
<html lang="zh-Hant-TW">
    <head>
        <meta charset="UTF-8">
        @yield('meta')
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @section('css')
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.css" />
        @show
        <title>Alliance</title>
        @include('partials.vars')
    </head>
    <body>
        @include('partials.manage.sidebar')

        <div class="pusher">
            @include('partials.manage.header')
            <div id="main">
                @include('partials.messages.all')
                @yield('navigation')
                @yield('content')
            </div>
        </div>
    </body>
    @section('js')
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"
                integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
                crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js"></script>
    @show
</html>
