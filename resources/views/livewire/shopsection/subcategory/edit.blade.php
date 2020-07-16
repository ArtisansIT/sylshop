<div>
    <div class="card-body">

        <form wire:submit.prevent="update">


            <div class="form-group">
                <label><code>*</code><strong>Sub-Category name</strong> @error('name')<code>{{ $message }}</code>
                    @enderror</label>

                <input type="text" wire:model="name" class="form-control form-control-sm">
            </div>
            <button class="btn btn-primary">submit</button>
        </form>
    </div>


</div>
