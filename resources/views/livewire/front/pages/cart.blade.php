<div>
    <livewire:front.partials.header-two />


    <main class="main">
        <div class="page-header text-center" style="background-image: url('{{ asset('user/assets/images/page-header-bg.jpg') }}')">
            <div class="container">
                <h1 class="page-title">Shopping Cart & Checkout</h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->

        <br>
        <div class="page-content">
            <div class="cart">
                <div class="container">
                    <div class="row">



                        <div class="col-lg-8 col-md-12">
                            <table class="table table-cart table-mobile">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Update</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($cart as $product)
                                    @if (!empty($product))

                                    <tr>
                                        <td>{{ $product->name }}</td>
                                        <td class="product-col">
                                            <div class="product">
                                                <figure class="product-media">
                                                    <a href="#">
                                                        <img src="{{ asset('images/'.$product->image->first()->url) }}"
                                                            alt="Product image">
                                                    </a>
                                                </figure>


                                            </div><!-- End .product -->
                                        </td>
                                        <td class="price-col">TK. {{ $product->price }}</td>
                                        <td class="product-col">
                                            <div class="cart-product-quantity">


                                                <input type="number" class="form-control"
                                                    wire:change="updateQuentity({{ $product->id }} , $event.target.value)"
                                                    min="1" max="100" {{-- wire:click="$refresh" --}} step="1"
                                                    data-decimals="0" required>
                                            </div><!-- End .cart-product-quantity -->
                                        </td>
                                        <td class="price-col"> {{ $product->quentity }}</td>
                                        <td class="total-col"> TK. {{ $product->total }}</td>
                                        <td class="remove-col">
                                            <button wire:click="removeFromCart({{ $product->id }})"
                                                class="btn-remove"><i class="icon-close"></i></button>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach

                                </tbody>
                            </table><!-- End .table table-wishlist -->

                            <div class="cart-bottom">

                                @livewire('front.partials.coupane')

                                <button href="#" wire:click="$emit('empty')"
                                    class="btn btn-outline-dark-2"><span>Refresh</span><i
                                        class="icon-refresh"></i></button>
                            </div><!-- End .cart-bottom -->

                            <h2 class="checkout-title">Shipping Details</h2><!-- End .checkout-title -->
                           
                            @if (!empty($cart))
                                
                            @livewire('front.partials.payment-method')
                            @endif


                        </div><!-- End .col-lg-8 -->


                        <aside class="col-lg-4">
                            <div class="summary summary-cart">
                                <h3 class="summary-title">Cart Total</h3><!-- End .summary-title -->

                                <table class="table table-summary">
                                    <tbody>
                                        <tr class="summary-subtotal">
                                            <td>Subtotal:</td>
                                            <td>TK {{ $total }}</td>
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
                                                        Free</label>
                                                </div><!-- End .custom-control -->
                                            </td>
                                            <td>TK {{ $shipping_cost }}</td>
                                        </tr><!-- End .summary-shipping-row -->
                                        <tr class="summary-subtotal">
                                            <td>Discount:</td>
                                            <td>TK {{ $discount }}</td>
                                        </tr><!-- End .summary-subtotal -->

                                        <tr class="summary-total">
                                            <td>Total:</td>
                                            @empty($grandTotal)

                                            <td>TK {{ $total_with_shiping }}</td>
                                            @else
                                            <td>TK {{ $grandTotal }}</td>

                                            @endempty
                                            {{-- <td>TK {{ $grandTotal }}</td> --}}
                                        </tr><!-- End .summary-total -->
                                        {{-- <tr class="summary-total">
                                            <td>Total:</td>
                                            <td>TK {{ $total }}</td>
                                        </tr><!-- End .summary-total --> --}}
                                    </tbody>
                                </table><!-- End .table table-summary -->

                                <table class="table table-summary">
                                    <tr class="summary-shipping">
                                        <td>Payment Methods:

                                            <div class="accordion-summary" id="accordion-payment">
                                                @foreach ($payments as $payment)

                                                <div class="card">
                                                    <div class="card-header" id="heading-{{ $payment->id }}">
                                                        <h2 class="card-title">
                                                            <a @if($payment->id == $payments->first()->id)

                                                                role="button"
                                                                @else

                                                                class="collapsed"

                                                                @endif

                                                                data-toggle="collapse"
                                                                href="#collapse-{{ $payment->id }}"
                                                                aria-expanded="true"
                                                                aria-controls="collapse-{{ $payment->id }}">
                                                                {{ $payment->name }} payment
                                                            </a>
                                                        </h2>
                                                    </div><!-- End .card-header -->
                                                    <div id="collapse-{{ $payment->id }}"
                                                        class="collapse @if($payment->id == $payments->first()->id) show  @endif "
                                                        aria-labelledby="heading-{{ $payment->id }}"
                                                        data-parent="#accordion-payment">
                                                        <div class="card-body">
                                                            {{$payment->s_details}}
                                                        </div><!-- End .card-body -->
                                                    </div><!-- End .collapse -->
                                                </div><!-- End .card -->
                                                @endforeach


                                            </div><!-- End .accordion -->
                                        </td>
                                        <td>&nbsp;</td>
                                    </tr><!-- End .summary-shipping-estimate -->

                                </table><!-- End .table table-summary -->


                            </div><!-- End .summary -->
                        </aside><!-- End .col-lg-3 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .cart -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->

</div>
@push('scripts')

<script>
    

window.livewire.on('overUpdateCartQuentity', (param) => {
    toastr[param['type']](param['message'],param['type']);
  
});
window.livewire.on('on_address_no_pickup', (param) => {
    toastr[param['type']](param['message'],param['type']);
  
});
    window.livewire.on('empty', () => {
        window.livewire.emit('emptyCart');
    })

</script>
@endpush
