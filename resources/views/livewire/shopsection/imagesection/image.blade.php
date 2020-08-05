<div>

    {{-- {{ dd($img) }} --}}
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-header-form">

                        <button wire:click="$emit('backToRequestProduct')" class="btn btn-danger btn-icon icon-left">
                            <i class="fas fa-times"></i> Back
                        </button>
                    </div>

                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="card-header">
                            <div class="col-lg-6 col-xl-6 col-md-6 col-sm-6 col-xs-12">


                                <a href="#">
                                    <img class="img-responsive thumbnail"
                                        src="{{ asset('images/'.$img->url) }}" alt="">
                                </a>
                            </div>
                            <div class="col-lg-6 col-xl-6 col-md-6 col-sm-6 col-xs-12">
                                @if ($photo)
                                Photo Preview:
                                <img width="200" height="100" src="{{ $photo->temporaryUrl() }}">
                                    @endif

                                   <form wire:submit.prevent="imageSubmit">
    
                                       <br>
                                       <div class="form-group">
                                           <label><code>*</code><strong>Image</strong> @error('photo')<code>{{ $message }}</code>
                                               @enderror</label>
                                           <div class="">
    
                                               <input type="file" wire:model="photo" class="form-control">
                                           </div>
                                       </div>
                                       <button class="btn btn-primary">submit</button>
                                   </form>
                              

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
