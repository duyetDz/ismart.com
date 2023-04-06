@extends('templates.tpl_admin_default')

@section('content')
    @include('includes.header-main-admin', [
        'name' => 'Quản trị Thành viên',
        'key' => 'Danh sách thành viên',
    ])
    <style>
        /* The switch - the box around the slider */
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        /* Hide default HTML checkbox */
        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        /* The slider */
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider.round {
            border-radius: 34px;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked+.slider {
            background-color: #2196F3;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }




        input:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }



        .slider.round:before {
            border-radius: 50%;
        }
    </style>

    <div class="container">
        <div class="d-flex float-end" style="margin-bottom: 10px;">
            <a href="{{ route('admin.member.create') }}" class="btn btn-primary"
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
                    <th scope="col" class="col text-center">Họ Và tên</th>
                    <th scope="col" class="col text-center">Email</th>
                    <th scope="col" class="col text-center">Địa chỉ</th>
                    <th scope="col" class="col text-center">Quyền</th>
                    <th scope="col" class="col text-center">Tác vụ</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($users as $user)
                    <tr id="">
                        <td class="text-center">
                            <input class="form-check-input me-1" id="chkboxname" value="" type="checkbox">
                        </td>
                        <td class="text-center">
                            {{ $user->id }}
                        </td>
                        <td class="text-center">
                            {{ $user->name }}
                        </td>
                        <td class="text-center">
                            {{ $user->email }}
                        </td>
                        <td class="text-center">
                            {{ $user->adress }}
                        </td>

                        <td class="text-center">
                            @if ($user->is_admin == 0)
                                Người dùng
                            @else
                                Admin
                            @endif
                </td>
                <td class="d-flex justify-content-center">
                    <!-- Update user -->
                    <a href="member/update/{{$user->id}}" class="btn btn-primary" value="" name="btn_update" id="btn_update"
                        style="margin-right: 7px;"><i class="fa-solid fa-pen-to-square"></i></a>

                    <a href="member/destroy/{{$user->id}}" class="btn btn-danger" name="btn_delete" id="btn_delete"><i
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
@endsection
