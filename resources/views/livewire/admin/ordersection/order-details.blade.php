<div>
    <div class="card-body">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <h4>
                            <span>

                                Order NO : #{{$orderCode  }}
                            </span>


                        </h4>
                        <div class="card-header-form">

                            <button wire:click="backToPage" class="btn btn-danger btn-icon icon-left">
                                <i class="fas fa-times"></i> Back
                            </button>
                        </div>

                    </div>
                     <div class="card-header">
                        <div>
                            @if (session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session('message') }}
                                </div>
                            @endif
                        </div>

                    </div>
                    
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>

                                    {{-- <th >#</th> --}}
                                    <th>Product Link</th>
                                    <th>Cancel</th>
                                    <th>Shop Cancel</th>
                                    <th>Order Date</th>
                                    <th>Product Price</th>
                                    <th>Quantity</th>
                                    <th>Print</th>
                                    <th>New</th>
                                    <th>chack</th>
                                    <th>Received</th>
                                    <th>Packing</th>
                                    <th>Shipped</th>
                                    <th>Piked</th>
                                    <th>Delivered</th>
                                    <th>Return</th>
                                    <th>Received</th>
                                    <th>Handhover</th>
                                

                                </tr>

                                @foreach ($singleorder as $order)
                                
                                <tr>
                                    <td><button class="btn btn-primary"
                                            wire:click="go_single_product({{  $order['product_id'] }} , {{ $order['variation_id'] }})">Product</button></td>

                                 <td>
                                     <button
                                      onclick="confirm('Are you want To Cancel the order Item') || event.stopImmediatePropagation()"
                                     wire:click="cancel({{$order['id']   }})" class="btn btn-danger">
                                        Cancel
                                     </button>
                                </td>
                                <td>
                                    <button wire:click="shopCancel({{ $order['id']  }})" class="btn btn-danger">
                                        <small> Shop Cancel</small>

                                    </button>
                                 </td>


                                    <td><small>{{ Carbon\Carbon::parse($order['created_at'])->toFormattedDateString()}}</small>
                                    </td>
                                    {{-- <td><small>{{ $order['created_at']->toFormattedDateString() }}</small></td>
                                    --}}
                                    <td>Tk {{ $order['total'] }}</td>
                                    <td> {{ $order['quentity'] }}</td>
                                    <td><button class="btn btn-primary"
                                            wire:click="back"
                                            >Print</button></td>
                                    <td class="p-0 text-center">
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" data-checkboxes="mygroup"
                                                wire:change="pending({{$order['id']  }})" @if ($order['pending']==true)
                                                checked @endif class="custom-control-input"
                                                id="pending-{{ $order['id'] }}">
                                            <label for="pending-{{ $order['id'] }}"
                                                class="custom-control-label">&nbsp;</label>
                                        </div>
                                    </td>
                                    <td class="p-0 text-center">
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" data-checkboxes="mygroup"
                                                wire:change.$refresh="check({{$order['id']  }})" @if ($order['check']==true)
                                                checked @endif class="custom-control-input"
                                                id="check-{{ $order['id'] }}">
                                            <label for="check-{{ $order['id'] }}"
                                                class="custom-control-label">&nbsp;</label>
                                        </div>
                                    </td>
                                    <td class="p-0 text-center">
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" data-checkboxes="mygroup"
                                                wire:change="received({{$order['id']  }})"
                                                
                                                @if($order['received']==true) checked @endif class="custom-control-input"
                                                id="received-{{ $order['id'] }}">
                                            <label for="received-{{ $order['id'] }}"
                                                class="custom-control-label">&nbsp;</label>
                                        </div>
                                    </td>
                                    <td class="p-0 text-center">
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" data-checkboxes="mygroup"
                                                wire:change="packing({{$order['id']  }})" @if ($order['packing']==true)
                                                checked @endif class="custom-control-input"
                                                id="packing-{{ $order['id'] }}">
                                            <label for="packing-{{ $order['id'] }}"
                                                class="custom-control-label">&nbsp;</label>
                                        </div>
                                    </td>
                                    <td class="p-0 text-center">
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" data-checkboxes="mygroup"
                                                wire:change="shipped({{$order['id']  }})" @if ($order['shipped']==true)
                                                checked @endif class="custom-control-input"
                                                id="shipped-{{ $order['id'] }}">
                                            <label for="shipped-{{ $order['id'] }}"
                                                class="custom-control-label">&nbsp;</label>
                                        </div>
                                    </td>
                                    <td class="p-0 text-center">
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" data-checkboxes="mygroup"
                                                wire:change="piked({{$order['id']  }})" @if ($order['piked']==true)
                                                checked @endif class="custom-control-input"
                                                id="piked-{{ $order['id'] }}">
                                            <label for="piked-{{ $order['id'] }}"
                                                class="custom-control-label">&nbsp;</label>
                                        </div>
                                    </td>
                                    <td class="p-0 text-center">
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" data-checkboxes="mygroup"
                                                wire:change="delivered({{$order['id']  }})"
                                                 @if($order['delivered']==true) checked @endif class="custom-control-input"
                                                id="delivered-{{ $order['id'] }}">
                                            <label for="delivered-{{ $order['id'] }}"
                                                class="custom-control-label">&nbsp;</label>
                                        </div>
                                    </td>
                                    <td class="p-0 text-center">
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" data-checkboxes="mygroup"
                                                wire:change="return({{$order['id']  }})" @if ($order['return']==true)
                                                checked @endif class="custom-control-input"
                                                id="return-{{ $order['id'] }}">
                                            <label for="return-{{ $order['id'] }}"
                                                class="custom-control-label">&nbsp;</label>
                                        </div>
                                    </td>
                                    <td class="p-0 text-center">
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" data-checkboxes="mygroup"
                                                wire:change="return_received({{$order['id']  }})"
                                                 @if ($order['return_received']==true) checked @endif
                                                class="custom-control-input" id="return_received-{{ $order['id'] }}">
                                            <label for="return_received-{{ $order['id'] }}"
                                                class="custom-control-label">&nbsp;</label>
                                        </div>
                                    </td>
                                    <td class="p-0 text-center">
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" data-checkboxes="mygroup"
                                                wire:change="handover({{$order['id']  }})"
                                                 @if  ($order['handover']==true) checked @endif class="custom-control-input"
                                                id="handover-{{ $order['id'] }}">
                                            <label for="handover-{{ $order['id'] }}"
                                                class="custom-control-label">&nbsp;</label>
                                        </div>
                                    </td>
                                  
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
