<div>
    <div class="card-body">
        <div class="row">
            <div class="col-12">

                    <div class="card-header">
                        <h4>Category</h4>
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
                    <div class=" p-0">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>

                                    <th> Popular </th>
                                    <th> Name</th>
                                    <th>Picture</th>
                                    <th>Created_at</th>
                                    <th>Edit</th>
                                    <th>image update</th>
                                    <th>Delete</th>
                                </tr>
                                @foreach($categorys as $category)

                                 <tr>
                                     <td class="p-0 text-center">
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" data-checkboxes="mygroup"
                                                wire:change="addToPopular({{$category->id  }})" 
                                                @if (!empty($category->popular == true)) checked @endif

                                            class="custom-control-input" id="checkbox-{{ $category->id }}">
                                            <label for="checkbox-{{ $category->id }}"
                                                class="custom-control-label">&nbsp;</label>
                                        </div>
                                    </td>

                                    <td>{{ $category->name }}</td>
                                    <td>
                                        @if (isset($category->image->url))

                                        <img alt="image" src="{{ asset('images/'.$category->image->url) }}" width="35">
                                        @endif
                                    </td>
                                    <td>{{ $category->created_at->diffForHumans() }}</td>

                                    <td><a href="#"
                                           
                                            wire:click="updateTitle({{ $category->id }})"
                                            class="btn btn-primary">Edit</a></td>

                                    <td><a href="#" wire:click="updateImage({{ $category->id }})"
                                            class="btn btn-primary">Update Image</a></td>

                                    <td><a href="#"
                                            onclick="confirm('Are you want To delete') || event.stopImmediatePropagation()"
                                            wire:click="deleteCategory({{ $category->id }})"
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


