<!doctype html>
<html lang="zh-Hant-TW">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.css" />
        <title>Alliance</title>
        <style type="text/css">
            body {
                background-color: #DADADA;
            }
            body > .grid {
                height: 100%;
            }
            .image {
                margin-top: -100px;
            }
            .column {
                max-width: 450px;
            }
        </style>
    </head>
    <body>
        <div class="ui middle aligned center aligned grid">
            <div class="column">
                <h2 class="ui teal image header">
                    <img src="img/logo.png" class="image">
                    <div class="content">
                        登入 Alliance
                    </div>
                </h2>
                <form action="{!! route('web.authenticate') !!}" method="post" class="ui large form">
                    {!! csrf_field() !!}
                    <div class="ui stacked segment">
                        <div class="field">
                            <div class="ui left icon input">
                                <i class="user icon"></i>
                                <input type="text" name="account" placeholder="帳號">
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui left icon input">
                                <i class="lock icon"></i>
                                <input type="password" name="password" placeholder="密碼">
                            </div>
                        </div>
                        <button class="ui fluid large teal submit button">登入</button>
                    </div>
                </form>

                @include('partials.messages.all')

                <div class="ui message">
                    沒有帳號？ <a href="{!! route('web.register.show') !!}">註冊</a>
                </div>
            </div>
        </div>
    </body>
</html>
