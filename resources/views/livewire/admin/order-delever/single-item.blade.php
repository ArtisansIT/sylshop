<div>

    {{-- {{ dd($procecings) }} --}}
    <div class="row">
        <div class="col-12">
             <div class="card-header">
                <h4></h4>
                <div class="card-header-action">

                    <button wire:click="$emit('back_To_Delevery')"
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
                                <th>Reverse Delevered</th>
                                <th>widraw Money</th>
                                <th>Print</th>
                            </tr>
                            @foreach($delevers as $delever)
                            <tr>

                                <td>{{  $delever
                                    ->orderDetails
                                    ->order
                                    ->code}}</td>
                                
                                <td>{{  $delever
    
                                    ->orderDetails
                                    ->product
                                    ->code}}</td>
                                <td>{{  $delever
                                    ->orderDetails
                                    ->product
                                    ->name}}</td>
                                 <td>
                                    <img alt="image" 
                                    src="{{ asset('images/'.$delever
                                    ->orderDetails
                                    ->product
                                    ->image->first()->url) }}"
                                     width="100">
                                </td>
                                <td>{{  !empty($delever
                                    ->variation) ? $delever
                                    ->variation->name :
                                    'No variation'
                                  }}
                                 </td>
                                 <td>{{  $delever
                                    ->orderDetails
                                    ->delevered_rate
                                    }}
                                 </td>
                                <td>
                                    {{ $delever->created_at->diffForHumans() }}
                                </td>

                                 <td>
                                   
                                    <button class="btn btn-info" 
                                     onclick="confirm('ADD To Delevered ??') 
                                     || event.stopImmediatePropagation()"
                                    wire:click="Reverse_Delevered({{ $delever->id }})">
                                        Reverse</button>
                                </td>
                                <td><button class="btn btn-primary" 
                                     onclick="confirm('Confirm ??') 
                                     || event.stopImmediatePropagation()"
                                    wire:click="withDraw({{ $delever->id }})">
                                        widraw Money</button></td>
                                <td>
                                   
                                    
                                    <a href="{{ route('admin.shop_delevered_invoice',
                                     $delever->id ) }}"
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
