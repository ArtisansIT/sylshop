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
                                    <th>Category</th>
                                    <th>Image </th>
                                    <th>Edit</th>
                                    {{-- <th>Image Update</th> --}}
                                    <th>Activation</th>
                                </tr>
                                @foreach($shops as $shop)

                                <tr>
                                    <td class="p-0 text-center">
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" data-checkboxes="mygroup"
                                                class="custom-control-input" id="checkbox-1">
                                            <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                                        </div>
                                    </td>
                                    <td>{{ isset($shop->name ) ? $shop->name  : ''}}</td>

                                    <td>{{isset( $shop->category->name) ?  $shop->category->name : '' }}</td>

                                    <td class="align-middle">

                                        <img alt="image" class="rounded-circle" @if (isset($shop->image->url))
                                        src="{{ asset('images/'.$shop->image->url) }}" width="35">
                                        @endif

                                    </td>
                                    <td><button class="btn btn-primary"
                                            onclick="confirm('Do you want To Restore') || event.stopImmediatePropagation()"
                                            wire:click="restore_shop({{ $shop->id }})">Restore</button></td>
                                    <td><a href="#"
                                            onclick="confirm('Do you want To delete This') || event.stopImmediatePropagation()"
                                            wire:click="forceDelete_shop({{ $shop->id }})" class="btn btn-primary">Force
                                            Delete</a></td>

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
