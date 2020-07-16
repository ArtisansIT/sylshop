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
            @if ($photo)
            Photo Preview:
            <img width="200" height="100" src="{{ $photo->temporaryUrl() }}">
            @endif

            <div class="form-group">
                <label><code>*</code><strong>Image</strong> @error('photo')<code>{{ $message }}</code>
                    @enderror</label>
                <div class="input-group">

                    <input type="file" wire:model="photo" class="form-control">
                </div>
            </div>
            <button class="btn btn-primary">submit</button>

        </form>
    </div>
</div>
