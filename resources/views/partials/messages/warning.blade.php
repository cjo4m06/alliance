@if (Session::has('warning'))
    <div class="ui warning message">
        <i class="close icon"></i>
        @if (is_array(session('warning')))
            <ul class="list">
                @foreach (session('warning') as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>
        @else
            {{ session('warning') }}
        @endif
    </div>
@endif
