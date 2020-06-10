<div>
     <div wire:loading wire:target="stock_create_for_the_proddct" class="loader"></div>
    <div class="row">
        <div class="col-md-10 offset-md-1 col-sm-12 col-xs-12">
           
                <div class="card-body">
                      <div class="form-group">
                            <label><code>*</code><strong>Stock</strong>
                                @error('stock')<code>{{ $message }}</code> @enderror</label>

                            <input type="number" wire:model="stock" class="form-control form-control-sm">
                        </div>

                        <button wire:click="stock_create_for_the_proddct" class="btn btn-primary">submit</button>

                </div>

        </div>
    </div>
</div>

