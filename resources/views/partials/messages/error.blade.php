@if (isset($errors) && $errors->any())
    <div class="ui error message">
        <div class="header">錯誤訊息</div>
        <ul class="list">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
