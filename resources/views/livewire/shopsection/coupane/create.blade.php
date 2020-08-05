<div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Create Coupanes</h4>
                    <div class="card-header-action">
                        @if ($goto_create_page == false)

                        <a href="#" wire:click="go_create_page" class="btn mr-2 btn-primary">Create</a>
                        @endif
                        @if ($goto_all_page == false)

                        <a href="#" wire:click="go_all_page" class="btn mr-2 btn-primary">
                            View All
                        </a>
                        @endif
                        @if ($goto_inactive_page == false)

                        <a href="#" wire:click="go_inactive_page" class="btn mr-2 btn-danger">
                            View All inactive
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
                            <label><code>*</code><strong>Coupane name</strong>
                                @error('name')<code>{{ $message }}</code>
                                @enderror</label>

                            <input type="text" wire:model.lazy="name" class="form-control form-control-sm">
                        </div>

                        <div class="form-group">
                            <label><code>*</code><strong>Coupane Code </strong>
                                @error('code')<code>{{ $message }}</code>
                                @enderror</label>

                            <input type="text" wire:model.lazy="code" name="name"
                                class="form-control form-control-sm">
                        </div>

                        <div class="form-group">
                            <label><code>*</code><strong>Total </strong>
                                @error('total')<code>{{ $message }}</code> @enderror</label>

                            <input type="number" wire:model.lazy="total" name="name"
                                class="form-control form-control-sm">
                        </div>

                        <div class="form-group">
                            <label><code>*</code><strong>Discount </strong>
                                @error('discount')<code>{{ $message }}</code> @enderror</label>

                            <input type="number" wire:model.lazy="discount" name="name"
                                class="form-control form-control-sm">
                        </div>
                        <button class="btn btn-primary">submit</button>

                    </form>
                </div>
                @elseif($goto_all_page == true)
                @livewire('shopsection.coupane.all')
                @elseif($goto_inactive_page == true)
                @livewire('shopsection.coupane.in-active')
                @endif
            </div>
        </div>
    </div>
</div>
