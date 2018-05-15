@extends('layout')

@section('content')
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
                    </td>
                    <td class="right aligned collapsing">
                        一標最低 {{ $item->once_price }}
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
