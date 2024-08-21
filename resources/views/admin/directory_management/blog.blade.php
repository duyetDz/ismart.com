@extends('templates.tpl_admin_default')

@section('content')
    @include('includes.header-main-admin', ['name' => 'Quản trị danh mục', 'key' => 'Bài viết'])

    <div class="container">
        <div class="d-flex float-end" style="margin-bottom: 10px;">
            <a href="{{ route('admin.blog.create') }}" class="btn btn-primary"
                style="
                height: 32px;
                margin-right: 5px;
                ">
                <i class="fa-sharp fa-solid fa-plus"></i> Add
            </a>

            <form action="{{ route('admin.blog.search') }}" method="GET">
                <div class="d-flex">
                    <input type="text" value="{{ request('ValuetoSearch') }}" placeholder="Search" name="ValuetoSearch"
                        class="form-control">
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
                <input type="date" value="{{ request('date') }}" placeholder="Search" name="date"
                    class="form-control">
                <select name="select" class="form-select d-flex mt-2" aria-label="Default select example">
                    <option value="title" {{ request('select') === 'title' ? 'selected' : '' }}>Tiêu đề</option>
                    <option value="updated_at" {{ request('select') === 'updated_at' ? 'selected' : '' }}>Thời gian cập nhập
                    </option>
                </select>
            </form>

        </div>



        {{-- Table --}}

        <table id="myTable" class="table table-bordered caption-top">
            <thead>
                <tr>
                    <th scope="col" class="col-1 text-center">STT</th>
                    <th scope="col" class="col text-center">Tiêu đề</th>
                    <th scope="col" class="col text-center">Nội dung</th>
                    <th scope="col" class="col text-center">Thời gian cập nhập</th>
                    <th scope="col" class="col text-center">Tác vụ</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $stt = ($blogs->currentPage() - 1) * $blogs->perPage() + 1;
                @endphp
                @foreach ($blogs as $key => $blog)
                    <tr id="">
                        <td class="text-center">
                            {{ $stt++ }}
                        </td>
                        <td class="text-center">
                            {{ $blog->title }}
                        </td>
                        <td class="text-center">
                            {!! Str::limit($blog->content, 78, '...') !!}
                        </td>
                        <td class="text-center">
                            {{ $blog->updated_at }}
                        </td>
                        <td class="d-flex justify-content-center">
                            <a href="blog/update/{{ $blog->id }}" class="btn btn-primary" value=""
                                name="btn_update" id="btn_update" style="margin-right: 7px;"><i
                                    class="fa-solid fa-pen-to-square"></i></a>

                            <form action="blog/destroy/{{ $blog->id }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" type="submit"><i class="fa-solid fa-xmark"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        <nav aria-label="...">
            {{ $blogs->appends(['ValuetoSearch' => request('ValuetoSearch'),'date' => request('date'),'select' => request('select')])->links('templatepagination') }}
        </nav>
    </div>
@endsection
