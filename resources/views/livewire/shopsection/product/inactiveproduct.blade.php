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
                                  
                                    {{-- <th> Name</th> --}}
                                    <th> Name</th>
                                    <th>Code </th>
                                    <th>Category</th>
                                    <th>Detsils</th>
                                    <th>Create Time</th>
                                 
                                </tr>
                                @foreach($products as $product)

                                <tr>
                                   
                                    <td>{{ isset($product->name) ? $product->name : '' }}</td>
                                    <td>{{ isset($product->code) ? $product->code : '' }}</td>

                                    <td>{{ isset($product->subcategory->name) ?$product->subcategory->name : ''  }}</td>
                                   
                                   
                                    <td><a href="#"
                    
                                            wire:click="$emit('viewProduct' , {{ $product->id  }})"
                                            class="btn btn-primary">Details</a></td>

                                    <td> {{ $product->created_at->diffForHumans() }}</td>
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
