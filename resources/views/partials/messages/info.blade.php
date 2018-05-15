@if (Session::has('info'))
    <div class="ui info message">
        <i class="close icon"></i>
        @if (is_array(session('info')))
            <ul class="list">
                @foreach (session('info') as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>
        @else
            {{ session('info') }}
        @endif
    </div>
@endif
