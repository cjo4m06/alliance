@if (Session::has('success'))
    <div class="ui success message">
        <i class="close icon"></i>
        @if (is_array(session('success')))
            <ul class="list">
                @foreach (session('success') as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>
        @else
            {{ session('success') }}
        @endif
    </div>
@endif
