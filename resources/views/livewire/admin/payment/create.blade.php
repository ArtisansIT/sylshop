
<div>
    <div class="row">
        <div class="col-md-8 offset-md-2 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header">

                    <h4>Create new payment</h4>


                    <div class="card-header-action">

                        @if ($go_all_payment_page == false)
                        <a href="#" wire:click="go_all_payment_page" class="btn btn-primary">
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



                        <button class="btn btn-primary">Primary</button>


                    </form>

                </div>


                @elseif($go_edit_payment_page == true)
                @include('livewire.admin.payment.edit')
                @elseif($goto_in_activate_page == true)
                @livewire('admin.payment.inactive')
                @elseif($go_all_payment_page == true)
                @livewire('admin.payment.index')
                @endif
            </div>
        </div>

    </div>
