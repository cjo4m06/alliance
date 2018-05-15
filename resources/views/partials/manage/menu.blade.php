<div class="ui fixed inverted menu">
    <div class="ui container">
        <a href="#" class="header item">
            <img class="logo" src="img/logo.png">
            Alliance
        </a>
        <a href="#" class="item">角色</a>
        <a href="#" class="item">拍賣會</a>
        <a href="#" class="item">物品</a>
        <a href="#" class="item">分贓</a>
        <a href="#" class="item">王團</a>
        <a href="#" class="item">回報</a>
        <div class="ui simple dropdown right item">
            Hi, {{ $currentUser->name or 'Guest' }} <i class="dorpdown icon"></i>
            <div class="menu">
                <a href="{!! route('web.user') !!}" class="item">帳號</a>
                <div class="divider"></div>
                <a href="{!! route('web.logout') !!}" class="item">登出</a>
            </div>
        </div>
    </div>
</div>
