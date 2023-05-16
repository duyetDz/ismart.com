<div class="header__search-history">
    <h3 class="header__search-history-heading">Kết quả tìm kiếm</h3>
    <ul class="header__search-history-list">
        @if ($products->isEmpty())
            <li class="header__search-history-item">
                <p>Không có kết quả</p>
            </li>
        @else
            @foreach ($products as $item)
                <li class="clearfix header__search-history-item d-flex" style="margin-bottom: 2px ;min-height: 60px">
                    <a href="{{ asset('') }}products/detail/{{ $item->id }}" title="" class="thumb fl-left">
                        <img class="img-thumbnail" src="{{ asset('') }}{{ $item->feature_image }}" alt=""  style="max-width: 50px">
                    </a>
                    <div  style="margin-left: 10px">
                        <a href="{{ asset('') }}products/detail/{{ $item->id }}" title="" class="product-name">{{ $item->name }}</a>
                    </div>
                </li>
            @endforeach
        @endif
    </ul>
</div>






{{-- <li class="header__search-history-item">
    <a href="{{ asset('') }}products/detail/{{ $item->id }}">{{ $item->name }}</a>
</li> --}}
