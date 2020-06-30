<div>
    <div class="card-body">

        <form wire:submit.prevent="submitForm">

            <div>
                @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
                @endif
            </div>


            <div class="form-group">
                <label><code>*</code><strong>Coupane name</strong> @error('form.name')<code>{{ $message }}</code>
                    @enderror</label>

                <input type="text" wire:model.lazy="form.name" class="form-control form-control-sm">
            </div>
           
            <div class="form-group">
                <label><code>*</code><strong>Coupane Code </strong> @error('form.code')<code>{{ $message }}</code>
                    @enderror</label>

                <input type="text" wire:model.lazy="form.code" class="form-control form-control-sm">
            </div>

              <div class="form-group">
                <label><code>*</code><strong>Coin  </strong>
                    @error('form.coin')<code>{{ $message }}</code> @enderror</label>

                <input type="number" wire:model.lazy="form.coin" class="form-control form-control-sm">
            </div>

            <div class="form-group">
                <label><code>*</code><strong>Total </strong>
                    @error('form.total')<code>{{ $message }}</code> @enderror</label>

                <input type="number" wire:model.lazy="form.total" class="form-control form-control-sm">
            </div>

            <div class="form-group">
                <label><code>*</code><strong>Discount </strong>
                    @error('form.discount')<code>{{ $message }}</code> @enderror</label>

                <input type="number" wire:model.lazy="form.discount" class="form-control form-control-sm">
            </div>

            




            <button class="btn btn-primary">Primary</button>


        </form>

    </div>
</div>
