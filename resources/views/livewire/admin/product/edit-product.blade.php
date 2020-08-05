<div>
    <div class="card-body">

                    <form wire:submit.prevent="updateProduct">
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
                                @foreach($shops as $shop)
                                <option value="{{ $shop->id }}"> {{ $shop->name }}</option>

                                @endforeach

                            </select>
                        </div>
                        <div class="form-group">

                            <label><code>*</code><strong>Sub-Category Name</strong>
                                @error('subcategory')<code>{{ $message }}</code> @enderror</label>
                            <select wire:model="subcategory" class="form-control">
                                <option value=""> select</option>
                                @foreach($subcategorys as $subcategory)
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


                            <textarea wire:model="ship_return" class="form-control"></textarea>

                        </div>




                        <button class="btn btn-primary">submit</button>

                    </form>
                </div>
</div>
