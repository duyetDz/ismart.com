@extends('templates.tpl_admin_default')

@section('content')
    @include('includes.header-main-admin', ['name' => 'Quản trị danh mục', 'key' => 'Sản phẩm'])


    <div class="container">
        <div class="d-flex float-end" style="margin-bottom: 10px;">
            <a href="{{ route('admin.product.create') }}" class="btn btn-primary"
                style="
                height: 32px;
                margin-right: 5px;
                ">
                <i class="fa-sharp fa-solid fa-plus"></i> Add
            </a>

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
                    <th scope="col" class="col text-center">Tên danh mục</th>
                    <th scope="col" class="col text-center">Số lượng</th>
                    <th scope="col" class="col text-center">Tác vụ</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($products as $product)
                    <tr id="">
                        <td class="text-center">
                            <input class="form-check-input me-1" id="chkboxname" value="" type="checkbox">
                        </td>
                        <td class="text-center">
                            {{ $product->id }}
                        </td>
                        <td class="text-center">
                            <img src="{{ asset('') }}{{ $product->feature_image }}" class="img-thumbnail"
                                style="width: 70px; height: 70px;" alt="...">
                        </td>
                        <td class="text-center">
                            {{ $product->name }}
                        </td>
                        <td class="text-center">
                            {{ $product->category->name }}
                        </td>
                        <td class="text-center">
                            {{ $product->quantity }}
                        </td>
                        <td class="text-center">
                            <a href="product/upload/{{ $product->id }}" class="btn btn-success" name="btn_=upload"
                                id="btn_=upload"><i class="fa-solid fa-image"></i></a>
                            <a href="product/update/{{ $product->id }}" class="btn btn-primary" value=""
                                name="btn_update" id="btn_update" style="margin-right: 7px;
                                margin-left: 7px;"><i
                                    class="fa-solid fa-pen-to-square"></i></a>

                            <a href="product/delete/{{ $product->id }}" class="btn btn-danger" name="btn_delete"
                                id="btn_delete"><i class="fa-solid fa-xmark"></i></a>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
@endsection
