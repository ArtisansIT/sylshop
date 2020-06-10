<div>
    <div class="card-body">

        <form wire:submit.prevent="update">


           <div class="form-group">
                            <label><code>*</code><strong>payment name</strong>
                                @error('name')<code>{{ $message }}</code> @enderror</label>

                            <input type="text" wire:model.lazy="name" class="form-control form-control-sm">
                        </div>

                        <div class="form-group">
                            <label><strong>Mobile number</strong> @error('number')<code>{{ $message }}</code>
                                @enderror</label>
                            <input type="text" wire:model.lazy="number" class="form-control">
                        </div>

                        <div class="form-group ">
                            <label><code>*</code><strong>short_description</strong>
                                @error('short_description')<code>{{ $message }}</code>
                                @enderror</label>

                            <textarea wire:model.lazy="short_description" class="form-control"></textarea>
                        </div>
                        <div class="form-group ">
                            <label><code>*</code><strong>Long_description</strong>
                                @error('long_description')<code>{{ $message }}</code>
                                @enderror</label>

                            <textarea wire:model.lazy="long_description" class="form-control"></textarea>
                        </div>

            <button class="btn btn-primary">submit</button>

        </form>
    </div>
</div>
