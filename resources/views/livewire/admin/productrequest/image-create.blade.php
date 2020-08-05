<div>

    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <form wire:submit.prevent="imageSubmit">

                <br>
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
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            @if ($photo)
        Photo Preview:
        <img width="200" height="100" src="{{ $photo->temporaryUrl() }}">
            @endif
        </div>
    </div>

</div>
