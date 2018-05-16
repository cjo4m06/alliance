@extends('layout')

@section('content')
    <div class="ui form">
        <div class="two fields">
            <div class="field">
                <form action="{!! route('web.users.manage') !!}">
                    <div class="ui icon input">
                        <input type="text" name="keywords" value="{{ $keywords }}" placeholder="Search...">
                        <i class="search icon"></i>
                    </div>
                </form>
            </div>
            <div class="field">
                <a href="{!! route('web.users.manage') !!}" class="ui right floated teal button">返回成員</a>
            </div>
        </div>
    </div>
    <div class="ui blue table form">
        <div class="ui segment">
            <div class="ui field">
                <h3>申請名單</h3>
            </div>
            <div class="ui three fields pc-view">
                <div class="field">
                    <h3>Line 暱稱</h3>
                </div>
            </div>
            @foreach($users as $user)
                <div class="ui clearing divider"></div>
                <div class="two fields">
                    <div class="field">
                        <div class="mobile-view">
                            <a class="ui green ribbon label">Line 暱稱</a>
                        </div>
                        {{ $user->name }}（{{ $user->is_manager ? '幹部' : '成員' }})
                    </div>
                    <div class="field">
                        <form action="{!! route('web.users.active.ok', $user) !!}" method="post">
                            {!! method_field('put') !!}
                            {!! csrf_field() !!}
                            <button class="ui right floated blue button">開通</button>
                        </form>
                        <form action="{!! route('web.users.active.no', $user) !!}" method="post">
                            {!! method_field('put') !!}
                            {!! csrf_field() !!}
                            <button class="ui right floated red button">刪除</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="ui aligned center grid">
        <div class="centered column row">
            {{ $users->links('vendor.pagination.semantic-ui') }}
        </div>
    </div>
@endsection
