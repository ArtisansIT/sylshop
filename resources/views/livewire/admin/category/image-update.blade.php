<div>
    <div class="card-body">

        <form action="{{ route('admin.category.update', $selected_id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label>Image</label>
                <div class="input-group">

                    <input type="file" class="form-control" name="image">
                </div>
            </div>

            <button  class="btn mt-2 btn-primary">submit</button>
        </form>

    </div>
</div>
