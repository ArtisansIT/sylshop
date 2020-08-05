<div>
    <div class="card-header">
        <div class="card-header-form">

            <button wire:click="$emit('backToAllShop')" class="btn btn-danger btn-icon icon-left">
                <i class="fas fa-times"></i> Back to shop list
            </button>
        </div>
    </div>

    <div class="card-body">

        {{-- <form wire:submit.prevent="updateShop"> --}}
        <form wire:submit.prevent="updateShop">
            <div class="row">
                <div class="form-group col-6">
                    <label><code>*</code><strong>Shop name</strong>
                        @error('name')<code>{{ $message }}</code>
                        @enderror</label>

                    <input wire:model.lazy="name" type="text" class="form-control">
                </div>
                <div class="form-group col-6">
                    <label><code>*</code><strong>Shop Licence</strong>
                        @error('licence')<code>{{ $message }}</code>
                        @enderror</label>
                    <input wire:model.lazy="licence" type="text" class="form-control">
                </div>
            </div>
            <div class="form-group row mb-6">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                    <code>*</code><strong>Shop Category</strong>
                    @error('category')<code>{{ $message }}</code> @enderror
                </label>
                <div class="col-sm-12 col-md-6">


                    <select wire:model.lazy="category" class="form-control selectric">
                        <option selected value="">Select</option>
                        @foreach ($allcategorys as $category)
                        <option value="{{ $category->id }}"> {{ $category->name }}</option>

                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-6">
                    <label for="frist_name">
                        <code>*</code><strong>Shop Address</strong>
                        @error('address')<code>{{ $message }}</code>
                        @enderror
                    </label>
                    <input wire:model.lazy="address" type="text" class="form-control" autofocus>
                </div>
                <div class="form-group col-6">


                    <label>
                        <code>*</code><strong>Shop Facebook Link </strong>
                        @error('link')<code>{{ $message }}</code>
                        @enderror
                    </label>
                    <input wire:model.lazy="link" type="text" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-6">
                    <label for="frist_name">
                        <code>*</code><strong>Processing Rate</strong>
                        @error('processing_rate')<code>{{ $message }}</code>
                        @enderror
                    </label>
                    <input wire:model.lazy="processing_rate" type="number" class="form-control" autofocus>
                </div>
                <div class="form-group col-6">


                    <label>
                        <code>*</code><strong>Delevered Rate </strong>
                        @error('delevered_rate')<code>{{ $message }}</code>
                        @enderror
                    </label>
                    <input wire:model.lazy="delevered_rate" type="number" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-6">
                    <label for="frist_name">
                        <code>*</code><strong>Processing Commision Rate</strong>
                        @error('processing_commision_rate')<code>{{ $message }}</code>
                        @enderror
                    </label>
                    <input wire:model.lazy="processing_commision_rate" type="number" class="form-control" autofocus>
                </div>
                <div class="form-group col-6">


                    <label>
                        <code>*</code><strong>Delevered Commision Rate </strong>
                        @error('delevered_commision_rate')<code>{{ $message }}</code>
                        @enderror
                    </label>
                    <input wire:model.lazy="delevered_commision_rate" type="number" class="form-control">
                </div>
            </div>
            <hr>
            <div class="form-group col-12">
                <label>
                    <code>*</code><strong>Shipping Cost </strong> @error('shipping')<code>{{ $message }}</code>
                    @enderror
                </label>
                <input wire:model.lazy="shipping" type="text" class="form-control">
            </div>
            <div class="form-group col-12">
                <label>
                    <code>*</code><strong>Your Name </strong> @error('boss_name')<code>{{ $message }}</code>
                    @enderror
                </label>
                <input wire:model.lazy="boss_name" type="text" class="form-control">
            </div>
            <div class="form-group col-12">
                <label>
                    <code>*</code><strong>Your Number </strong>
                    @error('phone')<code>{{ $message }}</code>
                    @enderror
                </label>
                <input wire:model.lazy="phone" type="text" class="form-control">
            </div>
            <div class="form-group col-12">
                <label>
                    <code>*</code><strong>Your Email </strong>
                    @error('email')<code>{{ $message }}</code>
                    @enderror
                </label>
                <input wire:model.lazy="email" type="email" class="form-control">
            </div>
            <div class="form-group col-12">
                <label>
                    <code>*</code><strong>Your Address </strong>
                    @error('boss_address')<code>{{ $message }}</code>
                    @enderror
                </label>
                <input wire:model.lazy="boss_address" type="text" class="form-control">
            </div>
            <div class="form-group col-12">
                <label>
                    <code>*</code><strong>Your NID Number </strong>
                    @error('boss_nid')<code>{{ $message }}</code>
                    @enderror
                </label>
                <input wire:model.lazy="boss_nid" type="text" class="form-control">
            </div>
            <div class="form-group col-12">
                <label>
                    <code>*</code><strong>Your Bank Account Name </strong>
                    @error('bank_account_name')<code>{{ $message }}</code>
                    @enderror
                </label>
                <input wire:model.lazy="bank_account_name" type="text" class="form-control">
            </div>
            <div class="form-group col-12">
                <label>
                    <code>*</code><strong>Your Bank Account Number </strong>
                    @error('bank_account_number')<code>{{ $message }}</code>
                    @enderror
                </label>
                <input wire:model.lazy="bank_account_number" type="text" class="form-control">
            </div>
            <div class="form-group col-12">
                <label>
                    <code>*</code><strong> Bank Name </strong>
                    @error('bank_name')<code>{{ $message }}</code>
                    @enderror
                </label>
                <input wire:model.lazy="bank_name" type="text" class="form-control">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block">
                    Register
                </button>
            </div>
        </form>
    </div>
</div>
