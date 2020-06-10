<div>

   
<div class="card-body">

    <form wire:submit.prevent="updateShop">

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
                @foreach ($categories as $category)
                <option value="{{ $category->id }}"> {{ $category->name }}</option>

                @endforeach

            </select>
        </div>
        <div class="form-group">
            <label><code>*</code><strong>Address</strong> @error('address')<code>{{ $message }}</code>
                @enderror</label>

            <textarea wire:model="address" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label><code>*</code><strong>Link </strong> @error('link')<code>{{ $message }}</code>
                @enderror</label>

            <input type="text" wire:model="link" name="name" class="form-control form-control-sm">
        </div>

        <div class="form-group">
            <label><code>*</code><strong>Shipping Cost</strong>
                @error('shipping')<code>{{ $message }}</code> @enderror</label>

            <input type="number" wire:model="shipping" name="name" class="form-control form-control-sm">
        </div>

        <div class="form-group ">
            <label><code>*</code><strong>About</strong> @error('about')<code>{{ $message }}</code>
                @enderror</label>


            <textarea wire:model="about" class="form-control"></textarea>

        </div>

       


        <button class="btn btn-primary">Primary</button>


    </form>
</div>
</div>
