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
                            @foreach ($blogs as $item)
                                <li class="clearfix" style="margin-bottom: 5px">
                                    <a href="{{asset('')}}blog/detail/{{$item->id}}" title="" class="thumb fl-left" >
                                        <img src="{{asset('')}}{{$item->feature_img}}" class="img-thumbnail" alt="" style="width: 100%;height: auto;">
                                    </a>
                                    <div class="info fl-right">
                                        <a href="{{asset('')}}blog/detail/{{$item->id}}" title="" class="title">{{$item->title}}</a>
                                        <span class="create-date">{{ $item->updated_at->format('d/m/Y') }}</span>
                                        <p class="desc">{!! Str::limit($item->content, 200, '...') !!}
                                        </p>
                                    </div>
                                </li>
                            @endforeach


                        </ul>
                    </div>
                </div>
                <div class="section" id="paging-wp">
                    <div class="section-detail">
                        {{$blogs->onEachSide(1)->links('templatepagination')}}
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
                                <a href="" title="" class="thumb fl-left">
                                    <img src="client/images/img-pro-13.png" alt="">
                                </a>
                                <div class="info fl-right">
                                    <a href="" title="" class="product-name">Laptop Asus A540UP I5</a>
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
                
            </div>
        </div>
    </div>
@endsection
