<div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Name Product Table | </h4>


                    <div class="card-header-form">

                        <button wire:click="$emit('backToMyaccountIndexFromSingle')"
                            class="btn btn-danger btn-icon icon-left">
                            <i class="fas fa-times"></i> Back
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                            <tr>
                                <th data-width="100">#</th>
                                <th>Product Name</th>
                                <th>Variations</th>
                                <th class="text-center">Order NO</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Quantity</th>
                                <th class="text-right">Total</th>
                                <th class="text-right">Date & Time</th>
                            </tr>
                            <tbody>
                                @foreach ($order_details as $order_item)

                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>
                                       @empty($order_item->variation)
                                           
                                       <button wire:click="$emit('singleProduct',{{ $order_item->product->id }},null)"
                                           class="btn btn-info">
                                           {{ $order_item->product->code }}
                                       </button>
                                       @else 
                                        <button wire:click="$emit('singleProduct',{{ $order_item->product->id }},{{ $order_item->variation->id }})"
                                           class="btn btn-info">
                                           {{ $order_item->product->code }}
                                       </button>
                                       @endempty
                                    </td>
                                    <td>{{ !empty($order_item->variation) ? 
                                     $order_item->variation->name :
                                    'No variation'}}

                                    </td>
                                    <td>
                                        {{ $order_item->order->code }}
                                    </td>

                                    <td class="text-center">৳{{ $order_item->price }}</td>

                                    <td class="text-center">{{ $order_item->quentity }}</td>
                                    <td class="text-center">৳{{ $order_item->total }}</td>

                                    <td class="text-right">
                                        {{ $order_item->created_at->toFormattedDateString() }}
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
