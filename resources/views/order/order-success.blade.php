@extends('templates.tpl_default')

@section('content')
    <div id="main-content-wp" class="checkout-page">
        <div class="section" id="breadcrumb-wp">
            <div class="wp-inner">
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <a href="?page=home" title="">Trang chủ</a>
                        </li>
                        <li>
                            <a href="" title="">Thanh toán</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div id="wrapper" class="wp-inner clearfix">
            <section class="vh-100" style="background-color: #fdccbc;">
                <div class="container h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col">
                            <div>
                                <p class="text-center"><span class="h2">Đặt hàng thành công</span><span
                                        class="h4">(số lượng {{ $totalQty }})</span></p>
                            </div>


                            <div class="card mb-4">
                                <div class="card-body p-4">
                                    <h5>Sản phẩm đã đặt</h5>
                                    <table id="myTable" class="table table-bordered caption-top">
                                        <thead>

                                            <tr>
                                                <th scope="col" class="col-1 text-center">STT</th>
                                                <th scope="col" class="col-2 text-center">Ảnh avatar</th>
                                                <th scope="col" class="col-3 text-center">Tên sản phẩm</th>
                                                <th scope="col" class="col-3 text-center">Số lượng</th>
                                                <th scope="col" class="col-3 text-center">Ngày đặt</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $t = 0;
                                            @endphp
                                            @foreach ($orderItems as $item)
                                                <tr id="">
                                                    <td class="text-center">
                                                        {{$t += 1}}
                                                    </td>
                                                    <td class="text-center">
                                                        <img src="{{asset('')}}{{$item->product->feature_image}}"
                                                            class="img-thumbnail" style="width: 70px; height: 70px;"
                                                            alt="...">
                                                    </td>
                                                    <td class="text-center">
                                                        {{$item->product->name}}
                                                    </td>
                                                    <td class="text-center">
                                                        {{$item->quantity}}
                                                    </td>
                                                    <td class="text-center">
                                                        {{$item->created_at}}
                                                    </td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>

                            <div class="card mb-5">
                                <div class="card-body p-4">

                                    <div class="float-end">
                                        <p class="mb-0 me-5 d-flex align-items-center">
                                        <h5>Thông tin người nhận</h5>
                                        <p>Họ và tên : {{$order->name}}</p>
                                        <p>Số điện thoại: {{$order->phone_number}}</p>
                                        <p>Địa chỉ : {{$order->address}} </p>
                                        <p>Phương thức thanh toán: {{$order->payment}}</p>
                                        </p>
                                    </div>

                                </div>
                            </div>

                            <div class="d-flex float-right" style="margin-bottom: 30px">
                                <a href="{{ route('products') }}" class="btn btn-light btn-lg me-2">Tiếp tục mua thoii !</a>
                                {{-- <button type="button" class="btn btn-primary btn-lg">Add to cart</button> --}}
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
