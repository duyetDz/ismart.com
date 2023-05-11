@extends('templates.tpl_default')

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                    <div class="cart_table_ajax">
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
                                            <input type="number" onchange="updateValue({{ $product->id }})"
                                                name="num-order" value="{{ $product->qty }}" class="num-order-{{$product->id}}"
                                                step="1" min="1" style="width: 100px; text-align: center">
                                        </td>
                                        <td>{{ number_format($product->price * $product->qty, 0, ',', '.') }}đ</td>
                                        <td>
                                            <input type="hidden" class="rowId-{{$product->id}}" value="{{ $product->rowId }}">
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
                                            <p id="total-price" class="fl-right">Tổng giá:
                                                <span>{{ Cart::subtotal() }}đ</span>
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
                    </div>

                </div>
            </div>
            <div class="section" id="action-cart-wp">
                <div class="section-detail">
                    <p class="title">Click vào <span>“Cập nhật giỏ hàng”</span> để cập nhật số lượng. Nhập vào số lượng
                        <span>0</span> để xóa sản phẩm khỏi giỏ hàng. Nhấn vào thanh toán để hoàn tất mua hàng.
                    </p>
                    <a href="{{ route('products') }}" title="" id="buy-more">Mua tiếp</a><br />
                    <a class="" onclick="Destroy()" title="">Xóa giỏ hàng</a>
                    <style>
                        a:hover {
                            cursor: pointer;
                        }
                    </style>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        function Delete(id) {
            var rowId = $('.rowId').val();;
            var data = {
                'rowId': rowId,
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            $.ajax({
                type: "post",
                url: "cart/delete/" + id,
                data: data,
                success: function(response) {
                    $('.charge-item-card').empty();
                    $('.charge-item-card').html(response);
                    toastr.options = {
                        "closeButton": true,
                        "progetBar": true
                    }
                    toastr.success("Bạn đã Xóa Thành công ")
                    $('.table').load(location.href + " .table");
                }
            });
        }

        function Destroy() {
            $.ajax({
                type: "get",
                url: "cart/destroy",
                success: function(response) {
                    $('.charge-item-card').empty();
                    $('.charge-item-card').html(response);
                    toastr.options = {
                        "closeButton": true,
                        "progetBar": true
                    }
                    toastr.success("Bạn đã Xóa Thành công ")
                    $('.table').load(location.href + " .table");
                }
            });
        }

        function updateValue(id) {
            var qty = $('.num-order-'+id).val();
             var rowId = $('.rowId-'+id).val();
            var data = {
                'rowId': rowId,
                'qty': qty,
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            $.ajax({
                type: "post",
                url: "carts/update",
                data: data,
                success: function(response) {
                    $('.charge-item-card').empty();
                    $('.charge-item-card').html(response);
                    toastr.options = {
                        "closeButton": true,
                        "progetBar": true
                    }
                    toastr.success("Bạn đã update Thành công ")
                    $('.table').load(location.href + " .table");
                }
            });
        }
    </script>
@endsection
