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
                                    <th> Name ssss</th>
                                    <th>Category</th>
                                    <th>Shop </th>
                                    <th>Edit</th>
                                    {{-- <th>Image Update</th> --}}
                                    <th>Activation</th>
                                </tr>
                                @foreach($products as $product)

                                <tr>
                                    <td class="p-0 text-center">
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" data-checkboxes="mygroup"
                                                class="custom-control-input" id="checkbox-1">
                                            <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                                        </div>
                                    </td>
                                    <td>{{ isset($product->name) ? $product->name : '' }}</td>

                                    <td>{{ isset($product->category->name) ?$product->category->name : ''  }}</td>
                                    <td>{{ isset($product->shop->name) ? $product->shop->name : ''  }}</td>
                                    <td><button class="btn btn-primary"
                                         onclick="confirm('Do you want To Restore') || event.stopImmediatePropagation()"
                                            wire:click="restore_product({{ $product->id }})">Restore</button></td>
                                    <td><a href="#"
                                            onclick="confirm('Do you want To delete This') || event.stopImmediatePropagation()"
                                            wire:click="forceDelete_product({{ $product->id }})"
                                            class="btn btn-primary">Force Delete</a></td>

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
