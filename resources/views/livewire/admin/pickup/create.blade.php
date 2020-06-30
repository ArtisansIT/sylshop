
<div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">

                    <h4>Create new Pickup</h4>


                    <div class="card-header-action">

                        @if ($go_all_pickup_page == false)
                        <a href="#" wire:click="go_all_pickup_page" class="btn btn-primary">
                            View All
                        </a>
                        @endif

                        @if ($goto_create_page == false)

                        <a href="#" wire:click="go_create_page" class="btn btn-primary">
                            create page
                        </a>
                        @endif

                        @if ($goto_in_activate_page == false)

                        <a href="#" wire:click="go_in_activate_page" class="btn btn-primary">
                            In-active page
                        </a>
                        @endif
                    </div>
                </div>


                @if ($goto_create_page == true)

                <div class="card-body">

                    @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                    <div class="mb-5"></div>
                    @endif

                    <form wire:submit.prevent="createPickaup">

                        <div class="form-group">
                            <label><code>*</code><strong>Pickup Address</strong>
                                @error('address')<code>{{ $message }}</code> @enderror</label>

                            <input type="text" wire:model.lazy="address" class="form-control form-control-sm">
                        </div>

                        <div class="form-group">
                            <label><strong>Category Image</strong> @error('cost')<code>{{ $message }}</code>
                                @enderror</label>
                            <input type="number" wire:model.lazy="cost" class="form-control">
                        </div>



                        <button class="btn btn-primary">Primary</button>


                    </form>

                </div>


                @elseif($go_edit_pickup_page == true)
                @include('livewire.admin.pickup.edit')
                @elseif($goto_in_activate_page == true)
                @livewire('admin.pickup.inactive')
                @elseif($go_all_pickup_page == true)
                @livewire('admin.pickup.index')
                @endif
            </div>
        </div>

    </div>
