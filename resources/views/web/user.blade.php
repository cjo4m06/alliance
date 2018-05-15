@extends('layout')

@section('content')
    <div class="ui piled segment">
        <div class="ui middle aligned grid">
            <div class="column row">
                <div class="three wide column">
                    <h2>帳號：</h2>
                </div>
                <div class="four wide column">
                    <span>{{ $user->account }}</span>
                </div>
            </div>
            <div class="column row">
                <div class="three wide column">
                    <h2>暱稱：</h2>
                </div>
                <div class="four wide column">
                    <form action="{!! route('web.user.update', $user) !!}" method="post">
                        {!! csrf_field() !!}
                        {!! method_field('put') !!}
                        <div class="ui mini action input">
                            <input type="text" name="name" value="{{ old('name', $user->name) }}" required>
                            <button class="ui button">修改</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="ui yellow segment">
        <div class="ui header">
            <h3>更改密碼</h3>
        </div>
        <form action="{!! route('web.user.password', $user) !!}" method="post">
            {!! csrf_field() !!}
            {!! method_field('put') !!}
            <div class="ui middle aligned grid">
                <div class="column row">
                    <div class="three wide column">
                        <h4>新密碼：</h4>
                    </div>
                    <div class="four wide column">
                        <div class="ui mini input">
                            <input type="password" name="password" value="" required>
                        </div>
                    </div>
                </div>
                <div class="column row">
                    <div class="three wide column">
                        <h4>確認密碼：</h4>
                    </div>
                    <div class="four wide column">
                        <div class="ui mini input">
                            <input type="password" name="password_confirmation" value="" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ui right aligned basic segment">
                <div class="ui mini right large buttons">
                    <button class="ui blue button">變更密碼</button>
                </div>
            </div>
        </form>
    </div>
@endsection
