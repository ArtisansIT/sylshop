<div>
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <div>
                    @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                    @endif
                </div>
                <div class="">
                    <div class="card-header">
                        <h4>
                            <span>

                                All products
                            </span>

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
                    <div class=" p-0">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>
                                    <th>Today Offer</th>
                                    <th> View</th>
                                    <th> Name</th>
                                    <th>Code </th>
                                    <th>Category</th>
                                    <th>Sub-Category </th>
                                    <th>Stock </th>
                                    <th>Discount Rate </th>
                                    <th>Variation </th>
                                    <th>Create </th>
                                    <th>Actions</th>
                                </tr>
                                @foreach($products as $product)

                                <tr>
                                    <td class="p-0 text-center">
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" data-checkboxes="mygroup"
                                                wire:change="addToOffer({{$product->id  }})"
                                                 @if ( !empty( $product->adons->today_offer == true)
                                               ) checked @endif

                                            class="custom-control-input" id="checkbox-{{ $product->id }}">
                                            <label for="checkbox-{{ $product->id }}"
                                                class="custom-control-label">&nbsp;</label>
                                        </div>
                                    </td>
                                    <td>
                                         <button type="button" class="btn btn-sm btn-dark mr-1"
                                                wire:click="$emit('viewProduct' , {{ $product->id  }})">View
                                            </button>
                                    </td>
                                    <td>{{ isset($product->name) ? $product->name : '' }}</td>
                                    <td>{{ isset($product->code) ? $product->code : '' }}</td>

                                    <td>{{ isset($product->category->name) ? $product->category->name: '' }}</td>
                                    <td>{{ isset($product->subcategory->name) ? $product->subcategory->name : '' }}</td>
                                    <td>{{ isset($product->stock->stock) ? $product->stock->stock : '' }}</td>
                                    <td>{{ isset($product->discount_rate) ? $product->discount_rate : '' }}%</td>

                    
                                    <td>
                                        <p>
                                            

                                            <span class="badge badge-danger headerBadge1">
                                               {{ $product->variations->count() }}</span>
                                               
                                        </p>
                                    </td>
                                    <td>
                                        {{ $product->updated_at->diffForHumans() }}
                                    </td>


                                
                                    <td>
                                        <div class="btn-group mb-1 btn-group-sm" role="group"
                                            aria-label="Basic example">
                                            <button type="button" class="btn btn-sm btn-dark mr-1"
                                                 wire:click="allVariation({{ $product->id }})">Variation
                                            </button>
                                            <button type="button" class="btn btn-sm btn-primary mr-1"
                                                wire:click="edit_product({{ $product->id }})">Edit
                                            </button>
                                            <button type="button" class="btn btn-sm btn-success mr-1"
                                                wire:click="see_all_image({{ $product->id }})">Images
                                            </button>
                                            <button type="button" class="btn btn-sm btn-warning mr-1"
                                                wire:click="go_and_update_stock({{ $product->id }})">stock
                                            </button>
                                            <button type="button" class="btn btn-sm btn-dark mr-1"
                                                wire:click="go_and_update_variation_stock({{ $product->id }})">Variation Stock
                                            </button>
                                            <button type="button" class="btn btn-sm btn-danger mr-1"
                                                onclick="confirm('Are you want To delete') || event.stopImmediatePropagation()"
                                                wire:click="softDelete_product({{ $product->id }})">Delete
                                            </button>
                                        </div>
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
