<div id="site">
    <div id="container">
        <div id="header-wp">
            <div id="head-top" class="clearfix">
                <div class="wp-inner">
                    <a href="{{ route('index') }}" title="" id="payment-link" class="fl-left">Hình thức thanh
                        toán</a>
                    <div id="main-menu-wp" class="fl-right">
                        <ul id="main-menu" class="clearfix">
                            <li>
                                <a href="{{ route('index') }}" title="">Trang chủ</a>
                            </li>
                            <li>
                                <a href="{{ route('products') }}" title="">Sản phẩm</a>
                            </li>
                            <li>
                                <a href="{{ route('blog') }}" title="">Blog</a>
                            </li>
                            <li>
                                <a href="{{ route('introduce') }}" title="">Giới thiệu</a>
                            </li>
                            <li>
                                <a href="{{ route('contact') }}" title="">Liên hệ</a>
                            </li>
                            <li>
                                <div class="dropdown">
                                    <button class="btn  dropdown-toggle" type="button" id="dropdownMenuButton"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                        style="background-color: #2a30f1; color : #fff; padding-top: 10px;">
                                        <?php
                                            if (!empty( Auth::user()->name )) {
                                               echo Auth::user()->name
                                            ?>
                                    </button>
                                    <div id="dropdown-menu" class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" id="dropdown-item"
                                            href="{{ route('users.profile') }}">Hồ sơ</a>
                                        <a href="{{ asset('order/history') }}" class="dropdown-item"
                                            id="dropdown-item">Quản lý đơn hàng</a>
                                        <a id="dropdown-item" class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                                <?php
                                        } else {
                                            echo "Tạo tài khoản";
                                            ?>
                                </button>
                                <div id="dropdown-menu" class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" id="dropdown-item" href="{{ route('login') }}">Đăng
                                        nhập</a>
                                    <a class="dropdown-item" id="dropdown-item" href="{{ route('register') }}">Đăng
                                        ký</a>
                                </div>
                    </div>
                    <?php
                                        }

                                        ?>

                    </li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="head-body" class="clearfix">
            <div class="wp-inner">
                <a href="{{ route('index') }}" title="" id="logo" class="fl-left"><img
                        src="{{ asset('client/images/logo.png') }}" /></a>
                <div id="search-wp" class="fl-left">
                    <div style="position: relative">
                        <form action="{{route('search_all')}}" method="get">
                            <input type="text" class="header__search-imput" value="{{ request('search-imput') }}" name="search-imput" id="search-imput"
                                placeholder="Nhập từ khóa tìm kiếm tại đây!" style="padding:5px; width: 450px;">
                            <button type="submit"
                                style="position: absolute;left: 87%;/* top: 0.5px; */height: 36px;width: 57px;margin: 1px 0px;padding: 0px;"
                                class="btn btn-black float-right" id="sm-s"><i
                                    class="fa-solid fa-magnifying-glass"></i></button></a>
                        </form>

                        <div class="search_results">

                        </div>

                    </div>

                </div>
                <div id="action-wp" class="fl-right">
                    <div id="advisory-wp" class="fl-left">
                        <span class="title">Tư vấn</span>
                        <span class="phone">0987.654.321</span>
                    </div>
                    <div id="btn-respon" class="fl-right"><i class="fa fa-bars" aria-hidden="true"></i></div>
                    <a href="?page=cart" title="giỏ hàng" id="cart-respon-wp" class="fl-right">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        <span class="num_cart" id="num">2</span>
                    </a>
                    <div id="cart-wp" class="fl-right">
                        <div class="charge-item-card">
                            <div id="btn-cart">
                                <a href="{{ route('cart') }}" style="color: #fff"><i class="fa fa-shopping-cart"
                                        aria-hidden="true"></i>
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
                        </div>

                    </div>
                </div>
            </div>
        </div>
