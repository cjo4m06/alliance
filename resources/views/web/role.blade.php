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
                                @foreach($jobs as $key => $job)
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
@endsection

@section('js')
    @parent
    <script>
        $('.ui.accordion').accordion();
        $('.ui.dropdown').dropdown();
    </script>
@endsection
