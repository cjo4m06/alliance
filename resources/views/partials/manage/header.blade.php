<header id="header">
    <h1 class="ui center aligned header">
        {{ $header or 'Alliance' }}
        <span>（{{ $currentEnvironment or 'Unknown environment' }}）</span>
        <div class="right menu">Hi, {{ $currentUser->name or 'Guest' }}</div>
    </h1>
</header>
