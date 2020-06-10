<div>
     
    <div class="row">
        <div class="col-md-10 offset-md-1 col-sm-12 col-xs-12">
           
                <div class="card-body">
                    
                     <form action="{{ route('admin.subcategory.imageUpdate',$subcategory_id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Image</label>
                            <div class="input-group">
                               
                                <input type="file" class="form-control"  name="image">
                            </div>
                        </div>
                        <br>
                      

                        <button  class="btn mt-2 btn-primary">submit</button>
                    </form>  

                </div>

        </div>
    </div>
</div>

