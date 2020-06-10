<div>
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <div class="">
                    <div class="card-header">
                        <h4>Un-Complete Product
                             <span class="badge badge-danger headerBadge1">
                                {{ $products->count() }}</span>
                        </h4>
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
                                    <th>shop</th>
                                    <th>image upload </th>
                                    <th>stock</th>
                                    {{-- <th>Image Update</th> --}}
                                    {{-- <th>Activation</th> --}}
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
                                    <td>{{ !empty($product->name) ?$product->name : ''  }}</td>

                                    <td>{{ !empty($product->category->name)  ? $product->category->name  : ''}}</td>
                                    <td>{{ !empty($product->shop->name) ?  $product->shop->name : ''}}</td>
                                    <td>
                                        @if (empty($product->stock))
                                            
                                        <button class="btn btn-primary"
                                            wire:click="insert_stock({{ $product->id }})">update stock</button>
                                        @else 
                                        <span class="text-red"> Stock Added</span>
                                        @endif
                                    </td>

                                    <td>
                                        @if ($product->image->count() < 1 || $product->status == 0)
                                            
                                        <button class="btn btn-primary"
                                            wire:click="imageInsert({{ $product->id }})">Insert Image</button>
                                        @else 
                                        <span class="text-red"> {{ $product->image->count() }}</span>
                                        @endif
                                    </td>
                                   
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
