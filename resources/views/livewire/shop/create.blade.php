<div>


    <div class="row">
        <div class="col-12">
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
                        <div class="row">
                            <div class="form-group col-6">
                                <label><code>*</code><strong>Shop name</strong>
                                    @error('name')<code>{{ $message }}</code>
                                    @enderror</label>

                                <input wire:model="name" type="text" class="form-control">
                            </div>
                            <div class="form-group col-6">
                                <label><code>*</code><strong>Shop Licence</strong>
                                    @error('licence')<code>{{ $message }}</code>
                                    @enderror</label>
                                <input wire:model="licence" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row mb-6">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                <code>*</code><strong>Shop Category</strong>
                                @error('category')<code>{{ $message }}</code> @enderror
                            </label>
                            <div class="col-sm-12 col-md-6">


                                <select wire:model="category" class="form-control selectric">
                                    <option selected value="">Select</option>
                                    @foreach ($categorys as $category)
                                    <option value="{{ $category->id }}"> {{ $category->name }}</option>

                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="frist_name">
                                    <code>*</code><strong>Shop Address</strong>
                                    @error('address')<code>{{ $message }}</code>
                                    @enderror
                                </label>
                                <input wire:model="address" type="text" class="form-control" autofocus>
                            </div>
                            <div class="form-group col-6">


                                <label>
                                    <code>*</code><strong>Shop Fb Groups Link </strong>
                                    @error('link')<code>{{ $message }}</code>
                                    @enderror
                                </label>
                                <input wire:model="link" type="text" class="form-control">
                            </div>
                        </div>
                        <hr>
                        <div class="form-group col-12">
                            <label>
                                <code>*</code><strong>Shipping Cost </strong> @error('shipping')<code>{{ $message }}</code>
                                @enderror
                            </label>
                            <input wire:model="shipping" type="text" class="form-control">
                        </div>
                        <div class="form-group col-12">
                            <label>
                                <code>*</code><strong>Your Name </strong> @error('boss_name')<code>{{ $message }}</code>
                                @enderror
                            </label>
                            <input wire:model="boss_name" type="text" class="form-control">
                        </div>
                        <div class="form-group col-12">
                            <label>
                                <code>*</code><strong>Your Number </strong>
                                @error('phone')<code>{{ $message }}</code>
                                @enderror
                            </label>
                            <input wire:model="phone" type="text" class="form-control">
                        </div>
                        <div class="form-group col-12">
                            <label>
                                <code>*</code><strong>Your Email </strong>
                                @error('email')<code>{{ $message }}</code>
                                @enderror
                            </label>
                            <input wire:model="email" type="email" class="form-control">
                        </div>
                        <div class="form-group col-12">
                            <label>
                                <code>*</code><strong>Your Address </strong>
                                @error('boss_address')<code>{{ $message }}</code>
                                @enderror
                            </label>
                            <input wire:model="boss_address" type="text" class="form-control" >
                        </div>
                        <div class="form-group col-12">
                            <label>
                                <code>*</code><strong>Your NID Number </strong>
                                @error('boss_nid')<code>{{ $message }}</code>
                                @enderror
                            </label>
                            <input wire:model="boss_nid" type="text" class="form-control">
                        </div>
                        <div class="form-group col-12">
                            <label>
                                <code>*</code><strong>Your Bank Account Name </strong>
                                @error('bank_account_name')<code>{{ $message }}</code>
                                @enderror
                            </label>
                            <input wire:model="bank_account_name" type="text" class="form-control">
                        </div>
                        <div class="form-group col-12">
                            <label>
                                <code>*</code><strong>Your Bank Account Number </strong>
                                @error('bank_account_number')<code>{{ $message }}</code>
                                @enderror
                            </label>
                            <input wire:model="bank_account_number" type="text" class="form-control">
                        </div>
                        <div class="form-group col-12">
                            <label>
                                <code>*</code><strong>Your Account Bank Name </strong>
                                @error('bank_name')<code>{{ $message }}</code>
                                @enderror
                            </label>
                            <input wire:model="bank_name" type="text" class="form-control">
                        </div>
                        <div class="form-group col-12">
                            <label>
                                <code>*</code><strong>Password </strong> @error('password')<code>{{ $message }}</code>
                                @enderror
                            </label>
                            <input wire:model="password" type="password" class="form-control">
                        </div>


                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                Register
                            </button>
                        </div>
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
    <form action="{{ route('admin.shop.update',$shopid->id) }}" enctype="multipart/form-data" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Image</label>
            <div class="input-group">

                <input type="file" class="form-control" name="image">
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
