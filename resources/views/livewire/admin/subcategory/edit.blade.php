<div>
    <div class="card-body">

                    <form wire:submit.prevent="update">
                        <div>
                            @if (session()->has('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label><code>*</code><strong>Shop name</strong> @error('name')<code>{{ $message }}</code>
                                @enderror</label>

                            <input type="text" wire:model="name" class="form-control form-control-sm">
                        </div>

                        <div class="form-group">

                            <label><code>*</code><strong>Category Name</strong>
                                @error('category')<code>{{ $message }}</code> @enderror</label>
                            <select wire:model="category" class="form-control">
                                <option value=""> select</option>
                                @foreach ($categoryies as $category)
                                <option value="{{ $category->id }}"> {{ $category->name }}</option>

                                @endforeach

                            </select>
                        </div>


                        <div class="form-group">

                            <label><code>*</code><strong>Shop Name</strong>
                                @error('shop')<code>{{ $message }}</code> @enderror</label>
                            <select wire:model="shop" class="form-control">
                                <option value=""> select</option>
                                @foreach($this->shops as $shop)
                                <option value="{{ $shop->id }}"> {{ $shop->name }}</option>

                                @endforeach

                            </select>
                        </div>


                        <button  class="btn btn-primary">submit</button>

                    </form>
                </div>
   

</div>
