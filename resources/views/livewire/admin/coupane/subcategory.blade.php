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

                <label><code>*</code><strong>Category Name</strong>
                    @error('form.category_id')<code>{{ $message }}</code> @enderror</label>
                <select wire:model.lazy="form.category_id" class="form-control">
                    <option value=""> Select One</option>
                    @foreach ($categorys as $category)
                    <option value="{{ $category->id }}"> {{ $category->name }}</option>

                    @endforeach

                </select>
            </div>

            <div class="form-group">

                <label><code>*</code><strong>Shop Name</strong>
                    @error('form.shop_id')<code>{{ $message }}</code> @enderror</label>
                <select wire:model.lazy="form.shop_id"  wire:change="shopChange" class="form-control">
                    <option value=""> select</option>
                    @foreach($this->shops as $shop)
                    <option value="{{ $shop->id }}"> {{ $shop->name }}</option>

                    @endforeach

                </select>
            </div>

            <div class="form-group">

                <label><code>*</code><strong>Sub-Category Name</strong>
                    @error('form.subcategory_id')<code>{{ $message }}</code> @enderror</label>
                <select wire:model.lazy="form.subcategory_id" class="form-control">
                    <option value=""> select</option>
                    @foreach($this->subcategorys as $subcategory)
                    <option value="{{ $subcategory->id }}"> {{ $subcategory->name }}</option>

                    @endforeach

                </select>
            </div>


            <div class="form-group">
                <label><code>*</code><strong>Coupane Code </strong> @error('form.code')<code>{{ $message }}</code>
                    @enderror</label>

                <input type="text" wire:model.lazy="form.code" name="name" class="form-control form-control-sm">
            </div>

            <div class="form-group">
                <label><code>*</code><strong>Total </strong>
                    @error('form.total')<code>{{ $message }}</code> @enderror</label>

                <input type="number" wire:model.lazy="form.total" name="name" class="form-control form-control-sm">
            </div>

            <div class="form-group">
                <label><code>*</code><strong>Discount </strong>
                    @error('form.discount')<code>{{ $message }}</code> @enderror</label>

                <input type="number" wire:model.lazy="form.discount" name="name" class="form-control form-control-sm">
            </div>






            <button class="btn btn-primary">Primary</button>


        </form>

    </div>
</div>
