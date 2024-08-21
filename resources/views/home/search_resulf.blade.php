@extends('templates.tpl_default')

@section('content')
    <div id="main-content-wp" class="clearfix category-product-page">
        <div class="wp-inner">
            <div class="secion" id="breadcrumb-wp">
                <div class="secion-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <a href="" title="">Trang chủ</a>
                        </li>
                        <li>
                            <a href="" title="">Sản Phẩm</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="main-content fl-right">
                <div class="section" id="list-product-wp">
                    <div class="section-head clearfix">
                        <h3 class="section-title fl-left">Sản Phẩm</h3>
                        <div class="filter-wp fl-right">
                            <p class="desc">Hiển thị {{ $products->count() }} sản phẩm</p>
                        </div>
                    </div>
                    <div class="section-detail">
                        <ul class="list-item clearfix">
                            @if (count($products) > 0)
                                @foreach ($products as $item)
                                    <li>
                                        <a href="{{ asset('') }}products/detail/{{ $item->id }}" title=""
                                            class="thumb">
                                            <img src="{{ asset('') }}{{ $item->feature_image }}">
                                        </a>
                                        <a href="" title="" class="product-name">{!! Str::limit($item->name, 20, '...') !!}</a>
                                        <div class="price">
                                            <span class="new">{{ number_format($item->price, 0, ',', '.') }}đ</span>
                                            <span
                                                class="old">{{ number_format(($item->price * 130) / 100, 0, ',', '.') }}đ</span>
                                        </div>

                                        <div class="action clearfix">
                                            <a onclick="AddCart({{ $item->id }})" title="Thêm giỏ hàng"
                                                class=" fl-left" style="padding: 0px;">
                                                <div class="btn btn-light" style="padding: 8px 30px 8px 30px; border: 1px solid;"><i
                                                        class="fa-solid fa-cart-plus" style="font-size: 20px;"></i></div>
                                            </a>
                                            <a href="{{asset('')}}cart/buy_now/{{$item->id}}" title="Mua ngay" class="btn btn-danger fl-right"
                                                style="padding: 10px 20px 10px 20px;">Mua ngay</a>
                                        </div>
                                    </li>
                                @endforeach
                            @else
                                <p>Không có sản phẩm nào.</p>
                            @endif


                        </ul>
                    </div>
                </div>
                <div class="section" id="paging-wp">
                    <div class="section-detail">
                        
                            {{$products->appends(['search-imput' => request('search-imput')])->onEachSide(1)->links('templatepagination')}}
                        
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
                {{-- <div class="section" id="filter-product-wp">
                    <div class="section-head">
                        <h3 class="section-title">Bộ lọc</h3>
                    </div>
                    <div class="section-detail">
                        <form method="get" action="">
                            <table>
                                <thead>
                                    <tr>
                                        <td colspan="2">Giá</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="radio" value="500000" name="r-price"></td>
                                        <td>Dưới 500.000đ</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" value="1000000" name="r-price"></td>
                                        <td>500.000đ - 1.000.000đ</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" value="5000000" name="r-price"></td>
                                        <td>1.000.000đ - 5.000.000đ</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" value="10000000" name="r-price"></td>
                                        <td>5.000.000đ - 10.000.000đ</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" value="10000000" name="r-price"></td>
                                        <td>Trên 10.000.000đ</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table>
                                <thead>
                                    <tr>
                                        <td colspan="2">Hãng</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="radio" name="r-brand"></td>
                                        <td>Acer</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="r-brand"></td>
                                        <td>Apple</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="r-brand"></td>
                                        <td>Hp</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="r-brand"></td>
                                        <td>Lenovo</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="r-brand"></td>
                                        <td>Samsung</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="r-brand"></td>
                                        <td>Toshiba</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table>
                                <thead>
                                    <tr>
                                        <td colspan="2">Loại</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="radio" name="r-price"></td>
                                        <td>Điện thoại</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="r-price"></td>
                                        <td>Laptop</td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div> --}}

            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {

            $('input[type=radio]').click(function() {
                var brand = $('input[name=r-brand]:checked').val();
                var price = $('input[name=r-price]:checked').val();
                var category = $('input[name=r-category]:checked').val();

                
                // $.ajax({
                //     type: "POST",
                //     url: "your_url",
                //     data: {
                //         brand: brand,
                //         price: price,
                //         category: category
                //     },
                //     success: function(response) {
                //         // Xử lý kết quả trả về ở đây
                //     }
                // });
            });





        });

        function AddCart(id) {
            $.ajax({
                type: "GET",
                url: "cart/add/" + id,

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
