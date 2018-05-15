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
                <h2 class="ui orange image header">
                    <img src="img/logo.png" class="image">
                    <div class="content">
                        註冊
                    </div>
                </h2>
                <form action="{!! route('web.register.store') !!}" method="post" class="ui large form">
                    {!! csrf_field() !!}
                    <div class="ui stacked segment">
                        <div class="field">
                            <div class="ui selection dropdown">
                                <input type="hidden" name="guild_id">
                                <i class="dropdown icon"></i>
                                <div class="default text">選擇血盟</div>
                                <div class="menu">
                                    @foreach($guilds as $guild)
                                        <div class="item" data-value="{{ $guild->id }}">{{ $guild->name }}</div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui left icon input">
                                <i class="user circle icon"></i>
                                <input type="text" name="name" placeholder="Line 暱稱">
                            </div>
                        </div>
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
                        <div class="field">
                            <div class="ui left icon input">
                                <i class="lock icon"></i>
                                <input type="password" name="password_confirmation" placeholder="確認密碼">
                            </div>
                        </div>
                        <button class="ui fluid large orange submit button">註冊</button>
                    </div>
                </form>

                @include('partials.messages.all')
            </div>
        </div>
    </body>
</html>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"
        integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js"></script>
<script>
    $('.ui.dropdown').dropdown();
</script>
