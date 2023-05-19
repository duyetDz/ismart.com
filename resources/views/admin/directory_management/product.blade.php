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

            <form action="{{ route('admin.product.search') }}" method="get">

                <div class="d-flex">
                    <input type="text" value="{{ request('ValuetoSearch') }}" placeholder="Search" name="ValuetoSearch"
                        class="form-control">
                    <!-- End Modal add user  -->
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
                <select name="select" class="form-select d-flex mt-2" aria-label="Default select example">
                    <option value="name" @if (request('select') == 'name') selected @endif>Tên sản phẩm</option>
                    @foreach ($category as $item)
                        <option value="{{ $item->id }}" @if (request('select') == $item->id) selected @endif>
                            {{ $item->name }}</option>
                    @endforeach
                </select>

            </form>

        </div>



        {{-- Table --}}

        <table id="myTable" class="table table-bordered caption-top">
            <thead>
                <tr>
                    <th scope="col" class="col-1 text-center">STT</th>
                    <th scope="col" class="col-2 text-center">Ảnh avatar</th>
                    <th scope="col" class="col-1 text-center">Tên sản phẩm</th>
                    <th scope="col" class="col-2 text-center">Tên danh mục</th>
                    <th scope="col" class="col-1 text-center">Giá</th>
                    <th scope="col" class="col-1 text-center">Số lượng</th>
                    <th scope="col" class="col-3 text-center">Tác vụ</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $stt = ($products->currentPage() - 1) * $products->perPage() + 1;
                @endphp
                @foreach ($products as $key => $product)
                    <tr id="">
                        <td class="text-center">
                            {{ $stt ++ }}
                        </td>
                        <td class="text-center">
                            <img src="{{ asset('') }}{{ $product->feature_image }}" class="img-thumbnail"
                                style="width: 70px; height: 70px;" alt="...">
                        </td>
                        <td class="text-center">
                            {!! Str::limit($product->name, 20, '...') !!}
                        </td>
                        <td class="text-center">

                            {{ $product->category->name }}
                        </td>
                        <td class="text-center">
                            {{ number_format($product->price, 0, ',', '.') }}đ
                        </td>
                        <td class="text-center">
                            {{ $product->quantity }}
                        </td>
                        <td class="text-center">
                            <a href="{{ asset('') }}admin/product/upload/{{ $product->id }}" class="btn btn-success"
                                name="btn_=upload" id="btn_=upload"><i class="fa-solid fa-image"></i></a>
                            <a href="{{ asset('') }}admin/product/update/{{ $product->id }}" class="btn btn-primary"
                                value="" name="btn_update" id="btn_update"
                                style="margin-right: 7px;
                                margin-left: 7px;"><i
                                    class="fa-solid fa-pen-to-square"></i></a>

                            <a href="{{ asset('') }}admin/product/delete/{{ $product->id }}" class="btn btn-danger"
                                name="btn_delete" id="btn_delete"><i class="fa-solid fa-xmark"></i></a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        <nav aria-label="...">
            {{ $products->appends(['ValuetoSearch' => request('ValuetoSearch'), 'select' => request('select')])->links('templatepagination') }}
        </nav>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
@endsection
