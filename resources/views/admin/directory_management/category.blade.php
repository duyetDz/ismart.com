@extends('templates.tpl_admin_default')

@section('content')
    @include('includes.header-main-admin', ['name' => 'Quản trị danh mục', 'key' => 'Loại danh mục'])



    <!-- End modal Update user -->


    <div class="container">
        <div class="d-flex float-end" style="margin-bottom: 10px;">
            <a href="{{ route('admin.category.create') }}" class="btn btn-primary" style="height: 32px;margin-right: 5px;">
                <i class="fa-sharp fa-solid fa-plus"></i> Add
            </a>

            <form action="{{ route('admin.category.search') }}" method="GET">
                <div class="d-flex">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search"
                        class="form-control">
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>

            </form>
        </div>



        {{-- Table --}}

        <table id="myTable" class="table table-bordered caption-top">
            <thead>
                <tr>
                    <th scope="col" class="col-2 text-center">STT</th>
                    <th scope="col" class="col text-center">Tên danh mục</th>
                    <th scope="col" class="col text-center">Tác vụ</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $stt = ($list_category->currentPage() - 1) * $list_category->perPage() + 1;
                @endphp
                @foreach ($list_category as $key => $category)
                    <tr id="">
                        
                        <td class="text-center">
                            {{ $stt++ }}
                        </td>
                        <td class="text-center">
                            {{ $category->name }}
                        </td>
                        <td class="d-flex justify-content-center">

                            <!-- Update user -->

                            <a href="{{ asset('') }}admin/category/update/{{ $category->id }}" class="btn btn-primary"
                                name="btn_update"style="margin-right: 7px;"><i class="fa-solid fa-pen-to-square"></i></a>

                            <a href="{{ asset('') }}admin/category/delete/{{ $category->id }}" class="btn btn-danger"
                                value="{{ $category->id }}" name="btn_delete"><i class="fa-solid fa-xmark"></i></a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        <nav aria-label="...">
            {{ $list_category->appends(['search' => request('search'), 'sort_by' => request('sort_by')])->links('templatepagination') }}
        </nav>
    </div>
@endsection
