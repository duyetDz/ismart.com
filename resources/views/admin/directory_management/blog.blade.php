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
                    <th scope="col" class="col-2 text-center">ID</th>
                    <th scope="col" class="col text-center">Tiêu đề</th>
                    <th scope="col" class="col text-center">Tác giả</th>
                    <th scope="col" class="col text-center">Tác vụ</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($blogs as $blog)
                    <tr id="">
                        <td class="text-center">
                            <input class="form-check-input me-1" id="chkboxname" value="" type="checkbox">
                        </td>
                        <td class="text-center">
                            {{ $blog->id }}
                        </td>
                        <td class="text-center">
                            {{ $blog->title }}
                        </td>
                        <td class="text-center">
                            {{ $blog->user->name }}
                        </td>
                        <td class="d-flex justify-content-center">
                            <a href="blog/update/{{ $blog->id }}" class="btn btn-primary" value=""
                                name="btn_update" id="btn_update" style="margin-right: 7px;"><i
                                    class="fa-solid fa-pen-to-square"></i></a>

                            <form action="blog/destroy/{{ $blog->id }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" type="submit"><i
                                    class="fa-solid fa-xmark"></i></button>
                            </form>
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
