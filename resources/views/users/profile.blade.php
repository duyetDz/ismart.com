@extends('templates.tpl_default')

@section('content')
    <section style="background-color: #eee;">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">User</a></li>
                            <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp"
                                alt="avatar" class="rounded-circle img-fluid"
                                style="width: 150px;justify-content: center;margin: 0px auto;">
                            <h5 class="my-3">{{ $user->name }}</h5>
                            <p class="text-muted mb-1">Đẹp trai dễ mến</p>
                            <p class="text-muted mb-4">Chúa tể săn sale</p>

                        </div>
                    </div>

                </div>

                <div class="col-lg-8">
                    <form action="{{ route('users.profile.update') }}" method="post">
                        @csrf
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Họ và tên</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input name="name" value="{{ $user->name }}" class="form-control "
                                            type="text">
                                        @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Email</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input name="email" value="{{ $user->email }}" class="form-control "
                                            type="text">
                                        @error('email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Số điện thoại</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input name="phone_number" value="{{ $user->phone_number }}" class="form-control "
                                            type="text">
                                        @error('phone_number')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Address</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input name="address" value="{{ $user->address }}" class="form-control "
                                            type="text">
                                        @error('address')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <button name="btn-add" class="btn btn-primary" value="true" type="submit">Update thông tin</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
