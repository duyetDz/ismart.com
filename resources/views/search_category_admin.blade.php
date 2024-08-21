<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <form id="saveCategory" method="POST">
        @csrf
        <div class="modal-body" >

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
                    <select class="form-select" aria-label="Default select example" id="parent_id_add"
                        name="parent_id">
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