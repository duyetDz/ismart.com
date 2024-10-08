@extends('templates.tpl_admin_default')

@section('content')
    @include('includes.header-main-admin', ['name' => 'Quản lý đơn hàng', 'key' => 'Danh sách đơn hàng'])

    <div class="container">
        <div class="d-flex float-end" style="margin-bottom: 10px;">
            

            <form action="{{route('admin.order.search')}}" method="GET">
                <div class="d-flex">
                    <input type="text" value="" placeholder="Search" name="ValuetoSearch" class="form-control">
                    <!-- End Modal add user  -->
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
                <select name="select" class="form-select d-flex mt-2" aria-label="Default select example">
                    <option value="name" selected>Tên người dùng</option>
                    <option value="order_code">Mã đơn hàng</option>
                </select>
            </form>
        </div>



        {{-- Table --}}

        <table id="myTable" class="table table-bordered caption-top">
            <thead>
                <tr>
                    <th scope="col" class="col-1 text-center">STT</th>
                    <th scope="col" class="col-1 text-center">Mã đơn hàng</th>
                    <th scope="col" class="col text-center">Tên người dùng</th>
                    <th scope="col" class="col text-center">Địa chỉ</th>
                    <th scope="col" class="col text-center">Phương thức thanh toán</th>
                    <th scope="col" class="col text-center">Tổng tiền</th>
                    <th scope="col" class="col text-center">Trạng thái</th>
                    <th scope="col" class="col text-center">Ngày update</th>

                    <th scope="col" class="col text-center">Tác vụ</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $key => $order)
                    <tr>
                        
                        <td class="text-center">
                            {{ $key += 1 }}
                        </td>
                        <td class="text-center">
                            {{ $order->order_code }}
                        </td>
                        <td class="text-center">
                            {{ $order->name }}
                        </td>
                        <td class="text-center">
                            {{ $order->address }}
                        </td>
                        <td class="text-center">
                            {{ $order->payment }}
                        </td>
                        <td class="text-center">
                            {{ number_format($order->total, 0, ',', '.') }}đ
                        </td>
                        <td class="text-center">
                            {{ $order->status }}
                        </td>
                        <td class="text-center">
                            {{ $order->updated_at }}
                        </td>
                        <td class="d-flex justify-content-center">
                            <a href="update/{{$order->id}}" class="btn btn-primary" value="" name="btn_update" id="btn_update"
                                style="margin-right: 7px;"><i class="fa-solid fa-pen-to-square"></i></a>

                            <a href="detail/{{$order->id}}" class="btn btn-info" value="" name="btn_update" id="btn_update"
                                style="margin-right: 7px;"><i class="fa-solid fa-circle-info"></i></a>
                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>
        <div class="section" id="paging-wp">
            <div class="section-detail">

                {{ $orders->appends(['ValuetoSearch' => request('ValuetoSearch'),'select' => request('select')])->onEachSide(1)->links('templatepagination') }}

            </div>
        </div>
    </div>
@endsection
