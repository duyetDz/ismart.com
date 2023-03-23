@extends('templates.tpl_admin_default')

@section('content')
    @include('includes.header-main-admin', ['name' => 'Quản trị danh mục', 'key' => 'Bài viết'])

    <!-- Modal add user -->


    <div class="modal fade" id="userAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="saveStudent">
                    <div class="modal-body">

                        <div id="errorMessage" class="alert alert-warning d-none"></div>

                        <div class="mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label for="">Main_major</label>
                            <input type="text" name="main_major" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label class="col-sm-3 col-form-lable" for="validationDefault04">Ngôn
                                ngữ</label>
                            <div class="col-sm-6">
                                <select class="custom-select" id="validationDefault04" name="class_id" required>
                                    <option value="">
                                        1
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- End modal User -->


    <!-- Edit Student Modal -->
    <div class="modal fade" id="studentEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="updateUser">
                    <div class="modal-body">

                        <div id="errorMessage" class="alert alert-warning d-none"></div>
                        <input type="hidden" name="id" id="id" class="form-control" />

                        <div class="mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" id="view_name" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label for="">Main_major</label>
                            <input type="text" name="main_major" id="view_main_major" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label class="col-sm-3 col-form-lable" for="view_class_id">Ngôn ngữ</label>
                            <div class="col-sm-6">
                                <select class="custom-select" id="view_class_id" name="class_id" required>

                                    <option value="">
                                        1
                                    </option>

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- End modal Update user -->


    <div class="container">
        <div class="d-flex float-end" style="margin-bottom: 10px;">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#userAddModal" style="
                height: 32px;
                margin-right: 5px;
                ">
                <i class="fa-sharp fa-solid fa-plus"></i> Add
            </button>

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
                    <th scope="col" class="col text-center">Tên danh mục</th>
                    <th scope="col" class="col text-center">Tác vụ</th>
                </tr>
            </thead>
            <tbody>
                    <tr id="">
                        <td class="text-center">
                            <input class="form-check-input me-1" id="chkboxname" value=""
                                type="checkbox">
                        </td>
                        <td class="text-center">
                            1
                        </td>
                        <td class="text-center">
                            Điện thoại
                        </td>
                        <td class="d-flex justify-content-center">

                            <!-- Update user -->

                            <button type="button" class="btn btn-primary" value="" name="btn_update"
                                id="btn_update" data-bs-toggle="modal" data-bs-target="#studentEditModal"
                                style="margin-right: 7px;"><i class="fa-solid fa-pen-to-square"></i></button>

                            <button type="button" class="btn btn-danger" name="btn_delete" id="btn_delete"><i
                                    class="fa-solid fa-xmark"></i></button>
                        </td>
                    </tr>
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
