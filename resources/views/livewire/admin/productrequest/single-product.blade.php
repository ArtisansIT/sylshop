<div>
    {{-- {{ dd($product) }} --}}
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




                    @if ($image_delete_component == false)
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                            <a href="#">
                                <img class="img-responsive thumbnail"
                                    src="{{ asset('images/'.$product->image->first()->url) }}" alt="">
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <button wire:click="removeImage({{ $product->image->first() }})" 
                            class="btn btn-icon btn-danger">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>

                    @else
                    @livewire('admin.productrequest.image-create',[
                    'image_id'=> $image_id_for_new_submition
                    ])
                    @endif

                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-md-6 col-lg-9">
            <div class="card-body">
                <hr>
                <form wire:submit.prevent="submitForm">
                    <div class="form-group">
                        <label><code>*</code><strong> name</strong> @error('name')<code>{{ $message }}</code>
                            @enderror</label>

                        <input type="text" wire:model="name" class="form-control form-control-sm">
                    </div>
                    <div class="form-group">
                        <label><code>*</code><strong>Main Price</strong>
                            @error('main_price')<code>{{ $message }}</code> @enderror</label>

                        <input type="number" wire:model="main_price" class="form-control form-control-sm">
                    </div>

                    <div class="form-group">
                        <label><code>*</code><strong>Offer Price</strong>
                            @error('offer_price')<code>{{ $message }}</code> @enderror</label>

                        <input type="number" wire:model="offer_price" class="form-control form-control-sm">
                    </div>

                    <div class="form-group">
                        <label><code>*</code><strong>link</strong>
                            @error('link')<code>{{ $message }}</code> @enderror</label>

                        <input type="text" wire:model="link" class="form-control form-control-sm">
                    </div>

                    <div class="form-group">
                        <label><code>*</code><strong>search_tag</strong>
                            @error('serch_tag')<code>{{ $message }}</code> @enderror</label>

                        <input type="text" wire:model="serch_tag" class="form-control form-control-sm">
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
                    <button class="btn btn-primary">submit</button>

                </form>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3">

        </div>

    </div>


</div>