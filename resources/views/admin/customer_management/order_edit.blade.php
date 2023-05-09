@extends('templates.tpl_admin_default')

@section('content')
    @include('includes.header-main-admin', ['name' => 'Quản lý đơn hàng', 'key' => 'Trạng thái đơn hàng'])

    <div class="container d-flex" style="justify-content: space-between">
        <div class="" style="width: 45%">
                <form action="" method="post">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Mã đơn hàng</p>
                                </div>
                                <div class="col-sm-9">
                                    <input class="form-control " value="{{$order->order_code}}" type="text" disabled>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Trang thái</p>
                                </div>
                                <div class="col-sm-9">
                                    <select name="status" class="form-select" aria-label="Default select example">
                                        <option value="Chờ xác nhận" selected>Chờ xác nhận</option>
                                        <option value="Đang giao hàng">Đang giao hàng</option>
                                        <option value="Đã giao">Đã giao</option>
                                        <option value="Giao hàng thành công">Giao hàng thành công</option>
                                      </select>
                                </div>
                            </div>
                            <button class="btn btn-primary my-3" type="submit">Update trạng thái</button>
                        </div>
                        
                    </div>
                </form>
        </div>
        <div class="float-end" style="width: 45%">
                <form action="">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                
                                <div class="col-sm-3">
                                    <p class="mb-0">Họ và tên</p>
                                </div>
                                <div class="col-sm-9">
                                    <input class="form-control " value="{{$order->name}}"  type="text" disabled>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Email</p>
                                </div>
                                <div class="col-sm-9">
                                    <input class="form-control " value="{{$order->email}}"  type="text" disabled> 
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Số điện thoại</p>
                                </div>
                                <div class="col-sm-9">
                                    <input class="form-control " value="{{$order->phone_number}}"  type="text" disabled>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Address</p>
                                </div>
                                <div class="col-sm-9">
                                    <input class="form-control " value="{{$order->address}}"  type="text" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </form>
        </div>


    </div>
@endsection
