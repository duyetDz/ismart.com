@extends('templates.tpl_admin_default')

@section('content')
    @include('includes.header-main-admin', ['name' => 'Bài viết', 'key' => 'Update bài viết'])

    <div class="container">
        <form  method="post" action="" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div id="errorMessage" class="alert alert-warning d-none"></div>
                <div class="mb-3">
                    <label for="">Tiêu đề bài viết</label>
                    <input type="text" name="title" value="{{$blog->title}}" class="form-control" placeholder="Nhập vào tiêu đề bài viết" />
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="">Ảnh tiêu đề</label>
                    <input value="{{$blog->feature_img}}" type="file" name='feature_img' class="form-control" onchange="preview()">
                    <img id="frame" src="{{asset('')}}{{$blog->feature_img}}" style="max-width: 200px;margin-top: 15px;">
                    @error('feature_img')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description">Nội dung bài viết:</label>
                    <textarea  class="form-control" name="content" placeholder="Leave a comment here" id="description">{{$blog->content}}</textarea>
                    @error('content')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3"><button name="btn-add" class="btn btn-primary" value="true" type="submit">Update bài viết</button></div>
            </div>
        </form>

    </div>
@endsection

@section('js')
    <script>
        function preview() {
            frame.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>


    <script src="https://cdn.tiny.cloud/1/n5ro9nc0yegyw3vsjqki1pz74bm9846dzsbnegadxkx4c4ps/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        
        var editor_config = {
            path_absolute: "/",
            selector: 'textarea#description',
            relative_urls: false,
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table directionality",
                "emoticons template paste textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            file_picker_callback: function(callback, value, meta) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName(
                    'body')[0].clientWidth;
                var y = window.innerHeight || document.documentElement.clientHeight || document
                    .getElementsByTagName('body')[0].clientHeight;

                var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
                if (meta.filetype == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.openUrl({
                    url: cmsURL,
                    title: 'Filemanager',
                    width: x * 0.8,
                    height: y * 0.8,
                    resizable: "yes",
                    close_previous: "no",
                    onMessage: (api, message) => {
                        callback(message.content);
                    }
                });
            }
        };

        tinymce.init(editor_config);
    </script>
@endsection
