<div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Create new sub-category</h4>
                    <div class="card-header-action">
                        @if ($goto_create_page == false)

                        <a href="#" wire:click="go_create_page_from_index"
                         class="btn mr-2 btn-primary">Create</a>
                        @endif
                        @if ($goto_index_page == false)

                        <a href="#" wire:click="go_index_page" class="btn mr-2 btn-primary">
                            View All
                        </a>
                        @endif

                        @if ($goto_pending_page == false)
                            
                        <a href="#" 
                        wire:click="goto_pending_page"
                        class="btn mr-2 btn-info">
                            Pending Subcategory
                        </a>
                        @endif
                        @if ($goto_inactive_page == false)
                            
                        <a href="#" 
                        wire:click="go_inactive_page"
                        class="btn mr-2 btn-danger">
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
                            <label><code>*</code><strong>sub-category name</strong> @error('name')<code>{{ $message }}</code>
                                @enderror</label>

                            <input type="text" wire:model="name" class="form-control form-control-sm">
                        </div>

                        <div class="form-group">

                            <label><code>*</code><strong>Category Name</strong>
                                @error('category')<code>{{ $message }}</code> @enderror</label>
                            <select wire:model="category" class="form-control">
                                <option value=""> select</option>
                                @foreach ($categorys as $category)
                                <option value="{{ $category->id }}"> {{ $category->name }}</option>

                                @endforeach

                            </select>
                        </div>


                        <div class="form-group">

                            <label><code>*</code><strong>Shop Name</strong>
                                @error('shop')<code>{{ $message }}</code> @enderror</label>
                            <select wire:model="shop" class="form-control">
                                <option value=""> select</option>
                                @foreach($this->shops as $shop)
                                <option value="{{ $shop->id }}"> {{ $shop->name }}</option>

                                @endforeach

                            </select>
                        </div>

                        

                        


                        <button class="btn btn-primary">submit</button>

                    </form>
                </div>
                @elseif($goto_index_page == true)
                @livewire('admin.subcategory.index')
                @elseif($goto_pending_page == true)
                @livewire('admin.subcategory.pending')
                @elseif($goto_inactive_page == true)
                @livewire('admin.subcategory.inactive')
                @elseif($goto_edit_page == true)
                @include('livewire.admin.subcategory.edit')
                @elseif($goto_image_upload_page == true)
                @include('livewire.admin.subcategory.upload-image')
                @elseif($goto_image_update_page == true)
                @include('livewire.admin.subcategory.image-update')
                
                @endif
            </div>
        </div>
    </div>
</div>

{{-- @push('scripts')
    <script>

        window.livewire.on('uploadFile' , function(){
            console.log('upload File');
            input = document.querySelector('#file')
            let formData = new FormData();
            formData.append('image', input.files[0]);
            axios.post('/admin/image' , formData,{headers:{'Content-Type':'multipart/form-data'}})
            .then(res => window.livewire.emit('uploadFile' , res.data))
            .catch(err => console.log(err))
        });
    </script>
@endpush --}}
