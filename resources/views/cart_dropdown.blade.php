<div id="btn-cart">
    <a style="color: #fff"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
        @if (Cart::content()->count())
            <span id="num">{{ Cart::content()->count() }}</span>
        @endif
    </a>
</div>
<div>
    <div id="dropdown">
        <p class="desc">Có <span>{{ Cart::content()->count() }} sản phẩm</span> trong
            giỏ
            hàng</p>
        <ul class="list-cart">
            @foreach (Cart::content() as $product)
                <li class="clearfix">
                    <a title="" class="thumb fl-left">
                        <img src="{{ asset($product->options->image) }}" alt="">
                    </a>
                    <div class="info fl-right">
                        <a title="" class="product-name">{{ $product->name }}</a>
                        <p class="price">
                            {{ number_format($product->price, 0, ',', '.') }}đ
                        </p>
                        <p class="qty">Số lượng: <span>{{ $product->qty }}</span></p>
                    </div>
                </li>
            @endforeach

        </ul>
        <div class="total-price clearfix">
            <p class="title fl-left">Tổng:</p>
            <p class="price fl-right">{{ Cart::subtotal() }}đ</p>
        </div>
        <div class="action-cart clearfix">
            <a href="{{ route('cart') }}" title="Giỏ hàng" class="view-cart fl-left">Giỏ
                hàng</a>
            <a href="{{ route('checkout') }}" title="Thanh toán"
                class="checkout fl-right">Thanh
                toán</a>
        </div>
    </div>
</div>