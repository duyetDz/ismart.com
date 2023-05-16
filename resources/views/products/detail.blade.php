@extends('templates.tpl_default')

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div id="main-content-wp" class="clearfix detail-product-page">
        <div class="wp-inner">
            <div class="secion" id="breadcrumb-wp">
                <div class="secion-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <a href="" title="">Trang chủ</a>
                        </li>
                        <li>
                            <a href="" title="">Điện thoại</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="main-content fl-right">
                <div class="section" id="detail-product-wp">
                    <div class="section-detail clearfix">
                        <div class="thumb-wp fl-left" style="width: 100%; max-width: 350px; ">
                            <a href="" title="" id="main-thumb">
                                <img id="zoom" src="{{ asset('') }}{{ $product->feature_image }}"
                                    data-zoom-image="{{ asset('') }}{{ $product->image_zoom }}"
                                    style="max-width: 700px" />
                            </a>

                            <div id="list-thumb">
                                <a href="" data-image="{{ asset('') }}{{ $product->feature_image }}"
                                    data-zoom-image="{{ asset('') }}{{ $product->image_zoom }}">
                                    <img id="zoom" src="{{ asset('') }}{{ $product->feature_image }}"
                                        style="max-width: 50px; " />
                                </a>

                                @foreach ($product_images as $item)
                                    <a href="" data-image="{{ asset('') }}{{ $item->image }}"
                                        data-zoom-image="{{ asset('') }}{{ $item->image_zoom }}">
                                        <img id="zoom" src="{{ asset('') }}{{ $item->image }}"
                                            style="max-width: 50px; " />
                                    </a>
                                @endforeach


                            </div>
                        </div>
                        <div class="thumb-respon-wp fl-left">
                            <img src="client/images/img-pro-01.png" alt="">
                        </div>
                        <div class="info fl-right">
                            <h3 class="product-name">{{ $product->name }}</h3>
                            <div class="desc">
                                <p>{!! $product->configuration !!}</p>
                            </div>
                            <div class="num-product">
                                <span class="title">Trạng thái </span>
                                <span class="status">
                                    @if ($product->price > 0)
                                        Còn hàng
                                    @else
                                        Tạm hết hàng
                                    @endif
                                </span>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="mr-2">Giá:</span>
                                <p class="price mb-0">{{ number_format($product->price, 0, ',', '.') }}đ</p>
                            </div>


                            <form action="{{ asset('') }}cart/buy_nows/{{ $product->id }}" method="post">
                                @csrf
                                <div id="num-order-wp">
                                    <a title="" id="minus"><i class="fa fa-minus"></i></a>
                                    <input type="hidden" class="product_id" value="{{ $product->id }}">
                                    <input type="text" name="num-order" value="1" id="num-order">
                                    <a title="" id="plus"><i class="fa fa-plus"></i></a>
                                </div>
                                @if ($product->price > 0)
                                    <a onclick="AddCart({{ $product->id }})" title="Thêm giỏ hàng"
                                        class="btn add-cart">Thêm
                                        giỏ hàng</a>
                                    <button type="submit" title="Mua ngay" style="background-color: red"
                                        class="btn add-cart">Mua
                                        ngay</button>
                                @else
                                <a  title="Thêm giỏ hàng"
                                    class="btn add-cart">Liên hệ</a>
                                @endif

                            </form>

                        </div>
                    </div>
                </div>
                <div class="section" id="post-product-wp">
                    <div class="section-head">
                        <h3 class="section-title">Mô tả sản phẩm</h3>
                    </div>
                    <div class="section-detail">
                        {!! $product->content !!}
                    </div>
                </div>
                <div class="section" id="same-category-wp">
                    <div class="section-head">
                        <h3 class="section-title">Cùng chuyên mục</h3>
                    </div>
                    <div class="section-detail">
                        <ul class="list-item">
                            @foreach ($products as $item)
                                <li style="min-height: 353px">
                                    <a href="" title="" class="thumb">
                                        <img src="{{ asset('') }}{{ $item->feature_image }}">
                                    </a>
                                    <a href="" title="" class="product-name">{{ $item->name }}</a>
                                    <div class="price">
                                        <span class="new">{{ number_format($item->price, 0, ',', '.') }}đ</span>
                                        <span class="old">{{ number_format($item->price * 1.3, 0, ',', '.') }}đ</span>
                                    </div>
                                    <div class="action clearfix">
                                        <a onclick="addCart({{ $item->id }})" class="add-cart fl-left">Thêm giỏ
                                            hàng</a>
                                        <a href="{{ asset('') }}cart/buy_now/{{ $item->id }}" title=""
                                            class="buy-now fl-right">Mua ngay</a>
                                    </div>
                                </li>
                            @endforeach


                        </ul>
                    </div>
                </div>
            </div>
            <div class="sidebar fl-left">
                <div class="section" id="category-product-wp">
                    <div class="section-head">
                        <h3 class="section-title">Danh mục sản phẩm</h3>
                    </div>
                    <div class="secion-detail">
                        <ul class="list-item">
                            @foreach ($categories as $item)
                                <li>
                                    <a href="{{ asset('') }}products/sort/{{ $item->id }}"
                                        title="">{{ $item->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection


@section('js')
    <script>
        function AddCart(id) {
            var productId = $('.product_id').val();
            var numOrder = $('#num-order').val();

            var data = {
                'productId': productId,
                'numOrder': numOrder,
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "/carts/add/" + productId,
                data: data,
                success: function(response) {
                    $('.charge-item-card').empty();
                    $('.charge-item-card').html(response);
                    toastr.options = {
                        "closeButton": true,
                        "progetBar": true
                    }
                    toastr.success("Bạn đã Thêm Thành công ")
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    console.log(xhr.responseText)
                }
            });
        }

        function addCart(id) {

            $.ajax({
                type: "GET",
                url: "http://127.0.0.1:8000/cart/add/" + id,

                success: function(response) {
                    $('.charge-item-card').empty();
                    $('.charge-item-card').html(response);
                    toastr.options = {
                        "closeButton": true,
                        "progetBar": true
                    }
                    toastr.success("Bạn đã Thêm Thành công ")
                }
            });
        }
    </script>
@endsection
