<div class="section" id="list-product-wp">
    <div class="section-head clearfix">
        <h3 class="section-title fl-left">Sản Phẩm</h3>
        <div class="filter-wp fl-right">
            <p class="desc">Hiển thị {{ $products->count() }} sản phẩm</p>
        </div>
    </div>
    <div class="section-detail">
        <ul class="list-item clearfix">
            @if (count($products) > 0)
                @foreach ($products as $item)
                    <li>
                        <a href="{{ asset('') }}products/detail/{{ $item->id }}" title="" class="thumb">
                            <img src="{{ asset('') }}{{ $item->feature_image }}">
                        </a>
                        <a href="" title="" class="product-name">{!! Str::limit($item->name, 20, '...') !!}</a>
                        <div class="price">
                            <span class="new">{{ number_format($item->price, 0, ',', '.') }}đ</span>
                            <span class="old">{{ number_format(($item->price * 130) / 100, 0, ',', '.') }}đ</span>
                        </div>

                        <div class="action clearfix">
                            <a onclick="AddCart({{ $item->id }})" title="Thêm giỏ hàng" class=" fl-left"
                                style="padding: 0px;">
                                <div class="btn btn-light" style="padding: 8px 30px 8px 30px; border: 1px solid;"><i
                                        class="fa-solid fa-cart-plus" style="font-size: 20px;"></i></div>
                            </a>
                            <a href="{{ asset('') }}cart/buy_now/{{ $item->id }}" title="Mua ngay"
                                class="btn btn-danger fl-right" style="padding: 10px 20px 10px 20px;">Mua ngay</a>
                        </div>
                    </li>
                @endforeach
            @else
                <p>Không có sản phẩm nào.</p>
            @endif


        </ul>
    </div>
</div>




