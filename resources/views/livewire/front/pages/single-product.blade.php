<div>

    <livewire:front.partials.header-two />

    <main class="main">

        <div class="mb-4"></div>
        <div class="page-content">
            <div class="container">
                <div class="product-details-top">
                    <div class="bg-light pb-5 mb-4">
                        <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
                            <div class="container d-flex align-items-center">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Products</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Gallery</li>
                                </ol>

                                <nav class="product-pager ml-auto" aria-label="Product">
                                    <a class="product-pager-link product-pager-prev" href="#" aria-label="Previous"
                                        tabindex="-1">
                                        <i class="icon-angle-left"></i>
                                        <span>Prev</span>
                                    </a>

                                    <a class="product-pager-link product-pager-next" href="#" aria-label="Next"
                                        tabindex="-1">
                                        <span>Next</span>
                                        <i class="icon-angle-right"></i>
                                    </a>
                                </nav><!-- End .pager-nav -->
                            </div><!-- End .container -->
                        </nav><!-- End .breadcrumb-nav -->
                        <div class="container">
                            <div class="product-gallery-carousel owl-carousel owl-full owl-nav-dark">
                                @foreach ($product->image as $data)

                                <figure class="product-gallery-image">
                                    <img src="{{ asset('images/'.$data->url) }}"
                                        data-zoom-image="{{ asset('images/'.$data->url) }}" alt="product image">
                                </figure><!-- End .product-gallery-image -->
                                @endforeach


                            </div><!-- End .owl-carousel -->
                        </div><!-- End .container -->
                    </div><!-- End .bg-light pb-5 -->
                    <div class="mt-5"></div>

                    @livewire('front.partials.cart-row')


                    <div class="mb-5"></div>
                    <div class="product-details product-details-centered product-details-separator">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <h1 class="product-title">{{ $product->name }}</h1><!-- End .product-title -->

                                    <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                        </div><!-- End .ratings -->
                                        <a class="ratings-text" href="#product-review-link" id="review-link">( 2 Reviews
                                            )</a>
                                    </div><!-- End .rating-container -->

                                    @livewire('front.partials.change-variation', [
                                    'product' => $product
                                    ])
                                </div><!-- End .col-md-6 -->

                                <div class="col-md-6">

                                    <div>
                                        <div class="product-details-action">
                                            <div class="details-action-col">


                                                <div class="product-details-quantity">
                                                    <input type="number" id="quentity{{ $product->id }}"
                                                        class="form-control" value="1" min="1" max="100" step="1"
                                                        data-decimals="0" required>
                                                </div><!-- End .product-details-quantity -->

                                                <button wire:click="$emit('addProduct' , {{ $product->id }})"
                                                    class="btn-product btn-cart"><span>add
                                                        to
                                                        cart</span></button>



                                            </div><!-- End .details-action-col -->

                                           
                                                 @livewire('front.partials.product-like', [
                                    'product' => $product->id
                                    ])
                                             
                                        </div><!-- End .product-details-action -->
                                    </div>
                                    {{-- @livewire('front.partials.add-to-cart', [
                                      'product' => $product
                                  ]) --}}

                                    <div class="product-details-footer details-footer-col">
                                        <div class="product-cat">
                                            <span>Category:</span>
                                            <a
                                                href="{{ route('front.category',[$product->category->id,$product->category->slug]) }}">{{$product->category->name  }}</a>,
                                            <a href="#">{{$product->subcategory->name  }}</a>
                                            <a href="#">{{$product->shop->name  }}</a>,
                                        </div><!-- End .product-cat -->

                                        <div class="social-icons social-icons-sm">
                                            <span class="social-label">Share:</span>
                                            <a href="" class="social-icon" title="Facebook" target="_blank"><i
                                                    class="icon-facebook-f"></i></a>
                                            <a href="" class="social-icon" title="Twitter" target="_blank"><i
                                                    class="icon-twitter"></i></a>
                                            <a href="" class="social-icon" title="Instagram" target="_blank"><i
                                                    class="icon-instagram"></i></a>
                                            <a href="" class="social-icon" title="Pinterest" target="_blank"><i
                                                    class="icon-pinterest"></i></a>
                                        </div>
                                    </div><!-- End .product-details-footer -->
                                </div><!-- End .col-md-6 -->
                            </div><!-- End .row -->
                        </div><!-- End .container -->
                    </div><!-- End .product-details -->
                </div><!-- End .product-details-top -->

                <div class="product-details-tab">
                    <ul class="nav nav-pills justify-content-center" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab"
                                role="tab" aria-controls="product-desc-tab" aria-selected="true">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="product-info-link" data-toggle="tab" href="#product-info-tab"
                                role="tab" aria-controls="product-info-tab" aria-selected="false">Additional
                                information</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="product-shipping-link" data-toggle="tab"
                                href="#product-shipping-tab" role="tab" aria-controls="product-shipping-tab"
                                aria-selected="false">Shipping & Returns</a>
                        </li>

                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel"
                            aria-labelledby="product-desc-link">
                            <div class="product-desc-content">
                                <h3>Product Information</h3>
                                <p>
                                    {{$product->short_description  }}
                                </p>

                            </div><!-- End .product-desc-content -->
                        </div><!-- .End .tab-pane -->
                        <div class="tab-pane fade" id="product-info-tab" role="tabpanel"
                            aria-labelledby="product-info-link">
                            <div class="product-desc-content">
                                <h3>Information</h3>

                                <p>
                                    {{$product->long_description  }}
                                </p>
                            </div><!-- End .product-desc-content -->
                        </div><!-- .End .tab-pane -->
                        <div class="tab-pane fade" id="product-shipping-tab" role="tabpanel"
                            aria-labelledby="product-shipping-link">
                            <div class="product-desc-content">
                                <h3>Delivery & returns</h3>
                                <p>
                                    {{$product->ship_return  }}
                                </p>
                            </div><!-- End .product-desc-content -->
                        </div><!-- .End .tab-pane -->

                    </div><!-- End .tab-content -->
                </div><!-- End .product-details-tab -->

                <h2 class="title text-center mb-4">You May Also Like</h2><!-- End .title text-center -->

                <div class="products mb-3">
                    <div class="row justify-content-center">

                        @foreach ($relatedproduct as $data)

                        <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                            <div class="product product-7 text-center">
                                <figure class="product-media">
                                    <span class="product-label label-new">New</span>
                                    <a href="{{ route('front.product',[$data->id , $data->slug]) }}">
                                        <img src="{{ asset('images/'.$data->image->first()->url) }}" alt="Product image"
                                            class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to
                                                wishlist</span></a>
                                        <a href="popup/quickView.html" class="btn-product-icon btn-quickview"
                                            title="Quick view"><span>Quick view</span></a>
                                        <a href="#" class="btn-product-icon btn-compare"
                                            title="Compare"><span>Compare</span></a>
                                    </div><!-- End .product-action-vertical -->

                                    <div class="product-action">
                                        <p wire:click="$emit('addFromSameType',{{ $data->id }})"
                                            class="btn-product product addToCart-pointer btn-cart"><span>add to cart</span></p>

                                             
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <a
                                            href="{{ route('front.category',[$data->category->id,$data->category->slug]) }}">{{$data->category->name  }}</a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a
                                            href="{{ route('front.product',[$data->id , $data->slug]) }}">{{ $data->name }}
                                        </a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        @if (empty($data->offer_price))

                                        <span class="new-price">TK{{ $data->main_price }}</span>

                                        @else

                                        <span class="new-price">TK{{ $data->offer_price }}</span>
                                        <span class="old-price">Was TK{{ $data->main_price  }}</span>
                                        @endif
                                    </div><!-- End .product-price -->
                                    <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 20%;"></div><!-- End .ratings-val -->
                                        </div><!-- End .ratings -->
                                        <span class="ratings-text">( 2 Reviews )</span>
                                    </div><!-- End .rating-container -->

                                    <div class="product-nav product-nav-thumbs">
                                        @foreach ($data->image as $image)

                                        <a href="#">
                                            <img src="{{ asset('images/'.$image->url) }}" alt="product desc">
                                        </a>
                                        @endforeach

                                    </div><!-- End .product-nav -->
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->
                        </div><!-- End .col-sm-6 col-lg-4 col-xl-3 -->
                        @endforeach




                    </div><!-- End .row -->
                </div><!-- End .products -->
            </div><!-- End .container -->
        </div><!-- End .page-content -->
    </main>
</div>

@push('scripts')
<script>
    window.livewire.on('addToCartToastMessage', (param) => {
        toastr[param['type']](param['message'], param['type']);

    });

     window.livewire.on('cartOverload', (param) => {
    toastr[param['type']](param['message'],param['type']);
  
});
    window.livewire.on('addProduct', id => {
        let quentity = parseInt(document.getElementById('quentity' + id).value);
        quentity > 0 ? window.livewire.emit('add', id, quentity) :
            window.livewire.emit('add', id, 1)
    });

    window.livewire.on('addFromSameType', id => {
        // let quentity = parseInt(document.getElementById('quentity' + id).value);
        window.livewire.emit('add', id, 1)
    });

</script>

@endpush
