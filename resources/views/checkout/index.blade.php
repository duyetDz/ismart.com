@extends('templates.tpl_default')

@section('content')
    <div id="main-content-wp" class="checkout-page">
        <div class="section" id="breadcrumb-wp">
            <div class="wp-inner">
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <a href="?page=home" title="">Trang chủ</a>
                        </li>
                        <li>
                            <a href="" title="">Thanh toán</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="wrapper" class="wp-inner clearfix">
            <div class="section" id="customer-info-wp">
                <div class="section-head">
                    <h1 class="section-title">Thông tin khách hàng</h1>
                </div>
                <div class="section-detail">
                    <form method="POST" action="" name="form-checkout">
                        <div class="form-row clearfix">
                            <div class="form-col fl-left">
                                <label for="fullname">Họ tên</label>
                                <input type="text" value="{{ $user->name }}" name="fullname" id="fullname">
                            </div>
                            <div class="form-col fl-right">
                                <label for="email">Email</label>
                                <input type="email" value="{{ $user->email }}" name="email" id="email">
                            </div>
                        </div>
                        <div class="form-row clearfix">
                            <div class="form-col fl-left">
                                <label for="address">Địa chỉ</label>
                                <input type="text" value="{{ $user->address }}" name="address" id="address">
                            </div>
                            <div class="form-col fl-right">
                                <label for="phone_number">Số điện thoại</label>
                                <input type="tel" value="{{ $user->phone_number }}" name="phone_number"
                                    id="phone_number">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-col">
                                <label for="notes">Ghi chú</label>
                                <textarea name="note"></textarea>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="section" id="order-review-wp">
                <div class="section-head">
                    <h1 class="section-title">Thông tin đơn hàng</h1>
                </div>
                <div class="section-detail">
                    <table class="shop-table">
                        <thead>
                            <tr>
                                <td>Sản phẩm</td>
                                <td>Tổng</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (Cart::content() as $item)
                                <tr class="cart-item">
                                    <td class="product-name">{{ $item->name }}<strong class="product-quantity">x
                                            {{ $item->qty }}</strong></td>
                                    <td class="product-total">{{ number_format($item->price * $item->qty, 0, ',', '.') }}đ
                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                        <tfoot>
                            <tr class="order-total">
                                <td>Tổng đơn hàng:</td>
                                <td><strong class="total-price">{{ Cart::subtotal() }}đ</strong></td>
                            </tr>
                        </tfoot>
                    </table>
                    <div id="payment-checkout-wp">
                        <ul id="payment_methods">
                            <li>
                                <input type="radio" id="direct-payment" name="payment-method" value="direct-payment">
                                <label for="direct-payment">Thanh toán tại cửa hàng</label>
                            </li>
                            <li>
                                <input type="radio" id="payment-home" name="payment-method" value="payment-home">
                                <label for="payment-home">Thanh toán tại nhà</label>
                            </li>
                        </ul>
                    </div>
                    <div class="place-order-wp clearfix">
                        <input type="submit" id="order-now" value="Đặt hàng">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
