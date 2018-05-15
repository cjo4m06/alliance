<form id="search_form">
    @foreach (Request::except(['keywords', 'filter_year', 'filter_month', 'filter_company']) as $key => $value)
        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
    @endforeach
    <input type="hidden" name="filter_year" id="filter_year" value="{{ Request::input('filter_year', 0) }}">
    <input type="hidden" name="filter_month" id="filter_month" value="{{ Request::input('filter_month', 0) }}">
    <input type="hidden" name="filter_company" id="filter_company" value="{{ Request::input('filter_company', 0) }}">
    <div class="ui action fluid input">
        <input type="text" name="keywords" value="{{ Request::input('keywords', $keywords)}}" placeholder="{{ $placeholder or '' }}" />
        <button class="ui teal right labeled icon button">
            <i class="search icon"></i>
            搜尋
        </button>
    </div>
</form>
