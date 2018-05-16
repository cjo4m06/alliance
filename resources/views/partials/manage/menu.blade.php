<!-- Sidebar Menu -->
<div class="ui vertical inverted sidebar menu">
    <a href="{!! route('web.roles') !!}" class="item">角色</a>
    <a href="{!! route('web.auctions.index') !!}" class="item">拍賣會</a>
    <a href="{!! route('web.loots.index') !!}" class="item">分贓</a>
    <a href="{!! route('web.bosses.index') !!}" class="item">王團</a>
    <a href="{!! route('web.items') !!}" class="item">物品</a>
    <a href="{!! route('web.users.manage') !!}" class="item">成員</a>
    @if(Auth::user()->is_manager)

    @endif
    <a href="{!! route('web.reports.index') !!}" class="item">回報</a>
</div>

<div class="ui fixed inverted menu">
    <div class="ui container">
        <div class="toc item">
            <a class="mobile-view">
                <i class="sidebar icon"></i>
            </a>
        </div>
        <a href="{!! route('web.index') !!}" class="header item">
            <img class="logo" src="/img/logo.png">
            <span>Alliance</span>
        </a>
        <a href="{!! route('web.roles') !!}" class="item pc-view pc-view">角色</a>
        <a href="{!! route('web.auctions.index') !!}" class="item pc-view">拍賣會</a>
        <a href="{!! route('web.loots.index') !!}" class="item pc-view">分贓</a>
        <a href="{!! route('web.bosses.index') !!}" class="item pc-view">王團</a>
        <a href="{!! route('web.items') !!}" class="item pc-view">物品</a>
        <a href="{!! route('web.users.manage') !!}" class="item pc-view">成員</a>
        @if(Auth::user()->is_manager)

        @endif
        <a href="{!! route('web.reports.index') !!}" class="item pc-view">回報</a>
        <div class="ui simple dropdown right item">
            Hi, {{ $currentUser->name or 'Guest' }} <i class="dropdown icon"></i>
            <div class="menu">
                <a href="{!! route('web.user') !!}" class="item">帳號</a>
                <div class="divider"></div>
                <a href="{!! route('web.logout') !!}" class="item">登出</a>
            </div>
        </div>
    </div>
</div>
