@extends('templates.tpl_default')

@section('content')
    <div id="main-content-wp" class="cart-page">
        <div class="section" id="breadcrumb-wp">
            <div class="wp-inner">
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <a href="?page=home" title="">Trang chủ</a>
                        </li>
                        <li>
                            <a href="" title="">Sản phẩm làm đẹp da</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="wrapper" class="wp-inner clearfix">
            <div class="section" id="info-cart-wp">
                <div class="section-detail table-responsive">
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
                                    $stt +=1;
                                @endphp
                                <tr>
                                    <td>{{ $stt  }}</td>
                                    <td>{{$product->id}}</td>
                                    <td>
                                        <a href="" title="" class="thumb">
                                            <img src="{{asset($product->options->image)}}" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="" title="" class="name-product">{{$product->name}}</a>
                                    </td>
                                    <td>{{ number_format($product->price, 0, ',', '.') }}đ</td>
                                    <td>
                                        <input type="text" name="num-order" value="{{$product->qty}}" class="num-order">
                                    </td>
                                    <td>{{ number_format($product->price*$product->qty, 0, ',', '.') }}đ</td>
                                    <td>
                                        <a href="/cart/delete/{{$product->rowId}}" title="" class="del-product"><i
                                                class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="7">
                                    <div class="clearfix">
                                        <p id="total-price" class="fl-right">Tổng giá: <span>{{ Cart::subtotal() }}đ</span></p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="7">
                                    <div class="clearfix">
                                        <div class="fl-right">
                                            <a href="" title="" id="update-cart">Cập nhật giỏ hàng</a>
                                            <a href="{{ route('checkout') }}" title="" id="checkout-cart">Thanh
                                                toán</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="section" id="action-cart-wp">
                <div class="section-detail">
                    <p class="title">Click vào <span>“Cập nhật giỏ hàng”</span> để cập nhật số lượng. Nhập vào số lượng
                        <span>0</span> để xóa sản phẩm khỏi giỏ hàng. Nhấn vào thanh toán để hoàn tất mua hàng.
                    </p>
                    <a href="" title="" id="buy-more">Mua tiếp</a><br />
                    <a href="{{route('cart.destroy')}}" title="" id="delete-cart">Xóa giỏ hàng</a>
                </div>
            </div>
        </div>
    </div>
@endsection
