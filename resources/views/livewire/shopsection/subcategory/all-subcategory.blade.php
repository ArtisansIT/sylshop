<div>
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <div class="">
                    <div class="card-header">
                        <h4>Sub-Category section</h4>
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

                        <div>
                            @if (session()->has('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                            @endif
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>
                                    <th> Name</th>
                                    <td>Image</td>
                                    <td>Create Time</td>
                                    <th>Image Update</th>
                                    <th>Edit</th>
                                    <th>Activation</th>
                                </tr>
                                @foreach($data as $subcategory)


                                <td>{{ isset($subcategory->name) ? $subcategory->name: '' }}</td>
                                <td class="align-middle">

                                    <img alt="image" class="" @if (isset($subcategory->image->url))
                                    src="{{ asset('images/'.$subcategory->image->url) }}" width="100">
                                    @endif

                                </td>
                                <td>
                                    {{ $subcategory->created_at->diffForHumans() }}
                                </td>


                                <td><button class="btn btn-primary"
                                        wire:click="updateImage({{ $subcategory->id }})">Update
                                        Image</button></td>
                                <td><button class="btn btn-primary"
                                        wire:click="edit({{ $subcategory->id }})">Edit</button></td>
                                <td><a href="#"
                                        onclick="confirm('Are you want To delete') || event.stopImmediatePropagation()"
                                        wire:click="softDelete_subcategory({{ $subcategory->id }})"
                                         class="btn btn-danger btn-icon icon-left">  <i class="fas fa-times"></i>Delete</a></td>
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
