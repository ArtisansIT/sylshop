<div>
    <div class="card-body">
       

         
        <div class="card-header-form">

           
            <button wire:click="$emit('backToAllShop')" class="btn btn-danger btn-icon text-right icon-left">
                <i class="fas fa-times"></i> Back 
            </button>
        </div>
        <br><br>
  
        <form wire:submit.prevent="submitForm">

            <div>
                @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
                @endif
            </div>


            <div class="form-group">
                <label><code>*</code><strong>Coupane name</strong> @error('name')<code>{{ $message }}</code>
                    @enderror</label>

                <input type="text" wire:model.lazy="name" class="form-control form-control-sm">
            </div>
           
            <div class="form-group">
                <label><code>*</code><strong>Coupane Code </strong> @error('code')<code>{{ $message }}</code>
                    @enderror</label>

                <input type="text" wire:model.lazy="code" class="form-control form-control-sm">
            </div>

              <div class="form-group">
                <label><code>*</code><strong>Coin  </strong>
                    @error('coin')<code>{{ $message }}</code> @enderror</label>

                <input type="number" wire:model.lazy="coin" class="form-control form-control-sm">
            </div>

            <div class="form-group">
                <label><code>*</code><strong>Total </strong>
                    @error('total')<code>{{ $message }}</code> @enderror</label>

                <input type="number" wire:model.lazy="total" class="form-control form-control-sm">
            </div>

            <div class="form-group">
                <label><code>*</code><strong>Discount </strong>
                    @error('discount')<code>{{ $message }}</code> @enderror</label>

                <input type="number" wire:model.lazy="discount" class="form-control form-control-sm">
            </div>

            




            <button class="btn btn-primary">Primary</button>


        </form>

    </div>
</div>
