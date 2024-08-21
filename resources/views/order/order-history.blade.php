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
                <div class="h-100" style=" padding: 0px; margin: 0px; ">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col">

                            <table id="myTable" class="table table-bordered caption-top">
                                <thead>
                                    <tr>
                                        <th scope="col" class="col-1 text-center">STT</th>
                                        <th scope="col" class="col-1 text-center">Mã đơn hàng</th>
                                        <th scope="col" class="col-1 text-center">Tên người dùng</th>
                                        <th scope="col" class="col-2 text-center">Địa chỉ</th>
                                        <th scope="col" class="col-1 text-center">Thanh toán</th>
                                        <th scope="col" class="col-2 text-center">Trạng thái</th>
                                        <th scope="col" class="col-2 text-center">Ngày đặt</th>
                                        <th scope="col" class="col-1 text-center">Chị tiết</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $t = 0;
                                    @endphp
                                    @foreach ($orders as $item)
                                        <tr>
                                            <td class="text-center">
                                                {{ $t += 1 }}
                                            </td>
                                            <td class="text-center">
                                                {{ $item->order_code }}
                                            </td>
                                            <td class="text-center">
                                                {{ $item->name }}
                                            </td>
                                            <td class="text-center">
                                                {{ $item->address }}
                                            </td>
                                            <td class="text-center">
                                                {{ $item->payment }}
                                            </td>
                                            <td class="text-center">
                                                {{ $item->status }}
                                            </td>
                                            <td class="text-center">
                                                {{ $item->created_at }}
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ asset('order/detail/' . $item->id) }}">Chi tiết</a>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="section" id="paging-wp">
                                <div class="section-detail">

                                    {{ $orders->onEachSide(1)->links('templatepagination') }}

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
