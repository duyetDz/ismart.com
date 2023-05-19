@extends('templates.tpl_admin_default')

@section('content')
    @include('includes.header-main-admin', ['name' => 'Quản lý Ảnh', 'key' => 'Danh sách hình ảnh'])

    <div class="container">
        <div class="d-flex float-end" style="margin-bottom: 10px;">

            <form action="{{route('admin.product_image.search')}}" method="get">
               
                <div class="d-flex">
                    <input type="text" value="{{ request('ValuetoSearch') }}" placeholder="Search" name="ValuetoSearch"
                        class="form-control">
                    <!-- End Modal add user  -->
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
                <select name="select" class="form-select d-flex mt-2" aria-label="Default select example">
                    <option value="name" @if (request('select') == 'name') selected @endif>Tên sản phẩm</option>
                    @foreach ($categories as $item)
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
                    <th scope="col" class="col text-center">Ảnh avatar</th>
                    <th scope="col" class="col text-center">Tên sản phẩm</th>
                    <th scope="col" class="col text-center">Danh mục</th>
                    <th scope="col" class="col text-center">Ngày update</th>
                    <th scope="col" class="col text-center">Tác vụ</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $stt = ($product_images->currentPage() - 1) * $product_images->perPage() + 1;
                @endphp
                @foreach ($product_images as $key => $product_image)
                    <tr id="">
                        <td class="text-center">
                            {{$stt ++}}
                        </td>
                        <td class="text-center">
                            <img src="{{asset('')}}{{$product_image->image}}" class="img-thumbnail" style="width: 70px; height: 70px;" alt="...">
                        </td>
                        <td class="text-center">
                            {{$product_image->product->name}}
                        </td>
                        <td class="text-center">
                            {{$product_image->product->category->name}}
                        </td>
                        <td class="text-center">
                            {{$product_image->updated_at}}
                        </td>
                        <td class="text-center">
                            <a href="{{asset('')}}admin/interface/update/{{$product_image->id}}" class="btn btn-primary" value="" name="btn_update"
                                id="btn_update" style="margin-right: 7px;
                            margin-left: 7px;"><i
                                    class="fa-solid fa-pen-to-square"></i></a>

                            <a href="{{asset('')}}admin/interface/delete/{{$product_image->id}}" class="btn btn-danger" name="btn_delete" id="btn_delete"><i
                                    class="fa-solid fa-xmark"></i></a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        <nav aria-label="...">
            {{ $product_images->appends(['ValuetoSearch' => request('ValuetoSearch'), 'select' => request('select')])->links('templatepagination') }}
        </nav>
    </div>
@endsection
