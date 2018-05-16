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
                <a href="{!! route('web.users.active') !!}" class="ui right floated teal button">前往開通（目前未開通帳戶 {{ $notActiveUsers->count() }} 筆）</a>
            </div>
        </div>
    </div>
    <div class="ui blue table form">
        <div class="ui segment">
            <div class="ui field">
                <h3>成員名單</h3>
            </div>
            <div class="ui three fields pc-view">
                <div class="field">
                    <h3>Line 暱稱</h3>
                </div>
                <div class="field">
                    <h3>遊戲 ID</h3>
                </div>
            </div>
            @foreach($users as $user)
                <div class="ui clearing divider"></div>
                <div class="three fields">
                    <div class="field">
                        <div class="mobile-view">
                            <a class="ui green ribbon label">Line 暱稱</a>
                        </div>
                        {{ $user->name }}（{{ $user->is_manager ? '幹部' : '成員' }})
                    </div>
                    <div class="field">
                        <div class="mobile-view">
                            <a class="ui blue ribbon label">遊戲 ID</a>
                        </div>
                        @foreach($user->roles as $role)
                            Lv：{{ $role->level }} {{ $role->name }}（{{ App\Entities\Role::JOBS[$role->job] }}）<br>
                        @endforeach
                    </div>
                    @if(Auth::user()->is_manager)
                        <div class="field">
                            @if($user->is_manager)
                                <form action="{!! route('web.users.manage.disable', $user) !!}" method="post">
                                    {!! method_field('put') !!}
                                    {!! csrf_field() !!}
                                    <button class="ui right floated red button">取消幹部權限</button>
                                </form>
                            @else
                                <form action="{!! route('web.users.manage.enable', $user) !!}" method="post">
                                    {!! method_field('put') !!}
                                    {!! csrf_field() !!}
                                    <button class="ui right floated blue button">授權幹部權限</button>
                                </form>
                            @endif
                        </div>
                    @endif
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
