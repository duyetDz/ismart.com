@extends('templates.tpl_admin_default')

@section('content')
    @include('includes.header-main-admin', ['name' => 'Upload Ảnh', 'key' => 'Ảnh sản phẩm liên quan'])

    <div class="container">

        <form action="{{ route('admin.upload.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <h2>Sản phẩm: {{ $product->name }}</h2>
            <input type="text" value="{{ $product->id }}" name="product_id" class="d-none">
            <input id="img-selector" type="file" name="images[]" multiple>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div id="preview" style="margin-top:15px ;margin-bottom:15px"></div>
            <button class="btn btn-primary" style="margin-top: 10px;">Thêm ảnh sản phẩm</button>
        </form>
    </div>
@endsection

@section('js')
    <script>
        function previewImages() {

            var preview = document.querySelector('#preview');

            if (this.files) {
                [].forEach.call(this.files, readAndPreview);
            }

            function readAndPreview(file) {

                // File type validator based on the extension 
                if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
                    return alert(file.name + " is not an image");
                }

                var reader = new FileReader();

                reader.addEventListener("load", function() {
                    var image = new Image();
                    image.height = 100;
                    image.title = file.name;
                    image.src = this.result;
                    preview.appendChild(image);
                });

                reader.readAsDataURL(file);

            }

        }

        document.querySelector('#img-selector').addEventListener("change", previewImages);
    </script>
@endsection
