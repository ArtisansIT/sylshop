<div>
    <div class="row">
        <div class="col-12">
            <div class="card-header">
                <h4></h4>
                <div class="card-header-action">

                    <button wire:click="$emit('backToEditCoupane')"
                        class="btn btn-danger btn-icon icon-left">
                        <i class="fas fa-times"></i> Back
                    </button>
                </div>
            </div>

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
                        <label><code>*</code><strong>Coupane name</strong>
                            @error('name')<code>{{ $message }}</code>
                            @enderror</label>

                        <input type="text" wire:model.lazy="name" class="form-control form-control-sm">
                    </div>

                    <div class="form-group">
                        <label><code>*</code><strong>Coupane Code </strong>
                            @error('code')<code>{{ $message }}</code>
                            @enderror</label>

                        <input type="text" wire:model.lazy="code" name="name" class="form-control form-control-sm">
                    </div>

                    <div class="form-group">
                        <label><code>*</code><strong>Total </strong>
                            @error('total')<code>{{ $message }}</code> @enderror</label>

                        <input type="number" wire:model.lazy="total" name="name" class="form-control form-control-sm">
                    </div>

                    <div class="form-group">
                        <label><code>*</code><strong>Discount </strong>
                            @error('discount')<code>{{ $message }}</code> @enderror</label>

                        <input type="number" wire:model.lazy="discount" name="name"
                            class="form-control form-control-sm">
                    </div>
                    <button class="btn btn-primary">submit</button>

                </form>
            </div>
        </div>
    </div>
</div>
