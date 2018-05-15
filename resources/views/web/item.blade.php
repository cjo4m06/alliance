@extends('layout')

@section('content')
    <div class="ui styled fluid accordion">
        <div class="title">
            <i class="dropdown icon"></i> 新增物品
        </div>
        <div class="ui form content">
            <form action="{!! route('web.items.store') !!}" method="post">
                {!! csrf_field() !!}
                <div class="inline fields">
                    <div class="eight wide field">
                        <input type="text" name="name" placeholder="物品名稱">
                    </div>
                    <div class="three wide field">
                        <input type="number" name="price" placeholder="起標價">
                    </div>
                    <div class="three wide field">
                        <input type="number" name="once_price" placeholder="一標最低價">
                    </div>
                    <div class="two wide field">
                        <button class="ui mini blue button">新增</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <br>
    <form action="{!! route('web.items') !!}">
        <div class="ui icon input">
            <input type="text" name="keywords" value="{{ $keywords }}" placeholder="Search...">
            <i class="search icon"></i>
        </div>
    </form>
    <table class="ui celled striped table">
        <thead>
            <tr>
                <th colspan="3">物品列</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
                <tr>
                    <td class="collapsing">
                        {{ $item->name }}
                    </td>
                    <td>
                        起標價 {{ $item->price }}
                        <br>
                        一標最低價 {{ $item->once_price }}
                    </td>
                    <td class="right aligned collapsing">
                        <button class="ui mini orange button">編輯</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="ui aligned center grid">
        <div class="centered column row">
            {{ $items->links('vendor.pagination.semantic-ui') }}
        </div>
    </div>
@endsection

@section('js')
    @parent
    <script>
        $('.ui.accordion').accordion();
    </script>
@endsection
