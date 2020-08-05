<div>

    {{-- {{ dd($products) }} --}}
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
                                    <input type="text" wire:model="search"
                                    class="form-control" placeholder="Search">
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
                                    <th>subcategory</th>
                                    <th>shop</th>
                                    <th>Activation</th>
                                </tr>
                                @foreach($products as $product)

                                <tr>
                                  
                                    <td>{{ $product->code  }}</td>
                                    <td>{{ $product->name  }}</td>
                                    <td>
                                          <img alt="image" class="mr-3 "
                                           width="80"
                                            src="{{ asset('images/'.$product->image->first()->url) }}">
                                    </td>
                                    <td>{{ $product->category->name  }}</td>
                                    <td>{{ $product->subcategory->name  }}</td>
                                    <td>{{ $product->shop->name  }}</td>


                                  
                                    <td>
                                     
                                            
                                        <button class="btn btn-primary"
                                            wire:click="activation_stock({{ $product->id }})">
                                            Activation stock
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
</div>
