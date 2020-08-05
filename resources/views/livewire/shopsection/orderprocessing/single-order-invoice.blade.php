<div>

    <div class="invoice">
        <div class="invoice-print">
            <div class="row">
                <div class="col-lg-12">
                    <div class="invoice-title">
                        <h2>Invoice</h2>
                        <div class="invoice-number">Order #{{ $order->code }}</div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-md-6">
                            <address>
                                <strong>Billed To:</strong><br>
                                {{ $order->name }}<br>
                                {{!empty( $order->address) ?  $order->address : '' }}<br>
                                {{!empty( $order->mobile) ?  $order->mobile : '' }}<br>


                            </address>
                        </div>
                        <div class="col-md-6 text-md-right">
                            <address>
                                <strong>Shipped To:</strong><br>
                                {{ $order->name }}<br>
                                @if (empty($order->address))
                                Our Pickup Point: {{ $order->pickup->address }}
                                @else
                                {{ $order->address }}<br>
                                @endif

                                {{!empty( $order->mobile) ?  $order->mobile : '' }}<br>
                            </address>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <address>
                                <strong>Payment Method:</strong><br>
                                {{ $order->payment->name }}<br>
                                Number: {{ $order->payment->number }}<br>

                            </address>
                        </div>
                        <div class="col-md-6 text-md-right">
                            <address>
                                <strong>Order Date:</strong><br>
                                {{ $order->created_at->toFormattedDateString() }}<br><br>
                            </address>
                        </div>
                    </div>
                     
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="section-title">Order Summary</div>
                    <p class="section-lead">All items here cannot be deleted.</p>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-md">
                            <tr>
                                <th data-width="40">#</th>
                                <th>Image</th>
                                <th>Item</th>
                                <th>Variation</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Quantity</th>
                                <th class="text-right">Totals</th>
                                <th></th>
                            </tr>

                            @foreach ($order->details as $product)
                            @if (!empty($product))
                            <tr>
                                <td>1</td>
                                <td>
                                    <figure class="avatar  avatar-xl">
                                        <img src="{{ asset('images/'.$product->product->image->first()->url) }}"
                                            alt="Product image">
                                    </figure>
                                </td>
                                <td>{{ $product->product->name }}</td>
                                <td>{{ !empty( $product->variation->name )? $product->variation->name : 'No variation'  }}</td>
                                <td class="text-center">TK. {{ $product->price }}</td>
                                <td class="text-center">{{ $product->quentity }}</td>
                                <td class="text-right">Tk {{ $product->total }}</td>
                            </tr>
                            @endif
                            @endforeach
                        </table>
                    </div>
                    <div class="row mt-4">

                        <div class="col-lg-8">
                          
                           <address>
                                <strong>Payment Method:</strong><br>
                                {{ $order->payment->name }}<br>
                                Number: {{ $order->payment->number }}<br>

                            </address>
                            <p class="section-lead">{{ $order->payment->l_details }}</p>
                        </div>
                        <div class="col-lg-4 text-right">
                            <div class="invoice-detail-item">
                                <div class="invoice-detail-name">Subtotal</div>
                                <div class="invoice-detail-value">TK {{ $order->details->sum('total') }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="text-md-right">
            <div class="float-lg-left mb-lg-0 mb-3">
                {{-- <button class="btn btn-primary btn-icon icon-left"><i class="fas fa-credit-card"></i> Process
                    Payment</button> --}}
                {{-- <button 
                 wire:click="backToPendingPage"
                class="btn btn-danger btn-icon icon-left">
                  <i class="fas fa-times"></i> Back</button> --}}
            </div>
            {{-- <button class="btn btn-warning btn-icon icon-left"><i class="fas fa-print"></i> Print</button> --}}
             <button 
                 wire:click="$emit('Shop_backTo_single_orderrrr')"
                class="btn btn-danger btn-icon icon-left">
                  <i class="fas fa-times"></i> Back</button>
        </div>
    </div>

</div>
