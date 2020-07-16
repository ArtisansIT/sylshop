<div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Create new sub-category</h4>
                    <div class="card-header-action">
                        @if ($goto_create_page == false)

                        <a href="#" wire:click="go_create_page_from_index" class="btn mr-2 btn-primary">Create</a>
                        @endif
                        @if ($goto_index_page == false)

                        <a href="#" wire:click="go_index_page" class="btn mr-2 btn-primary">
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
                        @if ($photo)
                        Photo Preview:
                        <img width="200" height="100" src="{{ $photo->temporaryUrl() }}">
                        @endif
                        <div class="form-group">
                            <label><code>*</code><strong>sub-category name</strong>
                                @error('name')<code>{{ $message }}</code>
                                @enderror</label>

                            <input type="text" wire:model.lazy="name" class="form-control form-control-sm">
                        </div>

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
                @elseif($goto_index_page == true)
                @livewire('shopsection.subcategory.all-subcategory')
                @elseif($goto_inactive_page == true)
                @livewire('shopsection.subcategory.in-active')
                @elseif($goto_edit_page == true)
                @include('livewire.shopsection.subcategory.edit')
                @elseif($goto_image_update_page == true)
                @livewire('shopsection.subcategory.image-update' ,[
                'selectedid' => $subcategory_id_for_imageUpdate
                ])

                @endif
            </div>
        </div>
    </div>
</div>

{{-- @push('scripts')
     <script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('f3ea4bbe991d4a67ec19', {
      cluster: 'ap2'
    });

    var channel = pusher.subscribe('order-channel');
    channel.bind('order-event', function(data) {
      alert(JSON.stringify(data));
    });
  </script>
@endpush --}}


