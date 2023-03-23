@extends('templates.tpl_default')

@section('content')
<div id="main-content-wp" class="clearfix blog-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Blog</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content fl-right">
            <div class="section" id="list-blog-wp">
                <div class="section-head clearfix">
                    <h3 class="section-title">Blog</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">
                        <li class="clearfix">
                            <a href="{{route('blog.detail')}}" title="" class="thumb fl-left">
                                <img src="client/images/img-post-01.jpg" alt="">
                            </a>
                            <div class="info fl-right">
                                <a href="{{route('blog.detail')}}" title="" class="title">Mời gọi kiều bào hiến kế, chung sức xây dựng phát triển TP. Hồ Chí Minh</a>
                                <span class="create-date">28/11/2017</span>
                                <p class="desc">Trong ngày hôm nay (11/11) đoàn kiều bào đã tổ chức thành 4 nhóm đi tham quan các điểm như huyện Cần Giờ, Đại học Quốc gia, Khu công nghệ cao TP.HCM, Công viên phần mềm Quang Trung, Khu Nông nghiệp Công nghệ cao, Khu Đô thị mới Thủ Thiêm, Cảng Cát Lái... để kiều bào hiểu thêm về tình hình phát [...]</p>
                            </div>
                        </li>
                        
                    </ul>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <a href="" title="">1</a>
                        </li>
                        <li>
                            <a href="" title="">2</a>
                        </li>
                        <li>
                            <a href="" title="">3</a>
                        </li>
                    </ul>
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
                        <li class="clearfix">
                            <a href="{{route('products.detail')}}" title="" class="thumb fl-left">
                                <img src="client/images/img-pro-13.png" alt="">
                            </a>
                            <div class="info fl-right">
                                <a href="{{route('products.detail')}}" title="" class="product-name">Laptop Asus A540UP I5</a>
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
                    <a href="?page=detail_blog_product" title="" class="thumb">
                        <img src="client/images/banner.png" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection