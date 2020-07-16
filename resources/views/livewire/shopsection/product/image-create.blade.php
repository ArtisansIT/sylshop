<div>

    <div class="row">
        <div class="col-md-10 offset-md-1 col-sm-12 col-xs-12">
            <div class="card-header">
             
                <div class="card-header-action">
                    <button wire:click="$emit('back')" class="btn btn-success">
                        Back</button>
                </div>
            </div>
            <div class="card-body">

                <form wire:submit.prevent="submitForm">
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

                    <button class="btn mt-2 btn-primary">submit</button>
                </form>

            </div>

        </div>
    </div>
</div>
