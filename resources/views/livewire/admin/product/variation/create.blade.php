<div>
    <div class="card-body">

      <h4>Create new Variation</h4>
                        <br>
                        <hr>
        <form wire:submit.prevent="variationSubmit">

            <div class="form-group">
                <label><code>*</code><strong> name</strong> @error('name')<code>{{ $message }}</code>
                    @enderror</label>

                <input type="text" wire:model.lazy="name" class="form-control form-control-sm">
            </div>

            <div class="form-group">
                <label><code>*</code><strong>Main Price</strong>
                    @error('main_price')<code>{{ $message }}</code> @enderror</label>

                <input type="number" wire:model.lazy="main_price" name="name" class="form-control form-control-sm">
            </div>

            <div class="form-group">
                <label><code>*</code><strong>Offer Price</strong>
                    @error('offer_price')<code>{{ $message }}</code> @enderror</label>

                <input type="number" wire:model.lazy="offer_price" name="name" class="form-control form-control-sm">
            </div>

            <div class="form-group">
                <label><code>*</code><strong>Stock</strong>
                    @error('stock')<code>{{ $message }}</code> @enderror</label>

                <input type="number" wire:model.lazy="stock" class="form-control form-control-sm">
            </div>

            <button class="btn btn-primary">submit</button>
        </form>
    </div>
</div>
