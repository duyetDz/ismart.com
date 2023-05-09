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
                <div class="section" id="feature-product-wp">
                    <div class="section-head">
                        <h3 class="section-title">Sản phẩm nổi bật</h3>
                    </div>
                    <div class="section-detail">
                        <ul class="list-item">
                            <li>
                                <a href="" title="" class="thumb">
                                    <img src="client/images/img-pro-05.png">
                                </a>
                                <a href="" title="" class="product-name">Laptop Lenovo
                                    IdeaPad 120S</a>
                                <div class="price">
                                    <span class="new">5.190.000đ</span>
                                    <span class="old">6.190.000đ</span>
                                </div>
                                <div class="action clearfix text-center">
                                    <div class="action clearfix">
                                        <a href="cart/add/9" title="Thêm giỏ hàng" class=" fl-left"
                                            style="padding: 0px;">
                                            <div class="btn btn-primary" style="padding: 8px 30px 8px 30px;"><i
                                                    class="fa-solid fa-cart-plus" style="font-size: 20px;"></i></div>
                                        </a>
                                        <a href="?page=checkout" title="Mua ngay" class="btn btn-danger fl-right"
                                            style="padding: 10px 20px 10px 20px;">Mua ngay</a>
                                    </div>
                                </div>
                            </li>
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
                                <li>
                                    <a href="products/detail/{{$item->id}}" title="" class="thumb">
                                        <img src="{{ $item->feature_image }}">
                                    </a>
                                    <a href="" title=""
                                        class="product-name">{!! Str::limit($item->name, 20, '...') !!}</a>
                                    <div class="price">
                                        <span class="new">{{ number_format($item->price, 0, ',', '.') }}đ</span>
                                        <span class="old">{{ number_format($item->price*1.3, 0, ',', '.') }}đ</span>
                                    </div>
                                    <div class="action clearfix text-center">
                                        <div class="action clearfix">
                                            <a href="cart/add/9" title="Thêm giỏ hàng" class=" fl-left"
                                                style="padding: 0px;">
                                                <div class="btn btn-primary" style="padding: 8px 30px 8px 30px;"><i
                                                        class="fa-solid fa-cart-plus" style="font-size: 20px;"></i></div>
                                            </a>
                                            <a href="?page=checkout" title="Mua ngay" class="btn btn-danger fl-right"
                                                style="padding: 10px 20px 10px 20px;">Mua ngay</a>
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
                                <li>
                                    <a href="products/detail/{{$item->id}}" title="" class="thumb">
                                        <img src="{{ $item->feature_image }}">
                                    </a>
                                    <a href="" title=""
                                        class="product-name">{!! Str::limit($item->name, 20, '...') !!}</a>
                                    <div class="price">
                                        <span class="new">{{ number_format($item->price, 0, ',', '.') }}đ</span>
                                        <span class="old">{{ number_format($item->price*130/100, 0, ',', '.') }}đ</span>
                                    </div>
                                    <div class="action clearfix text-center">
                                        <div class="action clearfix">
                                            <a href="cart/add/9" title="Thêm giỏ hàng" class=" fl-left"
                                                style="padding: 0px;">
                                                <div class="btn btn-primary" style="padding: 8px 30px 8px 30px;"><i
                                                        class="fa-solid fa-cart-plus" style="font-size: 20px;"></i></div>
                                            </a>
                                            <a href="?page=checkout" title="Mua ngay" class="btn btn-danger fl-right"
                                                style="padding: 10px 20px 10px 20px;">Mua ngay</a>
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
                                    <a href="?page=category_product" title="">{{ $item->name }}</a>
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
                            <li class="clearfix">
                                <a href="" title="" class="thumb fl-left">
                                    <img src="client/images/img-pro-13.png" alt="">
                                </a>
                                <div class="info fl-right">
                                    <a href="" title="" class="product-name">Laptop
                                        Asus A540UP I5</a>
                                    <div class="price">
                                        <span class="new">5.190.000đ</span>
                                        <span class="old">7.190.000đ</span>
                                    </div>
                                    <a href="" title="" class="buy-now">Mua ngay</a>
                                </div>
                            </li>
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
