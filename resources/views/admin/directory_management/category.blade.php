@extends('templates.tpl_admin_default')

@section('content')
    @include('includes.header-main-admin', ['name' => 'Quản trị danh mục', 'key' => 'Loại danh mục'])

    <div class="modal fade" id="userAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="saveCategory" method="POST">
                    @csrf
                    <div class="modal-body">

                        <ul id="save_msgList"></ul>

                        <div class="mb-3">
                            <label for="">Tên danh mục</label>
                            <input type="text" name="name" id="name_add" class="form-control" />
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="col-sm-3 col-form-lable" for="parent_id_add">Danh mục cha</label>
                            <div class="col-sm-6">
                                <select class="form-select" aria-label="Default select example" id="parent_id_add" name="parent_id" >
                                    <option value="0" selected>...</option>
                                    @foreach ($list_category as $category)
                                        <option value="{{ $category->id }}">
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="btn_add">Create category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="categoryEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="updateCategory" method="POST">
                    @csrf
                    <div class="modal-body">

                        <ul id="save_msgList_update"></ul>

                        <div id="errorMessage" class="alert alert-warning d-none"></div>
                        <input type="hidden" name="id" id="id" class="form-control" />

                        <div class="mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" id="view_name" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label class="col-sm-3 col-form-lable" for="view_parent_id">Ngôn ngữ</label>
                            <div class="col-sm-6">
                                <select class="custom-select" id="view_parent_id" name="parent_id" required>

                                    @foreach ($list_category as $category)
                                        <option value="{{ $category->id }}">
                                            {{ $category->name }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Categoty</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- End modal Update user -->


    <div class="container">
        <div class="d-flex float-end" style="margin-bottom: 10px;">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#userAddModal"
                style="
                height: 32px;
                margin-right: 5px;
                ">
                <i class="fa-sharp fa-solid fa-plus"></i> Add
            </button>

            <form action="" method="GET" >
                <div class="d-flex">
                    <input type="text" value="" placeholder="Search" name="ValuetoSearch" class="form-control">
                    <!-- End Modal add user  -->
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
                <select name="select" class="form-select d-flex mt-2" aria-label="Default select example">
                    <option value="title" selected>Tiêu đề</option>
                    <option value="updated_at" >Thời gian cập nhập</option>
                </select>
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
                    <th scope="col" class="col-2 text-center">STT</th>
                    <th scope="col" class="col text-center">Tên danh mục</th>
                    <th scope="col" class="col text-center">Tác vụ</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach ($list_category as $key => $category)
                    <tr id="">
                        <td class="text-center">
                            <input class="form-check-input me-1" id="chkboxname" value="" type="checkbox">
                        </td>
                        <td class="text-center">
                            {{ $key += 1 }}
                        </td>
                        <td class="text-center">
                            {{ $category->name }}
                        </td>
                        <td class="d-flex justify-content-center">

                            <!-- Update user -->

                            <button type="button" class="btn btn-primary" value="{{ $category->id }}" name="btn_update"
                                id="btn_update" data-bs-toggle="modal" data-bs-target="#categoryEditModal"
                                style="margin-right: 7px;"><i class="fa-solid fa-pen-to-square"></i></button>

                            <button type="button" class="btn btn-danger" value="{{ $category->id }}" name="btn_delete"
                                id="btn_delete"><i class="fa-solid fa-xmark"></i></button>
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


@section('js')
    <script>
        $(document).ready(function() {
  
            $(document).on('submit', '#saveCategory', function(e) {
                e.preventDefault();

                var formData = new FormData(this);
                formData.append("saveCategory", true);


                $.ajax({
                    type: "POST",
                    url: "/admin/category/store",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {

                        if (response.status == 400) {

                            $('#save_msgList').html("");
                            $('#save_msgList').addClass('alert alert-danger');
                            var i = 0;
                            $.each(response.errors, function(key, err_value) {
                                $('#save_msgList').append('<li>' + err_value[i] +
                                    '</li>');
                                i++;
                            });
                        } else if (response.status == 200) {
                            $('#userAddModal').modal('hide');
                            toastr.options = {
                                "closeButton": true,
                                "progetBar": true
                            }
                            toastr.success(response.massage)
                        }

                        $('#myTable').load(location.href + " #myTable");

                    }
                });

            });


            // update category admin
            var id_update;

            $(document).on('click', '#btn_update', function(e) {
                e.preventDefault();
                var id = $(this).val();
                var url = $(location).attr('href');

                $.ajax({
                    type: "GET",
                    url: "category/update/" + id,
                    success: function(response) {
                        id_update = response.category.id
                        console.log(response.category);
                        $('#view_name').val(response.category.name)
                        $('#view_main_major').val(response.category.slug)
                    }
                });
            })


            $(document).on('submit', '#updateCategory', function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                formData.append("updateCategory", true);
                $.ajax({
                    type: "POST",
                    url: "/admin/category/update/" + id_update,
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.status == 400) {

                            $('#save_msgList_update').html("");
                            $('#save_msgList_update').addClass('alert alert-danger');
                            var i = 0;
                            $.each(response.errors, function(key, err_value) {
                                $('#save_msgList_update').append('<li>' + err_value[i] +
                                    '</li>');
                                i++;
                            });
                            // console.log(response.errors)

                        } else if (response.status == 200) {
                            console.log(response)
                            $('#categoryEditModal').modal('hide');
                            toastr.options = {
                                "closeButton": true,
                                "progetBar": true
                            }
                            toastr.success(response.massage)

                        }
                        $('#myTable').load(location.href + " #myTable");

                    }
                });
            });


            /// Delete category

            $(document).on('click', '#btn_delete', function(e) {
                e.preventDefault();
                var id = $(this).val();
                $.ajax({
                    type: "GET",
                    url: "category/delete/" + id,
                    success: function(response) {
                        if (response.status == 200) {
                            toastr.options = {
                                "closeButton": true,
                                "progetBar": true
                            }
                            toastr.success(response.massage)
                            // console.log(response.massage)

                        }
                        $('#myTable').load(location.href + " #myTable");
                        console.log(response);
                    }
                });
            })
        });
    </script>
@endsection
