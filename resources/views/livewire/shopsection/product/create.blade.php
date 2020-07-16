<div>
    {{-- <div wire:loading wire:target="submitForm" class="loader"></div> --}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-danger mt-3">Product Section</h4>
                    <div class="card-header-action">
                        @if ($goto_create_page == false)

                        <a href="#" wire:click="go_create_page" class="btn mr-2 btn-primary">Create</a>
                        @endif
                        @if ($all_product_page == false)

                        <a href="#" wire:click="all_product_page" class="btn mr-2 btn-primary">
                            View All
                        </a>
                        @endif

                        @if ($pending_all_product_page == false)

                        <a href="#" wire:click="pending_all_product_page" class="btn mr-2 btn-warning">
                            View All inactive
                        </a>
                        @endif

                    </div>
                </div>
                @if ($goto_create_page == true)
                <div class="card-body">

                    <h4>Create new Product</h4>
                    <br>
                    <hr>

                    <form wire:submit.prevent="submitForm">
                        <div>
                            @if (session()->has('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label><code>*</code><strong> name</strong> @error('name')<code>{{ $message }}</code>
                                @enderror</label>

                            <input type="text" wire:model="name" class="form-control form-control-sm">
                        </div>


                        <div class="form-group">

                            <label><code>*</code><strong>Sub-Category Name</strong>
                                @error('subcategory')<code>{{ $message }}</code> @enderror</label>
                            <select wire:model="subcategory" class="form-control">
                                <option value=""> select</option>
                                @foreach($allsubcategorys as $subcategory)
                                <option value="{{ $subcategory->id }}"> {{ $subcategory->name }}</option>

                                @endforeach

                            </select>
                        </div>
                        <br>
                        @if ($photo)
                        Photo Preview:
                        <img width="200" height="100" src="{{ $photo->temporaryUrl() }}">
                        @endif
                        <br>
                        <div class="form-group">
                            <label><code>*</code><strong>Image</strong> @error('photo')<code>{{ $message }}</code>
                                @enderror</label>
                            <div class="input-group">

                                <input type="file" wire:model="photo" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label><code>*</code><strong>Main Price</strong>
                                @error('main_price')<code>{{ $message }}</code> @enderror</label>

                            <input type="number" wire:model="main_price" name="name"
                                class="form-control form-control-sm">
                        </div>

                        <div class="form-group">
                            <label><code>*</code><strong>Offer Price</strong>
                                @error('offer_price')<code>{{ $message }}</code> @enderror</label>

                            <input type="number" wire:model="offer_price" name="name"
                                class="form-control form-control-sm">
                        </div>

                        <div class="form-group">
                            <label><code>*</code><strong>Stock</strong>
                                @error('stock')<code>{{ $message }}</code> @enderror</label>

                            <input type="number" wire:model="stock" class="form-control form-control-sm">
                        </div>

                        <div class="form-group">
                            <label><code>*</code><strong>variation stock</strong>
                                @error('variation_stock')<code>{{ $message }}</code> @enderror</label>

                            <input type="number" wire:model="variation_stock" class="form-control form-control-sm">
                        </div>

                        <div class="form-group ">
                            <label><code>*</code><strong>short_description</strong>
                                @error('short_description')<code>{{ $message }}</code>
                                @enderror</label>

                            <textarea wire:model="short_description" class="form-control"></textarea>


                        </div>
        
                        <button class="btn btn-primary">submit</button>

                    </form>
                </div>

                @elseif($go_update_variation_stock_page == true)
                @include('livewire.admin.product.variation-stock')
                @elseif($edit_product_page == true)
                @livewire('shopsection.product.edit-product' ,[
                    'product' => $edit_id_fro_product_in_edit_page
                ])
                @elseif($one_product_all_image == true)
                @livewire('shopsection.product.all-images',[
                     'product' => $edit_id_fro_product_in_edit_page
                ])
                @elseif($go_update_stock_page == true)
                @include('livewire.admin.product.add-remove-stock')
                @elseif($product_variation_edit == true)
                @include('livewire.admin.product.variation.edit')
                @elseif($product_variation_index == true)
                @include('livewire.admin.product.variation.index')

                @elseif($product_variation_create == true)
                @include('livewire.admin.product.variation.create')

                @elseif($all_product_page == true)
                @livewire('shopsection.product.all-product')
                @elseif($pending_all_product_page == true)
                @livewire('shopsection.product.inactiveproduct')


                @endif
            </div>
        </div>
    </div>
</div>
