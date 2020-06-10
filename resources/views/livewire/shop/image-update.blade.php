<div>
    <div class="row">
        <div class="col-md-10 offset-md-1 col-sm-12 col-xs-12">
          
                <div class="card-body">
                    <form action="{{ route('admin.shop.update_image',$shopid) }}" enctype="multipart/form-data" method="post" >
                         @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Image</label>
                            <div class="input-group">
                               
                                <input type="file" class="form-control"  name="image">
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Banner</label>
                            <div class="input-group">
                               
                                <input type="file" class="form-control"  name="banner">
                            </div>
                        </div>

                        <button class="btn mt-2 btn-primary">Primary</button>
                    </form>
                </div>
            
        </div>
    </div>
</div>
