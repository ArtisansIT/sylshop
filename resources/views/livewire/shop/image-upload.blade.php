<div>
     
    <div class="row">
        <div class="col-md-10 offset-md-1 col-sm-12 col-xs-12">
           
                <div class="card-body">
                    
                     <form action="{{ route('admin.shop.update',$shopid) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label>Image</label>
                            <div class="input-group">
                               
                                <input type="file" wire:model="image" class="form-control"  name="image">
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Banner</label>
                            <div class="input-group">
                               
                                <input type="file" wire:model="banner" class="form-control"  name="banner">
                            </div>
                        </div>

                        <button wire:click="validateImage" class="btn mt-2 btn-primary">submit</button>
                    </form>  

                </div>

        </div>
    </div>
</div>

