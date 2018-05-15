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
        <tbody class="ui form">
            @foreach($items as $item)
                <form action="{!! route('web.items.update', $item) !!}" method="post">
                    {!! method_field('put') !!}
                    {!! csrf_field() !!}
                    <tr>
                        <td>
                            <div class="read-status">
                                <span>{{ $item->name }}</span>
                            </div>
                            <div class="edit-status" style="display: none;">
                                <div class="field">
                                    <label for="name">物品名稱</label>
                                    <input type="text" name="name" id="name" value="{{ $item->name }}" required>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="read-status">
                                起標價格 {{ $item->price }}
                                <br>
                                一標最低價 {{ $item->once_price }}
                            </div>
                            <div class="edit-status" style="display: none;">
                                <div class="field">
                                    <label for="price">起標價格</label>
                                    <input type="number" name="price" id="price" value="{{ $item->price }}" required>
                                </div>
                                <div class="field">
                                    <label for="once_price">一標最低價</label>
                                    <input type="number" name="once_price" id="once_price" value="{{ $item->once_price }}" required>
                                </div>
                            </div>
                        </td>
                        <td class="right aligned collapsing">
                            <div class="read-status">
                                <button id="edit-item-btn" type="button" class="ui mini orange button">編輯</button>
                            </div>
                            <div class="edit-status" style="display: none;">
                                <button id="save-item-btn" class="ui mini blue button">更新</button>
                                <br>
                                <br>
                                <button id="cancel-item-btn" type="button" class="ui mini red button">取消</button>
                            </div>
                        </td>
                    </tr>
                </form>
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
        $(document).on('click', '#edit-item-btn', function (event) {
            $(event.target).parents('tr').find('.read-status').hide();
            $(event.target).parents('tr').find('.edit-status').show();
        });

        $(document).on('click', '#cancel-item-btn', function (event) {
            $(event.target).parents('tr').find('.read-status').show();
            $(event.target).parents('tr').find('.edit-status').hide();
        });
    </script>
@endsection
