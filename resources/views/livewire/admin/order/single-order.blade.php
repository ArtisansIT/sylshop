<div>
  
    <div class="invoice">
        <div class="invoice-print">
            <div class="row">
                <div class="col-lg-12">
                    <div class="invoice-title">
                        <h2>Invoice</h2>
                        <div class="invoice-number">singleOrder #{{ $singleOrder->code }}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <address>
                                <strong>Billed To:</strong><br>
                                {{ $singleOrder->name }}<br>
                                {{!empty( $singleOrder->address) ?  $singleOrder->address : '' }}<br>
                                {{!empty( $singleOrder->mobile) ?  $singleOrder->mobile : '' }}<br>


                            </address>
                        </div>
                        <div class="col-md-6 text-md-right">
                            <address>
                                <strong>Shipped To:</strong><br>
                                {{ $singleOrder->name }}<br>
                                @if (empty($singleOrder->address))
                                Our Pickup Point: {{ $singleOrder->pickup->address }}
                                @else
                                {{ $singleOrder->address }}<br>
                                @endif

                                {{!empty( $singleOrder->mobile) ?  $singleOrder->mobile : '' }}<br>
                            </address>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <address>
                                <strong>Payment Method:</strong><br>
                                {{ $singleOrder->payment->name }}<br>
                                Number: {{ $singleOrder->payment->number }}<br>

                            </address>
                        </div>
                        <div class="col-md-6 text-md-right">
                            <address>
                                <strong>singleOrder Date:</strong><br>
                                {{ $singleOrder->created_at->toFormattedDateString() }}<br><br>
                            </address>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="section-title">singleOrder Summary</div>
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

                            @foreach ($singleOrder->details as $product)
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
                            
                                <td class="text-right">
                                    @if ( $product->comment == false)
                                    <p>No Comment </p>
                                    {{-- <button
                                     wire:click.prevent = "go_commentpage({{ $product }})"
                                     class="btn btn-primary">Comment</button> --}}
                                    @else
                                    <p>has Comment </p>
                                    @endif
                                </td>
                                
                            </tr>
                            @endif
                            @endforeach
                        </table>
                    </div>
                    <div class="row mt-4">
                        <div class="col-lg-8">
                           <address>
                                <strong>Payment Method:</strong><br>
                                {{ $singleOrder->payment->name }}<br>
                                Number: {{ $singleOrder->payment->number }}<br>

                            </address>
                            <p class="section-lead">{{ $singleOrder->payment->l_details }}</p>
                            {{-- <div class="images">
                                <img src="assets/img/cards/visa.png" alt="visa">
                                <img src="assets/img/cards/jcb.png" alt="jcb">
                                <img src="assets/img/cards/mastercard.png" alt="mastercard">
                                <img src="assets/img/cards/paypal.png" alt="paypal">
                            </div> --}}
                        </div>
                        <div class="col-lg-4 text-right">
                            <div class="invoice-detail-item">
                                <div class="invoice-detail-name">Subtotal</div>
                                <div class="invoice-detail-value">TK {{ $singleOrder->details->sum('total') }}</div>
                            </div>
                            <div class="invoice-detail-item">
                                <div class="invoice-detail-name">Shipping</div>
                                <div class="invoice-detail-value">TK {{ $singleOrder->shipping }}</div>
                            </div>
                            <div class="invoice-detail-item">
                                <div class="invoice-detail-name">Discount</div>
                                <div class="invoice-detail-value">TK {{ $singleOrder->discount }}</div>
                            </div>
                            <hr class="mt-2 mb-2">
                            <div class="invoice-detail-item">
                                <div class="invoice-detail-name">Total</div>
                                <div class="invoice-detail-value invoice-detail-value-lg">
                                  TK {{ $singleOrder->details->sum('total') +
                                             $singleOrder->shipping - 
                                              $singleOrder->discount  }}
                                </div>
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
                 wire:click="backToPage"
                class="btn btn-danger btn-icon icon-left">
                  <i class="fas fa-times"></i> Back</button>
        </div>
    </div>

    

</div>
