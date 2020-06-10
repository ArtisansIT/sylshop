<div>
   

    <div class="row">
        <div class="col-md-10 offset-md-1 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header">
                    <h4>Create new Shop</h4>
                    <div class="card-header-action">

                          @if ($goto_create_page == false)

                        <a href="#" wire:click="go_create_page" class="btn mr-2 btn-primary">Create</a>
                        @endif
                        @if ($all_shop_page == false)

                        <a href="#" wire:click="all_shop_page" class="btn mr-2 btn-primary">
                            View All
                        </a>
                        @endif


                      

                        @if ($inactive_all_shop_page == false)

                        <a href="#" wire:click="inactive_all_shop_page" class="btn mr-2 btn-warning">
                            View All inactive
                        </a>
                        @endif


                        @if ($shop_pending_page == false)

                        <a href="#" wire:click="pending_page" class="btn  mr-2 btn-danger ">
                            Pending Shop
                        </a>
                        @endif
                    </div>
                </div>

                @if ($goto_create_page == true)
                <div class="card-body">
                    
                    <form wire:submit.prevent="submitForm">

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
                                <option  selected value="">Select</option>
                                @foreach ($categorys as $category)
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

                 @elseif($img_upload_page == true)
                @include('livewire.shop.image-upload')
                 @elseif($img_update_page == true)
                @include('livewire.shop.image-update')
                 @elseif($goto_edit_page == true)
                @include('livewire.shop.edit-a-shop')
                 @elseif($all_shop_page == true)
                @livewire('shop.view-all-shop')
                 @elseif($inactive_all_shop_page == true)
                @livewire('shop.inactive')
                 @elseif($shop_pending_page == true)
                @livewire('shop.shop-pending')

                @endif
            </div>
        </div>

    </div>

</div>


    <!-- Modal with form -->

    {{-- @if ($image)

    <div class="row">
        <div class="col-12 col-md-6 col-lg-6">

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Basic
                Modal</button>

        </div>

    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="formModal"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModal"> @if($image == true) {{ $shopid->name }} @endif</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
               
                <div class="modal-body">
                    <form action="{{ route('admin.shop.update',$shopid->id) }}" enctype="multipart/form-data" method="post" >
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Image</label>
                            <div class="input-group">
                               
                                <input type="file" class="form-control"  name="image">
                            </div>
                        </div>

                        <button class="btn mt-2 btn-primary">Primary</button>
                    </form>
                    <div class="mt-4"></div>
                        
                      
                    
                </div>
            </div>
        </div>
    </div>
    @endif --}}

