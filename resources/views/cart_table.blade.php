<table class="table">
    <thead>
        <tr>
            <td>STT</td>
            <td>Mã sản phẩm</td>
            <td>Ảnh sản phẩm</td>
            <td>Tên sản phẩm</td>
            <td>Giá sản phẩm</td>
            <td>Số lượng</td>
            <td colspan="2">Thành tiền</td>
        </tr>
    </thead>
    <tbody>
        @php
            $stt = 0;
        @endphp

        @foreach (Cart::content() as $product)
            @php
                $stt += 1;
            @endphp
            <tr>
                <td>{{ $stt }}</td>
                <td>{{ $product->id }}</td>
                <td>
                    <a href="" title="" class="thumb">
                        <img src="{{ asset($product->options->image) }}" alt="">
                    </a>
                </td>
                <td>
                    <a href="" title="" class="name-product">{{ $product->name }}</a>
                </td>
                <td>{{ number_format($product->price, 0, ',', '.') }}đ</td>
                <td>
                    <input type="number" name="num-order" value="{{ $product->qty }}" class="num-order"
                        step="1" min="1" style="width: 100px">
                </td>
                <td>{{ number_format($product->price * $product->qty, 0, ',', '.') }}đ</td>
                <td>
                    <input type="hidden" class="rowId" value="{{ $product->rowId }}">
                    <input type="hidden" class="price_product" value="{{ $product->price }}">
                    <a onclick="Delete({{ $product->id }})" title="" class="del-product"><i
                            class="fa fa-trash-o"></i></a>
                </td>
            </tr>
        @endforeach


    </tbody>
    <tfoot>
        <tr>
            <td colspan="7">
                <div class="clearfix">
                    <p id="total-price" class="fl-right">Tổng giá: <span>{{ Cart::subtotal() }}đ</span>
                    </p>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="7">
                <div class="clearfix">
                    <div class="fl-right">
                        <a href="{{ route('checkout') }}" title="" id="checkout-cart">Thanh
                            toán</a>
                    </div>
                </div>
            </td>
        </tr>
    </tfoot>
</table>