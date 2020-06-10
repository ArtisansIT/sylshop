<div>
    <div class="card-body">

                    <form wire:submit.prevent="update">
                        

                       <div class="form-group">
                            <label><code>*</code><strong>Pickup Address</strong>
                                @error('address')<code>{{ $message }}</code> @enderror</label>

                            <input type="text" wire:model.lazy="address" class="form-control form-control-sm">
                        </div>

                        <div class="form-group">
                            <label><strong>Category Image</strong> @error('cost')<code>{{ $message }}</code>
                                @enderror</label>
                            <input type="number" wire:model.lazy="cost" class="form-control">
                        </div>

                        <button class="btn btn-primary">submit</button>

                    </form>
                </div>
</div>
