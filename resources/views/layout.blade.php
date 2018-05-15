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
                .mobile-view {
                    display: none;
                }
                @media only screen and (max-width: 700px) {
                    .pc-view {
                        display: none !important;
                    }
                    .secondary.pointing.menu .item,
                    .secondary.pointing.menu .menu {
                        display: none;
                    }
                    .secondary.pointing.menu .toc.item {
                        display: block;
                    }
                    .mobile-view {
                        display: block;
                    }
                    .masthead.segment {
                        min-height: 350px;
                    }
                    .masthead h1.ui.header {
                        font-size: 2em;
                        margin-top: 1.5em;
                    }
                    .masthead h2 {
                        margin-top: 0.5em;
                        font-size: 1.5em;
                    }
                }
            </style>
        @show
        <title>Alliance</title>
        @include('partials.vars')
    </head>
    <body>
        @include('partials.manage.menu')
        <div class="pusher">
            <div class="ui main masthead text container">
                @include('partials.messages.all')
                @yield('content')
            </div>
        </div>
        @include('partials.manage.footer')
    </body>
    @section('js')
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"
                integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
                crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js"></script>
        <script>
            $(document).ready(function() {
                $('.masthead').visibility({
                    once: false,
                    onBottomPassed: function() {
                        $('.fixed.menu').transition('fade in');
                    },
                    onBottomPassedReverse: function() {
                        $('.fixed.menu').transition('fade out');
                    }
                });

                // create sidebar and attach to menu open
                $('.ui.sidebar').sidebar('attach events', '.toc.item');
            })
            ;
        </script>
    @show
</html>
