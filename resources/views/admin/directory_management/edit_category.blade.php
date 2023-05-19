@extends('templates.tpl_admin_default')

@section('content')
    @include('includes.header-main-admin', ['name' => 'Danh mục', 'key' => 'Update Danh mục'])

    <div class="container">
        <form method="post" action="{{ asset('') }}admin/category/update/{{ $category->id }}">
            @csrf
            <div class="modal-body">

                <div class="mb-3">
                    <label for="">Name</label>
                    <input type="text" name="name" value="{{$category->name}}" id="view_name" class="form-control" />
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="col-sm-3 col-form-lable" for="view_parent_id">Danh mục cha</label>
                    <div class="col-sm-6">
                        <select class="custom-select form-control" id="view_parent_id" name="parent_id" required>
                            <div id="menu_select">
                                <option value="0" {{ $category->parent_id == 0 ? 'selected' : '' }}>
                                    Danh mục gốc
                                </option>
                                @foreach ($list_category as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $item->id == $category->parent_id ? 'selected' : '' }}>
                                        {{ $item->name }}
                                    </option>
                                @endforeach

                            </div>
                        </select>
                        @error('parent_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3"><button name="btn-add" class="btn btn-primary" value="true" type="submit">Update danh mục</button></div>
            </div>
        </form>

    </div>
@endsection
