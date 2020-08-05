<div>

    @if($request_all_product == true)
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
                                        <button class="btn btn-primary">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>
                                    <th>Product Code</th>
                                    <th>name</th>
                                    <th>image </th>
                                    <th>category</th>
                                    <th>shop</th>
                                    <th>create</th>
                                    <th>Activation</th>
                                    <th>Delete</th>
                                </tr>
                                @foreach($products as $product)

                                <tr>

                                    <td>{{ $product->code  }}</td>
                                    <td>{{ $product->name  }}</td>
                                    <td class="align-middle">
                                        <img alt="image" width="100"
                                            src="{{ asset('images/'.$product->image->first()->url) }}">
                                    </td>
                                    <td>{{ $product->category->name  }}</td>
                                    <td>{{ $product->subcategory->name  }}</td>
                                    <td>{{ $product->shop->name  }}</td>
                                    <td>
                                        <button class="btn btn-primary"
                                            wire:click="edit({{ $product->id }})">
                                            Active
                                        </button>
                                    </td>
                                    <td>
                                        <button wire:click="delete({{ $product->id }})" class="btn btn-danger btn-icon icon-left">
                                            <i class="fas fa-times"></i> Delete
                                        </button>

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
    @elseif($edit_product == true)
    @livewire('admin.productrequest.single-product',[
        'pro_id' => $pro_id,
    ])
    @endif
</div>
