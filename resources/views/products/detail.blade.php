@extends('templates.tpl_default')

@section('content')
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
                                <span class="title">Sản phẩm: </span>
                                <span class="status"></span>
                            </div>
                            <p class="price">{{ number_format($product->price, 0, ',', '.') }}đ</p>
                            <form action="{{ asset('cart/add/' . $product->id . '') }}" method="post">
                                @csrf
                                <div id="num-order-wp">
                                    <a title="" id="minus"><i class="fa fa-minus"></i></a>
                                    <input type="text" name="num-order" value="1" id="num-order">
                                    <a title="" id="plus"><i class="fa fa-plus"></i></a>
                                </div>
                                <button type="submit" title="Thêm giỏ hàng" class="btn add-cart">Thêm giỏ hàng</button>
                                <button title="Mua ngay" style="background-color: red" class="btn add-cart">Mua
                                    ngay</button>
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
                            <li>
                                <a href="" title="" class="thumb">
                                    <img src="{{ asset('client/images/img-pro-17.png') }}">
                                </a>
                                <a href="" title="" class="product-name">Laptop HP Probook 4430s</a>
                                <div class="price">
                                    <span class="new">17.900.000đ</span>
                                    <span class="old">20.900.000đ</span>
                                </div>
                                <div class="action clearfix">
                                    <a href="" title="" class="add-cart fl-left">Thêm giỏ hàng</a>
                                    <a href="" title="" class="buy-now fl-right">Mua ngay</a>
                                </div>
                            </li>


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
                            <li>
                                <a href="?page=category_product" title="">Điện thoại</a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="?page=category_product" title="">Iphone</a>
                                    </li>
                                    <li>
                                        <a href="?page=category_product" title="">Samsung</a>
                                        <ul class="sub-menu">
                                            <li>
                                                <a href="?page=category_product" title="">Iphone X</a>
                                            </li>
                                            <li>
                                                <a href="?page=category_product" title="">Iphone 8</a>
                                            </li>
                                            <li>
                                                <a href="?page=category_product" title="">Iphone 8 Plus</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="?page=category_product" title="">Oppo</a>
                                    </li>
                                    <li>
                                        <a href="?page=category_product" title="">Bphone</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="?page=category_product" title="">Máy tính bảng</a>
                            </li>
                            <li>
                                <a href="?page=category_product" title="">laptop</a>
                            </li>
                            <li>
                                <a href="?page=category_product" title="">Tai nghe</a>
                            </li>
                            <li>
                                <a href="?page=category_product" title="">Thời trang</a>
                            </li>
                            <li>
                                <a href="?page=category_product" title="">Đồ gia dụng</a>
                            </li>
                            <li>
                                <a href="?page=category_product" title="">Thiết bị văn phòng</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="section" id="banner-wp">
                    <div class="section-detail">
                        <a href="" title="" class="thumb">
                            <img src="client/images/banner.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
