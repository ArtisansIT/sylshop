
<div>
    <div class="row">
      <div class="col-12">
            <div class="card">
                <div class="card-header">

                    <h4 class="text-info"> Comment Item</h4>


                    <div class="card-header-action">

                        @if ($go_all_citem_page == false)
                        <a href="#" wire:click="go_all_citem_page" class="btn btn-primary">
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
                        <h6>create New Comment item</h6>
                        <br>
                        <div class="form-group">
                            <label><code>*</code><strong>Comment Item name</strong>
                                @error('name')<code>{{ $message }}</code> @enderror</label>

                            <input type="text" wire:model.lazy="name" class="form-control form-control-sm">
                        </div>

                      



                        <button class="btn btn-primary">submit</button>


                    </form>

                </div>


                @elseif($go_edit_citem_page == true)
                @include('livewire.admin.citems.edit')
                @elseif($goto_in_activate_page == true)
                @livewire('admin.citems.inactive')
                @elseif($go_all_citem_page == true)
                @livewire('admin.citems.index')
                @endif
            </div>
        </div>

    </div>
