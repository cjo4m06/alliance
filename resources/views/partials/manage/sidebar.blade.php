<div id="sidebar" class="ui sidebar left thin vertical inverted menu labeled icon overlay visible">
    <div class="item">
        <a href="{!! route('manage.companies.index') !!}" class="ui inline image">
            {{--<img class="logo" src="/img/logo.png" alt="bimAir Logo">--}}
            <img class="chume" src="/img/logo_title.png" alt="bimAir Text Logo">
        </a>
    </div>
    <div class="item">
        <div class="ui inverted header">
            <i class="list icon"></i>
            公司管理
        </div>
        <div class="menu">
            <a href="{!! route('manage.announcements.index') !!}" class="item">公告列表</a>
        </div>
        <div class="menu">
            <a href="{!! route('manage.companies.index') !!}" class="item">公司列表</a>
        </div>
        <div class="menu">
            <a href="{!! route('manage.tools.index') !!}" class="item">工具列表</a>
        </div>
        <div class="menu">
            <a href="{!! route('manage.categories.index') !!}" class="item">產業列表</a>
        </div>
        <div class="menu">
            <a href="{!! route('manage.expenses.index') !!}" class="item">每月費用</a>
        </div>
    </div>
    <div class="item">
        <div class="ui inverted header">
            <i class="list icon"></i>
            系統管理
        </div>
        <div class="menu">
            <a href="{!! route('manage.global.index') !!}" class="item">市集列表</a>
        </div>
        <div class="menu">
            <a href="{!! route('manage.users.index') !!}" class="item">會員列表</a>
        </div>
        <div class="menu">
            <a href="{!! route('manage.systems.index') !!}" class="item">系統參數</a>
        </div>
        <div class="menu">
            <a href="{!! route('manage.logout') !!}" class="item">登出</a>
        </div>
    </div>
</div>
