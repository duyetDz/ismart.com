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
                            @foreach ($bestSellers as $item)
                                <li class="clearfix">
                                    <a href="{{asset('')}}products/detail/{{ $item->id }}" title="" class="thumb fl-left">
                                        <img src="{{asset('')}}{{ $item->feature_image }}" alt="">
                                    </a>
                                    <div class="info fl-right">
                                        <a href="" title="" class="product-name">{{ $item->name }}</a>
                                        <div class="price">
                                            <span class="new">{{ number_format($item->price, 0, ',', '.') }}đ</span>
                                        <span class="old">{{ number_format($item->price * 1.3, 0, ',', '.') }}đ</span>
                                        </div>
                                    </div>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection
