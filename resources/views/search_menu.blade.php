<div class="header__search-history">
    <h3 class="header__search-history-heading">Kết quả tìm kiếm</h3>
    <ul class="header__search-history-list">
        @if ($products->isEmpty())
            <li class="header__search-history-item">
                <p>Không có kết quả</p>
            </li>
        @else
            @foreach ($products as $item)
                <li class="header__search-history-item">
                    <a href="{{ asset('') }}products/detail/{{ $item->id }}">{{ $item->name }}</a>
                </li>
            @endforeach
        @endif
    </ul>
</div>


