<div>
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <div class="">
                    <div class="card-header">
                        <h4>Shop section</h4>
                        <div class="card-header-form">
                            <form>
                                <div class="input-group">
                                    <input type="text" wire:model="search" class="form-control" placeholder="Search">
                                    <div class="input-group-btn">
                                        <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>
                                    <th></th>
                                    {{-- <th> Name</th> --}}
                                    <th> Name</th>
                                    <td>Image</td>
                                    <th>Category</th>
                                    <th>Shop </th>

                                    <th>Image Update</th>
                                    <th>Edit</th>
                                    {{-- <th>Image Update</th> --}}
                                    <th>Activation</th>
                                </tr>
                                @foreach($data as $subcategory)

                                <tr>
                                    <td class="p-0 text-center">
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" data-checkboxes="mygroup"
                                                class="custom-control-input" id="checkbox-{{ $subcategory->id }}">
                                            <label for="checkbox-{{ $subcategory->id }}" class="custom-control-label">&nbsp;</label>
                                        </div>
                                    </td>
                                  <td>{{ isset($subcategory->name) ? $subcategory->name: '' }}</td>
                                   <td class="align-middle">

                                    <img alt="image" class="" @if (isset($subcategory->image->url))
                                        src="{{ asset('images/'.$subcategory->image->url) }}" width="100">
                                        @endif

                                </td>

                                    <td>
                                        
                                        {{ isset($subcategory->category->name ) ?$subcategory->category->name  : ''}}
                                    
                                    </td>
                                    <td>
                                        {{isset($subcategory->shop->name) ? $subcategory->shop->name : ''  }}
                                    </td>
                                    <td><button class="btn btn-primary"
                                            wire:click="updateImage({{ $subcategory->id }})">Update Image</button></td>
                                    <td><button class="btn btn-primary"
                                            wire:click="edit({{ $subcategory->id }})">Edit</button></td>
                                    <td><a href="#"
                                            onclick="confirm('Are you want To delete') || event.stopImmediatePropagation()"
                                            wire:click="softDelete_subcategory({{ $subcategory->id }})"
                                            class="btn btn-primary">Delete</a></td>

                                    {{-- <td><a href="#" class="btn btn-primary">In active</a></td> --}}
                                </tr>

                                @endforeach

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
