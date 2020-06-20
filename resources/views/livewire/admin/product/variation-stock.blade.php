<div>
    <div wire:loading wire:target="stock_create_for_the_proddct" class="loader"></div>
    <div class="row">
        <div class="col-md-10 offset-md-1 col-sm-12 col-xs-12">
            <div class="card-header">
                <h4>
                    <span> Product Name : </span>
                    <span class=" text-danger ">{{$pro_id_for_update_variation_stock->product->name  }}</span>
                </h4>
                <div class="card-header-action">
                    <h4>
                        <span> Stock Amount : </span>
                        <span class=" text-danger ">{{$pro_id_for_update_variation_stock->variation_stock  }}</span>
                    </h4>
                </div>
                <div class="card-header-action">

                </div>
            </div>
            <div class="card-body">


                <div class="form-row col-md-12">
                    @error('variation_stock')<code>{{ $message }}</code> @enderror</label>
                    <input type="text" wire:model="variation_stock" class="form-control" placeholder="" aria-label="">
                </div>
                <div class="form-row mt-4">
                    <div class="form-group  col-sm-6 col-xs-6  col-md-6">
                        <button class="btn float-right btn-primary" wire:click="add_update_variation_stock" type="button">Add
                            Stock</button>
                    </div>
                    <div class="form-group float-left  col-sm-6 col-xs-6 col-md-6">
                        <button class="btn float-left btn-primary" wire:click="remove_update_variation_stock" type="button">Remove
                            Stock</button>

                    </div>
                </div>
            </div>




        </div>

    </div>
</div>
</div>
