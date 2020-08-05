<div>

    {{-- {{ dd($procecings) }} --}}
    <div class="row">
        <div class="col-12">
             <div class="card-header">
                <h4></h4>
                <div class="card-header-action">

                    <button wire:click="$emit('back')"
                        class="btn btn-danger btn-icon icon-left">
                        <i class="fas fa-times"></i> Back
                    </button>
                </div>
            </div>
           
               
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th>Order</th>
                                <th>Product code</th>
                                <th>Product name</th>
                                <th> Image</th>
                                <th> Variation</th>
                                <th> Money</th>
                                <th>Create Time </th>
                                <th>Reverse Procecing </th>
                                <th>Add To Delevered </th>
                                <th>widraw Money</th>
                                <th>Print</th>
                            </tr>
                            @foreach($procecings as $procecing)

                            <tr>

                                <td>{{  $procecing
                                    ->orderDetails
                                    ->order
                                    ->code}}</td>
                                
                                <td>{{  $procecing
    
                                    ->orderDetails
                                    ->product
                                    ->code}}</td>
                                <td>{{  $procecing
                                    ->orderDetails
                                    ->product
                                    ->name}}</td>
                                 <td>
                                    <img alt="image" 
                                    src="{{ asset('images/'.$procecing
                                    ->orderDetails
                                    ->product
                                    ->image->first()->url) }}"
                                     width="100">
                                </td>
                                <td>{{  !empty($procecing
                                    ->variation) ? $procecing
                                    ->variation->name :
                                    'No variation'
                                  }}
                                 </td>
                                 <td>{{  $procecing
                                    ->orderDetails
                                    ->procecing_rate
                                    }}
                                 </td>
                                <td>
                                    {{ $procecing->created_at->diffForHumans() }}
                                </td>
                                <td>
                                   
                                    <button class="btn btn-info" 
                                     onclick="confirm('ADD To Delevered ??') 
                                     || event.stopImmediatePropagation()"
                                    wire:click="Reverse_procecing({{ $procecing->id }})">
                                        Reverse</button>
                                </td>
                                <td>
                                     @if ($procecing->delevery_status == true)
                                        <p class="text-danger">Delevered Ok</p>
                                    @else 
                                    
                                    
                                    <button class="btn btn-info" 
                                     onclick="confirm('ADD To Delevered ??') 
                                     || event.stopImmediatePropagation()"
                                    wire:click="add_to_delevered({{ $procecing->id }})">
                                        Add To Delevered</button>
                                        @endif
                                </td>
                                <td>
                                   
                                    
                                    <button class="btn btn-primary" 
                                     onclick="confirm('Confirm ??') 
                                     || event.stopImmediatePropagation()"
                                    wire:click="withDraw({{ $procecing->id }})">
                                        widraw Money</button>
                                   
                                </td>
                                <td>
                                   
                                    
                                    <a href="{{ route('admin.shop_processing_invoice',
                                     $procecing->id ) }}"
                                         class="btn btn-primary" >
                                        print</a>
                                   
                                </td>
                            </tr>
                            @endforeach

                        </table>
                    </div>
                </div>
            </div>
        </div>
   
</div>
