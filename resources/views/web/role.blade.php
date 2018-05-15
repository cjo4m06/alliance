@extends('layout')

@section('content')
    <div class="ui styled fluid accordion">
        <div class="title">
            <i class="dropdown icon"></i> 新增遊戲角色
        </div>
        <div class="ui form content">
            <h4 class="ui horizontal divider header">
                <i class="university icon"></i> 角色資訊
            </h4>
            <form action="{!! route('web.roles.store') !!}" method="post">
                {!! csrf_field() !!}
                <div class="two fields">
                    <div class="field">
                        <label for="name">角色名稱</label>
                        <input type="text" name="name" id="name" placeholder="角色暱稱" required>
                    </div>
                    <div class="field">
                        <label for="job">角色職業</label>
                        <div class="ui selection dropdown">
                            <input type="hidden" name="job">
                            <i class="dropdown icon"></i>
                            <div class="default text">選擇職業</div>
                            <div class="menu">
                                @foreach(App\Entities\Role::JOBS as $key => $job)
                                    <div class="item" data-value="{{ $key }}">{{ $job }}</div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="four fields">
                    <div class="field">
                        <label for="level">等級</label>
                        <input type="number" name="level" id="level" required>
                    </div>
                    <div class="field">
                        <label for="ac">防禦</label>
                        <input type="number" name="ac" id="ac" required>
                    </div>
                    <div class="field">
                        <label for="attack">傷害 or 魔攻</label>
                        <input type="number" name="attack" id="attack" required>
                    </div>
                    <div class="field">
                        <label for="hit">命中</label>
                        <input type="number" name="hit" id="hit" required>
                    </div>
                </div>
                <div class="ui right aligned basic segment">
                    <div class="ui mini right large buttons">
                        <button class="ui blue button">新增角色</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <br><br>
    <div class="ui red segment">
        <div class="ui header">
            <h3>所屬角色</h3>
        </div>
        <div class="ui styled fluid accordion">
            @foreach($roles as $role)
                <div class="title ui grid">
                    <div class="column row">
                        <div class="one wide column">
                            <i class="dropdown icon"></i>
                        </div>
                        <div class="two wide column">
                            Lv：{{ $role->level }}
                        </div>
                        <div class="four wide column">
                            {{ $role->name }}（{{ App\Entities\Role::JOBS[$role->job] }}）
                        </div>
                        <div class="six wide column">
                            防禦：{{ $role->ac }} 傷害：{{ $role->attack }} 命中：{{ $role->hit }}
                        </div>
                    </div>
                </div>
                <div class="ui form content">
                    <h4 class="ui horizontal divider header">
                        <i class="address book icon"></i> 編輯角色
                    </h4>
                    <form action="{!! route('web.roles.update', $role) !!}" method="post">
                        {!! method_field('put') !!}
                        {!! csrf_field() !!}
                        <div class="two fields">
                            <div class="field">
                                <label for="name">角色名稱</label>
                                <input type="text" name="name" id="name" value="{{ $role->name }}" placeholder="角色暱稱" required>
                            </div>
                            <div class="field">
                                <label for="job">角色職業</label>
                                <div class="ui selection dropdown">
                                    <input type="hidden" name="job" value="{{ $role->job }}">
                                    <i class="dropdown icon"></i>
                                    <div class="default text">選擇職業</div>
                                    <div class="menu">
                                        @foreach(App\Entities\Role::JOBS as $key => $job)
                                            <div class="item" data-value="{{ $key }}">{{ $job }}</div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="four fields">
                            <div class="field">
                                <label for="level">等級</label>
                                <input type="number" name="level" id="level" value="{{ $role->level }}" required>
                            </div>
                            <div class="field">
                                <label for="ac">防禦</label>
                                <input type="number" name="ac" id="ac" value="{{ $role->ac }}" required>
                            </div>
                            <div class="field">
                                <label for="attack">傷害 or 魔攻</label>
                                <input type="number" name="attack" id="attack" value="{{ $role->attack }}" required>
                            </div>
                            <div class="field">
                                <label for="hit">命中</label>
                                <input type="number" name="hit" id="hit" value="{{ $role->hit }}" required>
                            </div>
                        </div>
                        <div class="ui right aligned basic segment">
                            <button id="delete-role-btn" data-id="{{ $role->id }}" type="button" class="ui red button">刪除角色</button>
                            <button class="ui blue button">更新角色</button>
                        </div>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
    <form id="delete-role-form" action="{!! route('web.roles.delete') !!}" method="post">
        {!! method_field('delete') !!}
        {!! csrf_field() !!}
        <input type="hidden" name="role_id" id="delete-role-id">
    </form>
@endsection

@section('js')
    @parent
    <script>
        $('.ui.accordion').accordion();
        $('.ui.dropdown').dropdown();
        $(document).on('click', '#delete-role-btn', function (event) {
            $('#delete-role-id').val($(event.target).attr('data-id'));
            $('#delete-role-form').submit();
        });
    </script>
@endsection
