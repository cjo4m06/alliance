<!doctype html>
<html lang="zh-Hant-TW">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        @yield('meta')
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @section('css')
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.css" />
            <style type="text/css">
                body {
                    background-color: #FFFFFF;
                    height: auto;
                    margin-bottom: 150px;
                }
                .ui.menu .item img.logo {
                    margin-right: 1.5em;
                }
                .main.container {
                    margin-top: 7em;
                }
                .wireframe {
                    margin-top: 2em;
                }
                .ui.footer.segment {
                    margin: 5em 0em 0em;
                    position: fixed;
                    left: 0;
                    bottom: 0;
                    width: 100%;
                }
            </style>
        @show
        <title>Alliance</title>
        @include('partials.vars')
    </head>
    <body>
        @include('partials.manage.menu')
        <div class="ui main text container">
            @include('partials.messages.all')
            @yield('content')
        </div>

        @include('partials.manage.footer')
    </body>
    @section('js')
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"
                integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
                crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js"></script>
    @show
</html>
