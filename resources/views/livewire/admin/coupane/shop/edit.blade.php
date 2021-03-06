<div>
    <div class="card-body">
         <div class="card-header">
        <div class="card-header-form">

            <button wire:click="$emit('back_form_category')" class="btn btn-danger btn-icon icon-left">
                <i class="fas fa-times"></i> Back to list
            </button>
        </div>
    </div>
    <br><br>

        <form wire:submit.prevent="submitForm">

            <div class="form-group">
                <label><code>*</code><strong>Coupane name</strong> @error('name')<code>{{ $message }}</code>
                    @enderror</label>

                <input type="text" wire:model.lazy="name" class="form-control form-control-sm">
            </div>
            <div class="form-group">

                <label><code>*</code><strong>Category Name</strong>
                    @error('category_id')<code>{{ $message }}</code> @enderror</label>
                <select wire:model.lazy="category_id"  class="form-control">
                    <option value=""> Select One</option>
                    @foreach ($categorys as $category)
                    <option value="{{ $category->id }}"> {{ $category->name }}</option>

                    @endforeach

                </select>
            </div>

            <div class="form-group">

                <label><code>*</code><strong>Shop Name </strong>
                    @error('shop_id')<code>{{ $message }}</code> @enderror</label>
                <select wire:model="shop_id"  class="form-control">
                    <option disabled> select</option>
                    @foreach($shops as $shop)
                    <option value="{{ $shop->id }}"> {{ $shop->name }}</option>

                    @endforeach

                </select>
            </div>


            <div class="form-group">
                <label><code>*</code><strong>Coupane Code </strong> @error('code')<code>{{ $message }}</code>
                    @enderror</label>

                <input type="text" wire:model.lazy="code" class="form-control form-control-sm">
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
