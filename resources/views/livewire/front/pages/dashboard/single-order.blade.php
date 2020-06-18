<div>
    <div class="page-content">
        <div class="cart">
            <div class="container">

                @if ($comment_page == false)

                <div class="row">



                    <div class="col-lg-8 col-md-12">
                        <table class="table table-cart table-mobile">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Product</th>
                                    <th>Price</th>

                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($order->details as $product)
                                @if (!empty($product))

                                <tr>
                                    <td>{{ $product->product->name }}</td>
                                    <td class="product-col">
                                        <div class="product">
                                            <figure class="product-media">
                                                <a href="#">
                                                    <img src="{{ asset('images/'.$product->product->image->first()->url) }}"
                                                        alt="Product image">
                                                </a>
                                            </figure>


                                        </div><!-- End .product -->
                                    </td>
                                    <td class="price-col">TK. {{ $product->price }}</td>

                                    <td class="price-col"> {{ $product->quentity }}</td>
                                    <td class="total-col"> TK. {{ $product->total }}</td>
                                    
                                    @if ($currentComponent == 'DeliveredOder')
                                    <td>
                                        @if ( $product->comment == false)
                                            
                                        <button wire:click.prevent = "go_commentpage({{ $product }})"
                                              class="btn btn-info">Comment</button>
                                              @else 
                                              <p>has Comment </p>
                                        @endif
                                     </td>
                                    @endif
                                </tr>
                                @endif
                                @endforeach


                            </tbody>
                        </table><!-- End .table table-wishlist -->

                        <div class="cart-bottom">

                            <p>Pickup Point : {{isset( $order->pickup->address ) ? $order->pickup->address : 'null' }}
                            </p>
                        </div>
                        <div class="cart-bottom">
                            <p>Shipping Address : {{isset( $order->address ) ? $order->address : 'null' }} </p>
                        </div><!-- End .cart-bottom -->











                    </div><!-- End .col-lg-8 -->


                    <aside class="col-lg-4">
                        <div class="summary summary-cart">
                            <h3 class="summary-title">Cart Total</h3><!-- End .summary-title -->

                            <table class="table table-summary">
                                <tbody>
                                    <tr class="summary-subtotal">
                                        <td>Subtotal:</td>
                                        <td>TK {{ $order->details->sum('total') }}</td>
                                    </tr><!-- End .summary-subtotal -->

                                    <tr class="summary-shipping">
                                        <td>Shipping:</td>
                                        <td>&nbsp;</td>
                                    </tr>

                                    <tr class="summary-shipping-row">
                                        <td>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="free-shipping" name="shipping"
                                                    class="custom-control-input">
                                                <label class="custom-control-label" for="free-shipping">Shipping
                                                    Cost</label>
                                            </div><!-- End .custom-control -->
                                        </td>
                                        <td>TK {{ $order->shipping }}</td>
                                    </tr><!-- End .summary-shipping-row -->
                                    <tr class="summary-subtotal">
                                        <td>Discount:</td>
                                        <td>TK {{ $order->discount }}</td>
                                    </tr><!-- End .summary-subtotal -->

                                    <tr class="summary-total">
                                        <td>Total:</td>


                                        <td>TK {{ $order->details->sum('total') +
                                             $order->shipping - 
                                              $order->discount  }}</td>




                                    </tr><!-- End .summary-total -->

                                </tbody>
                            </table><!-- End .table table-summary -->

                            <table class="table table-summary">
                                <tr class="summary-shipping">
                                    <td>
                                        <button wire:click="backToPendingPage"
                                            class="btn btn-block btn-outline-danger">Back To Pending Order Page</button>
                                    </td>
                                    <td>&nbsp;</td>
                                </tr><!-- End .summary-shipping-estimate -->

                            </table><!-- End .table table-summary -->




                        </div><!-- End .summary -->
                    </aside><!-- End .col-lg-3 -->
                </div><!-- End .row -->
                @else
                    @livewire('front.pages.dashboard.comment' , 
                    ['product' => $product_id_go_to_comment_page
                    ])
                @endif


            </div><!-- End .container -->
        </div><!-- End .cart -->
    </div><!-- End .page-content -->




</div>
