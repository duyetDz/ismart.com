@extends('templates.tpl_default')

@section('content')
    <div id="main-content-wp" class="home-page clearfix">
        <div class="wp-inner">
            <div class="main-content fl-right">
                <div class="section" id="slider-wp">
                    <div class="section-detail">
                        <div class="item">
                            <img src="{{ asset('client/images/slider-01.png') }}" alt="">
                        </div>
                        <div class="item">
                            <img src="{{ asset('client/images/slider-02.png') }}" alt="">
                        </div>
                        <div class="item">
                            <img src="{{ asset('client/images/slider-03.png') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="section" id="support-wp">
                    <div class="section-detail">
                        <ul class="list-item clearfix">
                            <li>
                                <div class="thumb">
                                    <img src="client/images/icon-1.png">
                                </div>
                                <h3 class="title">Miễn phí vận chuyển</h3>
                                <p class="desc">Tới tận tay khách hàng</p>
                            </li>
                            <li>
                                <div class="thumb">
                                    <img src="client/images/icon-2.png">
                                </div>
                                <h3 class="title">Tư vấn 24/7</h3>
                                <p class="desc">1900.9999</p>
                            </li>
                            <li>
                                <div class="thumb">
                                    <img src="client/images/icon-3.png">
                                </div>
                                <h3 class="title">Tiết kiệm hơn</h3>
                                <p class="desc">Với nhiều ưu đãi cực lớn</p>
                            </li>
                            <li>
                                <div class="thumb">
                                    <img src="client/images/icon-4.png">
                                </div>
                                <h3 class="title">Thanh toán nhanh</h3>
                                <p class="desc">Hỗ trợ nhiều hình thức</p>
                            </li>
                            <li>
                                <div class="thumb">
                                    <img src="client/images/icon-5.png">
                                </div>
                                <h3 class="title">Đặt hàng online</h3>
                                <p class="desc">Thao tác đơn giản</p>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="section" id="same-category-wp">
                    <div class="section-head">
                        <h3 class="section-title">Hàng mới về</h3>
                    </div>
                    <div class="section-detail">
                        <ul class="list-item">
                            @foreach ($product_news as $item)
                                <li style="max-height: 353px">
                                    <a href="products/detail/{{ $item->id }}" title="" class="thumb">
                                        <img src="{{ $item->feature_image }}">
                                    </a>
                                    <a href="" title="" class="product-name">{!! Str::limit($item->name, 20, '...') !!}</a>
                                    <div class="price">
                                        <span class="new">{{ number_format($item->price, 0, ',', '.') }}đ</span>
                                        <span class="old">{{ number_format($item->price * 1.3, 0, ',', '.') }}đ</span>
                                    </div>
                                    <div class="action clearfix text-center">
                                        <div class="action clearfix">
                                            @if ($item->quantity > 0)
                                                <a onclick="AddCart({{ $item->id }})" title="Thêm giỏ hàng"
                                                    class=" fl-left" style="padding: 0px;">
                                                    <div class="btn btn-light"
                                                        style="padding: 8px 30px 8px 30px; border: 1px solid;"><i
                                                            class="fa-solid fa-cart-plus" style="font-size: 20px;"></i>
                                                    </div>
                                                </a>
                                                <a href="{{ asset('') }}cart/buy_now/{{ $item->id }}"
                                                    title="Mua ngay" class="btn btn-danger fl-right"
                                                    style="padding: 10px 20px 10px 20px;">Mua ngay</a>
                                            @else
                                                <button title="Tạm hết hàng" class="btn btn-danger" disabled>Tạm hết
                                                    hàng</button>
                                            @endif
                                        </div>
                                    </div>
                                </li>
                            @endforeach


                        </ul>
                    </div>
                </div>

                <div class="section" id="list-product-wp">
                    <div class="section-head">
                        <h3 class="section-title">Điện thoại</h3>
                    </div>
                    <div class="section-detail">
                        <ul class="list-item clearfix">
                            @foreach ($phones as $item)
                                <li style="max-height: 353px">
                                    <a href="products/detail/{{ $item->id }}" title="" class="thumb">
                                        <img src="{{ $item->feature_image }}">
                                    </a>
                                    <a href="" title="" class="product-name">{!! Str::limit($item->name, 20, '...') !!}</a>
                                    <div class="price">
                                        <span class="new">{{ number_format($item->price, 0, ',', '.') }}đ</span>
                                        <span class="old">{{ number_format($item->price * 1.3, 0, ',', '.') }}đ</span>
                                    </div>
                                    <div class="action clearfix text-center">
                                        <div class="action clearfix">
                                            @if ($item->quantity > 0)
                                                <a onclick="AddCart({{ $item->id }})" title="Thêm giỏ hàng"
                                                    class=" fl-left" style="padding: 0px;">
                                                    <div class="btn btn-light"
                                                        style="padding: 8px 30px 8px 30px; border: 1px solid;"><i
                                                            class="fa-solid fa-cart-plus" style="font-size: 20px;"></i>
                                                    </div>
                                                </a>
                                                <a href="{{ asset('') }}cart/buy_now/{{ $item->id }}"
                                                    title="Mua ngay" class="btn btn-danger fl-right"
                                                    style="padding: 10px 20px 10px 20px;">Mua ngay</a>
                                            @else
                                                <button title="Tạm hết hàng" class="btn btn-danger" disabled>Tạm hết
                                                    hàng</button>
                                            @endif
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>


                <div class="section" id="list-product-wp">
                    <div class="section-head">
                        <h3 class="section-title">Laptop</h3>
                    </div>
                    <div class="section-detail">
                        <ul class="list-item clearfix">
                            @foreach ($laptops as $item)
                                <li style="max-height: 353px">
                                    <a href="{{ asset('') }}products/detail/{{ $item->id }}" title=""
                                        class="thumb">
                                        <img src="{{ asset('') }}{{ $item->feature_image }}">
                                    </a>
                                    <a href="" title="" class="product-name">{!! Str::limit($item->name, 20, '...') !!}</a>
                                    <div class="price">
                                        <span class="new">{{ number_format($item->price, 0, ',', '.') }}đ</span>
                                        <span class="old">{{ number_format($item->price * 1.3, 0, ',', '.') }}đ</span>
                                    </div>
                                    <div class="action clearfix text-center">
                                        <div class="action clearfix">
                                            @if ($item->quantity > 0)
                                                <a onclick="AddCart({{ $item->id }})" title="Thêm giỏ hàng"
                                                    class=" fl-left" style="padding: 0px;">
                                                    <div class="btn btn-light"
                                                        style="padding: 8px 30px 8px 30px; border: 1px solid;"><i
                                                            class="fa-solid fa-cart-plus" style="font-size: 20px;"></i>
                                                    </div>
                                                </a>
                                                <a href="{{ asset('') }}cart/buy_now/{{ $item->id }}"
                                                    title="Mua ngay" class="btn btn-danger fl-right"
                                                    style="padding: 10px 20px 10px 20px;">Mua ngay</a>
                                            @else
                                                <a title="Tạm hết hàng" class="btn btn-danger fl-right"
                                                    style="padding: 10px 20px 10px 20px;">Tạm hết hàng</a>
                                            @endif

                                        </div>
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
                <div class="section" id="selling-wp">
                    <div class="section-head">
                        <h3 class="section-title">Sản phẩm bán chạy</h3>
                    </div>
                    <div class="section-detail">
                        <ul class="list-item">
                            @foreach ($bestSellers as $item)
                                <li class="clearfix">
                                    <a href="{{ asset('') }}products/detail/{{ $item->id }}" title=""
                                        class="thumb fl-left">
                                        <img src="{{ asset('') }}{{ $item->feature_image }}" alt="">
                                    </a>
                                    <div class="info fl-right">
                                        <a href="" title="" class="product-name">{{ $item->name }}</a>
                                        <div class="price">
                                            <span class="new">{{ number_format($item->price, 0, ',', '.') }}đ</span>
                                            <span
                                                class="old">{{ number_format($item->price * 1.3, 0, ',', '.') }}đ</span>
                                        </div>
                                    </div>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
                <div class="section" id="banner-wp">
                    <div class="section-detail">
                        <a href="" title="" class="thumb">
                            <img src="https://i.pinimg.com/236x/09/5c/9d/095c9dbe831339e5d924b238edb3c481.jpg"
                                alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        function AddCart(id) {
            $.ajax({
                type: "GET",
                url: "/cart/add/" + id,

                success: function(response) {
                    $('.charge-item-card').empty();
                    $('.charge-item-card').html(response);
                    toastr.options = {
                        "closeButton": false,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": true,
                        "positionClass": "toast-bottom-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "1000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                    toastr.success("Bạn đã Thêm Thành công ")
                }
            });
        }
    </script>
@endsection
