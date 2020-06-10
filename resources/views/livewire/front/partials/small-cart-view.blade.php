<div>
       <div class="dropdown-menu dropdown-menu-right">
            <div class="dropdown-cart-products">
                {{-- {{ dd($cart) }} --}}
                @foreach ($cart as $product)

                <div class="product">
                    <div class="product-cart-details">
                        <h4 class="product-title">
                            <a href="product.html">
                                @if(!empty($product))
                                    {{ $product->name }}

                                @endif
                            
                            </a>
                        </h4>

                        <span class="cart-product-info">
                            <span class="cart-product-qty">{{ $product['quentity'] }}</span>
                            x TK {{ $product['price'] }}
                              = TK {{ $product['total'] }}
                        </span>
                    </div><!-- End .product-cart-details -->

                    <figure class="product-image-container">
                        <a href="product.html" class="product-image">
                            @if(!empty($product))
                                    <img src="{{ asset('images/'.$product->image->first()->url) }}"

                                @endif
                            alt="product">
                        </a>
                    </figure>
                    <button href="#"
                     class="btn-remove"
                     wire:click="removeProduct({{ $product->id }})"
                      title="Remove Product"><i class="icon-close"></i></button>
                </div><!-- End .product -->
                @endforeach


            </div><!-- End .cart-product -->

            <div class="dropdown-cart-total">
                <span>Total</span>

                <span class="cart-total-price">TK {{ $total }}</span>
            </div><!-- End .dropdown-cart-total -->

            <div class="dropdown-cart-action">
                <a href="{{ route('front.cart') }}" class="btn btn-primary">View Cart</a>
               
                <a href="checkout.html" class="btn btn-outline-primary-2"><span>Checkout</span><i
                        class="icon-long-arrow-right"></i></a>
            </div><!-- End .dropdown-cart-total -->
        </div><!-- End .dropdown-menu -->
</div>
