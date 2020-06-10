<div>
    <div class="row">
        <div class="col-md-8 offset-md-2 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header">

                    <h4>Create new Category</h4>


                    <div class="card-header-action">

                        @if ($go_all_category_page == false)
                        <a href="#" wire:click="go_all_category_page" class="btn btn-primary">
                            View All
                        </a>
                        @endif

                        @if ($goto_create_page == false)

                        <a href="#" wire:click="go_create_page" class="btn btn-primary">
                            create page
                        </a>
                        @endif

                        @if ($goto_in_actiove_page == false)

                        <a href="#" wire:click="go_in_actiove_page" class="btn btn-primary">
                            In-active page
                        </a>
                        @endif
                    </div>
                </div>


                @if ($goto_create_page == true)

                <div class="card-body">

                    <form action="{{ route('admin.category.store') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="form-group">
                            <label><code>*</code><strong>Category name</strong>
                                @error('name')<code>{{ $message }}</code> @enderror</label>

                            <input type="text" name="name" class="form-control form-control-sm">
                        </div>

                        <div class="form-group">
                            <label><strong>Category Image</strong> @error('image')<code>{{ $message }}</code>
                                @enderror</label>
                            <input type="file" name="image" class="form-control">
                        </div>



                        <button class="btn btn-primary">Primary</button>


                    </form>

                </div>

                @elseif($goto_image_page == true)
                @include('livewire.admin.category.image-update')
                @elseif($go_edit_category_page == true)
                @include('livewire.admin.category.edit-category')
                @elseif($goto_in_actiove_page == true)
                @livewire('admin.category.inactive-category')
                @elseif($go_all_category_page == true)
                @livewire('admin.category.all-category')
                @endif
            </div>
        </div>

    </div>
