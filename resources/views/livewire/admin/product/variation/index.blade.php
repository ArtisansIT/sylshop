<div>
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <div class="">
                    <div class="card-header">
                        <h4>
                            <span>Product Name : </span>
                            
                            <span class="text-info">{{ $allVariations->name }} </span>
                        </h4>
                       
                        <div class="card-header-action">
                             <a href="#" wire:click="createVariation({{ $allVariations->id }})"  class="btn mr-2 btn-success">Create New Variation</a>
                        </div>
                     
                    </div>
                     <h4>
                            <span>Remain Stock : </span>
                            <span class="badge badge-danger headerBadge1"> {{ $restStock_in_all_variation  }} </span>
                        </h4>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>
                        
                                    <th>Variation Name</th>
            
                                    <th>Main Price </th>
                                    <th>Offer Price </th>
                                    <th>Stock </th>
                                    <th>Edit</th>
                                    <th>Deletet</th>
                               
                                </tr>
                                @foreach($allVariations->variations as $variation)

                                <tr>
                                    
                                    <td>{{ isset($variation->name) ? $variation->name : '' }}</td>
                                    <td>{{ isset($variation->sale_price) ? $variation->sale_price : '' }}</td>
                                    <td>{{ isset($variation->offer_price) ? $variation->offer_price : '' }}</td>
                                    <td>{{ isset($variation->stock) ? $variation->stock : '' }}</td>

                                    <td><button class="btn btn-primary"
                                         onclick="confirm('Do you want To Restore') || event.stopImmediatePropagation()"
                                            wire:click="editVariation({{ $variation->id }})">Edit</button></td>
                                    <td><a href="#"
                                            onclick="confirm('Do you want To delete This') || event.stopImmediatePropagation()"
                                            wire:click="deleteVariation({{ $variation->id }})"
                                            class="btn btn-primary"> Delete</a></td>

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
