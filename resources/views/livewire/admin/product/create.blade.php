<div>
    {{-- <div wire:loading wire:target="submitForm" class="loader"></div> --}}
    <div class="row">
        <div class="col-md-10 offset-md-1 col-sm-12 col-xs-12">
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


                        @if ($un_complete_product_page == false)

                        <a href="#" wire:click="un_complete_product_page" class="btn mr-2 btn-primary">
                            Un-Complete
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

                            <label><code>*</code><strong>Category Name</strong>
                                @error('category')<code>{{ $message }}</code> @enderror</label>
                            <select wire:model="category" class="form-control">
                                <option value=""> select</option>
                                @foreach ($categorys as $category)
                                <option value="{{ $category->id }}"> {{ $category->name }}</option>

                                @endforeach

                            </select>
                        </div>


                        <div class="form-group">

                            <label><code>*</code><strong>Shop Name</strong>
                                @error('shop')<code>{{ $message }}</code> @enderror</label>
                            <select wire:model="shop" wire:change="shopChange" class="form-control">
                                <option value=""> select</option>
                                @foreach($this->shops as $shop)
                                <option value="{{ $shop->id }}"> {{ $shop->name }}</option>

                                @endforeach

                            </select>
                        </div>
                        <div class="form-group">

                            <label><code>*</code><strong>Sub-Category Name</strong>
                                @error('subcategory')<code>{{ $message }}</code> @enderror</label>
                            <select wire:model="subcategory" class="form-control">
                                <option value=""> select</option>
                                @foreach($this->subcategorys as $subcategory)
                                <option value="{{ $subcategory->id }}"> {{ $subcategory->name }}</option>

                                @endforeach

                            </select>
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
                            <label><code>*</code><strong>link</strong>
                                @error('link')<code>{{ $message }}</code> @enderror</label>

                            <input type="text" wire:model="link" name="name" class="form-control form-control-sm">
                        </div>

                        <div class="form-group">
                            <label><code>*</code><strong>search_tag</strong>
                                @error('serch_tag')<code>{{ $message }}</code> @enderror</label>

                            <input type="text" wire:model="serch_tag" name="name" class="form-control form-control-sm">
                        </div>

                        <div class="form-group ">
                            <label><code>*</code><strong>short_description</strong>
                                @error('short_description')<code>{{ $message }}</code>
                                @enderror</label>

                            <textarea wire:model="short_description" class="form-control"></textarea>
                            {{-- <textarea wire:model="short_description" class="form-control"></textarea> --}}
                            {{-- <div class="col-sm-12 col-md-12 col-lg-12">
                                <textarea  wire:model="short_description" class="summernote"></textarea>
                            </div> --}}

                        </div>
                        <div class="form-group ">
                            <label><code>*</code><strong>long_description</strong>
                                @error('long_description')<code>{{ $message }}</code>
                                @enderror</label>


                            <textarea wire:model="long_description" class="form-control"></textarea>


                        </div>


                        <div class="form-group ">
                            <label><code>*</code><strong>ship_return</strong>
                                @error('ship_return')<code>{{ $message }}</code>
                                @enderror</label>
                            {{-- <div class="col-sm-12 col-md-12 col-lg-12">
                                <textarea  wire:model="ship_return" class="summernote"></textarea>
                            </div> --}}
                            <textarea wire:model="ship_return" class="form-control"></textarea>
                        </div>
                        {{-- <div class="form-group ">
                            <label><code>*</code><strong>ship_return</strong>
                                @error('ship_return')<code>{{ $message }}</code>
                        @enderror</label>



                </div> --}}




                <button class="btn btn-primary">submit</button>

                </form>
            </div>
            @elseif($stock_page == true)
            @include('livewire.admin.product.stock')
            @elseif($go_update_variation_stock_page == true)
            @include('livewire.admin.product.variation-stock')
            @elseif($img_upload_page == true)
            @include('livewire.admin.product.image-create')
            @elseif($edit_product_page == true)
            @include('livewire.admin.product.edit-product')
            @elseif($one_product_all_image == true)
            @include('livewire.admin.product.all-images')
            @elseif($go_update_stock_page == true)
            @include('livewire.admin.product.add-remove-stock')
            @elseif($product_variation_edit == true)
            @include('livewire.admin.product.variation.edit')
            @elseif($product_variation_index == true)
            @include('livewire.admin.product.variation.index')
            {{-- @elseif($pending_stock_page == true)
                @include('livewire.admin.product.pending-stock') --}}

            @elseif($un_complete_product_page == true)
            @livewire('admin.product.pending')
            @elseif($product_variation_create == true)
            @include('livewire.admin.product.variation.create')

            @elseif($all_product_page == true)
            @livewire('admin.product.all-product')
            @elseif($pending_all_product_page == true)
            @livewire('admin.product.inactiveproduct')
            {{-- @elseif($goto_inactive_page == true)
                @livewire('admin.subcategory.inactive')
                @elseif($goto_edit_page == true)
                @include('livewire.admin.subcategory.edit') --}}

            @endif
        </div>
    </div>
</div>
</div>
