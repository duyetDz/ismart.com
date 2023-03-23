<div id="site">
    <div id="container">
        <div id="header-wp">
            <div id="head-top" class="clearfix">
                <div class="wp-inner">
                    <a href="{{route('index')}}" title="" id="payment-link" class="fl-left">Hình thức thanh toán</a>
                    <div id="main-menu-wp" class="fl-right">
                        <ul id="main-menu" class="clearfix">
                            <li>
                                <a href="{{route('index')}}" title="">Trang chủ</a>
                            </li>
                            <li>
                                <a href="{{route('products')}}" title="">Sản phẩm</a>
                            </li>
                            <li>
                                <a href="{{route('blog')}}" title="">Blog</a>
                            </li>
                            <li>
                                <a href="{{route('index')}}" title="">Giới thiệu</a>
                            </li>
                            <li>
                                <a href="{{route('index')}}" title="">Liên hệ</a>
                            </li>
                            <li>
                                <div class="dropdown">
                                    <button class="btn  dropdown-toggle" type="button" id="dropdownMenuButton"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                        style="background-color: #d9263c; color : #fff; padding-top: 10px;">
                                        <?php
                                            if (!empty($_SESSION['username'])) {
                                                echo $_SESSION['username'];
                                            ?>
                                    </button>
                                    <div id="dropdown-menu" class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" id="dropdown-item" href="#">Hồ sơ</a>
                                        <a class="dropdown-item" id="dropdown-item" >Đơn mua</a>
                                        <a class="dropdown-item" id="dropdown-item"
                                            href="?mod=users&controller=index&action=logout">Đăng xuất</a>
                                    </div>
                                </div>
                                <?php
                                        } else {
                                            echo "Tạo tài khoản";
                                            ?>
                                </button>
                                <div id="dropdown-menu" class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" id="dropdown-item" href="{{route('users.login')}}">Đăng
                                        nhập</a>
                                    <a class="dropdown-item" id="dropdown-item" href="{{route('users.reg')}}">Đăng
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
                <a href="{{route('index')}}" title="" id="logo" class="fl-left"><img
                        src="{{ asset('client/images/logo.png') }}" /></a>
                <div id="search-wp" class="fl-left">
                    <form method="POST" action="">
                        <input type="text" name="s" id="s"
                            placeholder="Nhập từ khóa tìm kiếm tại đây!">
                        <button type="submit" id="sm-s">Tìm kiếm</button>
                    </form>
                </div>
                <div id="action-wp" class="fl-right">
                    <div id="advisory-wp" class="fl-left">
                        <span class="title">Tư vấn</span>
                        <span class="phone">0987.654.321</span>
                    </div>
                    <div id="btn-respon" class="fl-right"><i class="fa fa-bars" aria-hidden="true"></i></div>
                    <a href="?page=cart" title="giỏ hàng" id="cart-respon-wp" class="fl-right">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        <span id="num">2</span>
                    </a>
                    <div id="cart-wp" class="fl-right">
                        <div id="btn-cart">
                            <a  style="color: #fff"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                <span id="num">2</span></a>

                        </div>
                        <div id="dropdown">
                            <p class="desc">Có <span>2 sản phẩm</span> trong giỏ hàng</p>
                            <ul class="list-cart">
                                <li class="clearfix">
                                    <a  title="" class="thumb fl-left">
                                        <img src="client/images/img-pro-11.png" alt="">
                                    </a>
                                    <div class="info fl-right">
                                        <a  title="" class="product-name">Sony Express X6</a>
                                        <p class="price">6.250.000đ</p>
                                        <p class="qty">Số lượng: <span>1</span></p>
                                    </div>
                                </li>
                                <li class="clearfix">
                                    <a  title="" class="thumb fl-left">
                                        <img src="client/images/img-pro-23.png" alt="">
                                    </a>
                                    <div class="info fl-right">
                                        <a  title="" class="product-name">Laptop Lenovo 10</a>
                                        <p class="price">16.250.000đ</p>
                                        <p class="qty">Số lượng: <span>1</span></p>
                                    </div>
                                </li>
                            </ul>
                            <div class="total-price clearfix">
                                <p class="title fl-left">Tổng:</p>
                                <p class="price fl-right">18.500.000đ</p>
                            </div>
                            <div class="action-cart clearfix">
                                <a href="{{route('cart')}}" title="Giỏ hàng" class="view-cart fl-left">Giỏ hàng</a>
                                <a href="{{route('checkout')}}" title="Thanh toán" class="checkout fl-right">Thanh toán</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
