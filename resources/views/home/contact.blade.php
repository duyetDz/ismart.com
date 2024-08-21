@extends('templates.tpl_default')

@section('content')
    <div id="main-content-wp" class="home-page clearfix">
        <div class="wp-inner">
            <div class="main-content fl-right">
                <div class="section" id="detail-blog-wp">
                    <div class="section-head clearfix">
                        <h3 class="section-title">Liên hệ</h3>
                    </div>
                    <div class="section-detail"> <span class="create-date">2022-12-11 14:32:36</span>
                        <div class="detail">
                            <p style="text-align: center;"><strong>THÔNG TIN LIÊN HỆ</strong><br>Tư vấn &amp; Hỗ Trợ trực
                                tuyến :<br>Hoạt Động Từ (08:30 - 12:00; 13:30 - 23:30)</p>
                            <p style="text-align: center;">Số điện thoại liên hệ : 0354374284</p>
                            <p style="text-align: center;">Facebook : Giang Văn Duyệt</p>
                            <p style="text-align: center;">&nbsp;</p>
                            <p style="text-align: center;">Thái Bình&nbsp;: (035).4374284</p>
                            <p style="text-align: center;">TP.Hà Nội&nbsp;: (035).4374284</p>
                            <p style="text-align: center;">Email hỗ trợ bán hàng Online, doanh nghiệp : giangvanduyet<a
                                    href="mailto:giangvanduyet@gmail.com">@gmail.com</a></p>
                            <p style="text-align: center;">Mọi thông tin chi tiết về dịch vụ làm chăm sóc khách&nbsp;hàng,
                                hãy liên hệ những thông tin bên trên Xin cảm ơn !</p>
                            <p><img style="display: block; margin-left: auto; margin-right: auto;"
                                    src="https://cdn.pixabay.com/photo/2017/10/17/10/03/contact-2860030__340.jpg"
                                    srcset="https://cdn.pixabay.com/photo/2017/10/17/10/03/contact-2860030__340.jpg 1x, https://cdn.pixabay.com/photo/2017/10/17/10/03/contact-2860030__480.jpg 2x"
                                    alt="Giang Văn Duyệt"></p>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="sidebar fl-left">
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
