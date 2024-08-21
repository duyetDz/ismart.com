@extends('templates.tpl_admin_default')

@section('content')
    @include('includes.header-main-admin', ['name' => 'Quản lý đơn hàng', 'key' => 'Chi tiết đơn hàng'])

    <div class="container">
        <h3>Mã đơn hàng: {{$order->order_code}}</h3>
        <div class="d-flex justify-content-xl-between">
            <div>
                <div>Thông tin người nhận</div>
                <div>Họ và tên: {{ $order->name }}</div>
                <div>Số điện thoại : {{ $order->phone_number }}</div>
                <div>Email : {{ $order->email }}</div>
                <div>Địa chỉ : {{ $order->address }}</div>
            </div>

        </div>
        <div class="py-3">
            <table id="myTable" class="table table-bordered caption-top">
                <thead>
                    <tr>
                        <th scope="col" class="col-1 text-center">STT</th>
                        <th scope="col" class="col text-center">Ảnh avatar</th>
                        <th scope="col" class="col text-center">Tên sản phẩm</th>
                        <th scope="col" class="col text-center">Số lượng</th>
                        <th scope="col" class="col text-center">Giá</th>
                        <th scope="col" class="col text-center">Trạng thái</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($orderItems as $key => $item)
                        <tr id="">

                            <td class="text-center">
                                {{$key += 1}}
                            </td>
                            <td class="text-center">
                                <img src="{{asset('')}}{{$item->product->feature_image}}" class="img-thumbnail" style="width: 70px; height: 70px;" alt="...">
                            </td>
                            <td class="text-center">
                                {{$item->product->name}}
                            </td>
                            <td class="text-center">
                                {{$item->quantity}}
                            </td>
                            <td class="text-center">
                                {{ number_format($item->quantity*$item->product->price, 0, ',', '.') }}đ
                            </td>
                            <td class="text-center">
                                {{$order->status}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class=" float-end">
            <div>Tổng giá sản phẩm:{{ number_format($totalAmount, 0, ',', '.') }}đ</div>
            <div>Tổng tiền thu: {{ number_format($totalAmount, 0, ',', '.') }}đ</div>
        </div>

    </div>
@endsection
