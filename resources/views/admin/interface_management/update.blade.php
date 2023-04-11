@extends('templates.tpl_admin_default')

@section('content')
    @include('includes.header-main-admin', ['name' => 'Quản lý Ảnh', 'key' => 'Update hình ảnh'])

    <div class="container">

        <form action="" method="post" enctype="multipart/form-data">
            @csrf
            <h2>Sản phẩm: {{ $product_image->product->name }} </h2>
            <input type="file" name='image' value="{{ $product_image->image }}" class="form-control" onchange="preview()">
            <img id="frame" src="{{ asset('') }}{{ $product_image->image }}"
                style="max-width: 200px;margin-top: 15px; margin-bottom: 15px;">
            @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            
            <div class="mb-3"> <button class="btn btn-primary" value="true" type="submit">Update ảnh</button></div>

        </form>
    </div>
@endsection

@section('js')
    <script>
        function preview() {
            frame.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
@endsection
