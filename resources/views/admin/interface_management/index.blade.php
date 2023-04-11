@extends('templates.tpl_admin_default')

@section('content')
    @include('includes.header-main-admin', ['name' => 'Quản lý Ảnh', 'key' => 'Danh sách hình ảnh'])

    <div class="container">
        <div class="d-flex float-end" style="margin-bottom: 10px;">

            <form action="" method="GET" class="">
                <input type="text" value="" placeholder="Search" name="ValuetoSearch" class="form-control">
                <!-- End Modal add user  -->

            </form>
        </div>



        {{-- Table --}}

        <table id="myTable" class="table table-bordered caption-top">
            <thead>

                <tr>
                    <th scope="col" class="col-1 text-center">
                        <input class="form-check-input me-1" id="checkboxAll" type="checkbox">
                        All
                    </th>
                    <th scope="col" class="col-1 text-center">ID</th>
                    <th scope="col" class="col text-center">Ảnh avatar</th>
                    <th scope="col" class="col text-center">Tên sản phẩm</th>
                    <th scope="col" class="col text-center">Ngày tạo</th>
                    <th scope="col" class="col text-center">Ngày update</th>
                    <th scope="col" class="col text-center">Tác vụ</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($product_images as $product_image)
                    <tr id="">
                        <td class="text-center">
                            <input class="form-check-input me-1" id="chkboxname" value="" type="checkbox">
                        </td>
                        <td class="text-center">
                            {{$product_image->id}}
                        </td>
                        <td class="text-center">
                            <img src="{{asset('')}}{{$product_image->image}}" class="img-thumbnail" style="width: 70px; height: 70px;" alt="...">
                        </td>
                        <td class="text-center">
                            {{$product_image->product->name}}
                        </td>
                        <td class="text-center">
                            {{$product_image->created_at}}
                        </td>
                        <td class="text-center">
                            {{$product_image->updated_at}}
                        </td>
                        <td class="text-center">
                            <a href="interface/update/{{$product_image->id}}" class="btn btn-primary" value="" name="btn_update"
                                id="btn_update" style="margin-right: 7px;
                            margin-left: 7px;"><i
                                    class="fa-solid fa-pen-to-square"></i></a>

                            <a href="interface/delete/{{$product_image->id}}" class="btn btn-danger" name="btn_delete" id="btn_delete"><i
                                    class="fa-solid fa-xmark"></i></a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        <nav aria-label="...">
            <ul class="pagination">
                <li class="page-item disabled">
                    <span class="page-link">Previous</span>
                </li>
                <li class="page-item">
                    <a class="page-link" href="">1</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="">Next</a>
                </li>
            </ul>
        </nav>
    </div>
@endsection
