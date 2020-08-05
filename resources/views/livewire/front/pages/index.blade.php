<div>

    <livewire:front.partials.header />

    <main class="main">
        {{-- <div class="mb-1"></div> --}}
        @include('user/partials/slider')
        <div class="mb-4"></div><!-- End .mb-2 -->

        {{-- {{ dd($dealCategory) }} --}}

        <div class="container">
            <h2 class="title text-center mb-2">Explore Popular Categories</h2><!-- End .title -->

            <div class="cat-blocks-container">
                <div class="row">

                    @foreach ($categorys as $category)

                    <div class="col-6 col-sm-4 col-lg-2">
                        <a href="{{ route('front.category',[$category->id,$category->name]) }}" class="cat-block">
                            <figure>
                                <span>
                                    <img src="{{ asset('images/'.$category->image->url) }}" alt="Category image">
                                </span>
                            </figure>

                            <h3 class="cat-block-title">{{ $category->name }}</h3><!-- End .cat-block-title -->
                        </a>
                    </div><!-- End .col-sm-4 col-lg-2 -->
                    @endforeach


                </div><!-- End .row -->
            </div><!-- End .cat-blocks-container -->
        </div><!-- End .container -->

        <div class="mb-2"></div><!-- End .mb-2 -->


        <div class="mb-3"></div><!-- End .mb-3 -->

        <div class="bg-light pt-3 pb-5">
            <div class="container">
                <div class="heading heading-flex heading-border mb-3">
                    <div class="heading-left">
                        <h2 class="title">Hot Deals Products</h2><!-- End .title -->
                    </div><!-- End .heading-left -->

                    <div class="heading-right">
                        <ul class="nav nav-pills nav-border-anim justify-content-center" role="tablist">
                            @foreach ($dealCategory as $category)

                            <li class="nav-item">
                                <a class="nav-link @if($category->id == $firstCategory->id)  active  @endif"
                                    id="{{ $category->id }}-link" data-toggle="tab" href="#category-{{ $category->id }}"
                                    role="tab" aria-controls="category-{{ $category->id }}"
                                    aria-selected=" @if($category->id ==  $firstCategory->id)true @else false  @endif">
                                    {{ $category->name }}
                                </a>
                            </li>
                            @endforeach

                        </ul>
                    </div><!-- End .heading-right -->
                </div><!-- End .heading -->

                <div class="tab-content tab-content-carousel">

                    @foreach ($dealCategory as $category)

                    <div class="tab-pane p-0 fade @if($category->id ==  $firstCategory->id) show active @endif  "
                        id="category-{{ $category->id }}" role="tabpanel" aria-labelledby="{{ $category->id }}-link">
                        <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow"
                            data-toggle="owl" data-owl-options='{
                        "nav": false, 
                        "dots": true,
                        "margin": 20,
                        "loop": false,
                        "responsive": {
                            "0": {
                                "items":2
                            },
                            "480": {
                                "items":2
                            },
                            "768": {
                                "items":3
                            },
                            "992": {
                                "items":4
                            },
                            "1280": {
                                "items":5,
                                "nav": true
                            }
                        }
                    }'>

                            @foreach ($category->products as $product)

                          <div class="product product-5 text-center">
                                <figure class="product-media">
                                    {{-- <span class="product-label label-sale">Sale</span> --}}
                                    <a href="{{ route('front.product',[$product->id , $product->slug]) }}">
                                        <img src="{{ asset('images/'.$product->image->first()->url) }}"
                                            alt="Product image" class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        {{-- <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to
                                                wishlist</span></a> --}}
                                    </div><!-- End .product-action -->

                                    <div class="product-action action-icon-top">
                                        @if ($product->stock_status == false)
                                            
                                        <p href="#"
                                        wire:click="$emit('addProduct' , {{ $product->id }})"
                                        class="btn-product addToCart-pointer btn-cart"><span>add to cart</span></p>

                                        @else
                                            
                                        <p href="#"
                                      
                                        class="btn-product addToCart "><span>Sold Out</span></p>
                                        @endif


                                        
                                        {{-- <a href="popup/quickView.html" class="btn-product btn-quickview"
                                            title="Quick view"><span>quick view</span></a>
                                        <a href="#" class="btn-product btn-compare"
                                            title="Compare"><span>compare</span></a> --}}
                                    </div><!-- End .product-action -->


                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                   <div class="product-cat">
                                      <a href="{{ route('front.category', $product->category_link) }}">
                                                    
                                                    {{  $product->category_name }}</a>
                                    </div><!-- End .product-cat -->
                                   <h3 class="product-title">
                                        <a href="{{ route('front.product',[$product->id , $product->slug]) }}">
                                            {{ $product->name }}
                                         </a>
                                     </h3>

                                       <p class="product-cat font-weight-bold">
                                        <span> Code :</span>
                                        <span class="new-price">{{ $product->code }}</span>
                                    </p>
                                    <!-- End .product-title -->
                                    <div class="product-price">
                                        @if (empty($product->offer_price))

                                        <span class="new-price">TK{{ $product->main_price }}</span>

                                        @else

                                        <span class="new-price">TK{{ $product->offer_price }}</span>
                                        <span class="old-price">TK{{ $product->main_price  }}</span>
                                        @endif
                                    </div><!-- End .product-price -->
                                    <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: {{ $product->max_rating }}0%;"></div>
                                            <!-- End .ratings-val -->
                                        </div><!-- End .ratings -->
                                        <span class="ratings-text">(  {{ $product->comment_count }} Reviews )</span>
                                    </div><!-- End .rating-container -->
                                     <div class="product-action">
                                                    <input type="number" id="quentity{{ $product->id }}"
                                                        class="form-control" value="1" min="1"  step="1"
                                                        data-decimals="0" required>
                                                </div><!-- End .product-details-quantity -->
                                </div><!-- End .product-body -->
                            </div>
                            @endforeach


                        </div><!-- End .owl-carousel -->
                    </div><!-- .End .tab-pane -->
                    @endforeach

                </div><!-- End .tab-content -->
            </div><!-- End .container -->
        </div><!-- End .bg-light pt-5 pb-5 -->

        <div class="mb-3"></div><!-- End .mb-3 -->
        @foreach ($categorys as $category)

        <div class="container electronics">
            <div class="heading heading-flex heading-border mb-3">
                <div class="heading-left">
                    <h2 class="title">{{ $category->name }}</h2><!-- End .title -->
                </div><!-- End .heading-left -->


            </div><!-- End .heading -->

            <div class="tab-content tab-content-carousel">
                <div class="tab-pane p-0 fade show active" id="elec-new-tab" role="tabpanel"
                    aria-labelledby="elec-new-link">
                    <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                        data-owl-options='{
                "nav": false, 
                "dots": true,
                "margin": 20,
                "loop": false,
                "responsive": {
                    "0": {
                        "items":2
                    },
                    "480": {
                        "items":2
                    },
                    "768": {
                        "items":3
                    },
                    "992": {
                        "items":4
                    },
                    "1280": {
                        "items":5,
                        "nav": true
                    }
                }
            }'>

                        @foreach ($category->products as $product)

                       
                         <div class="product product-5 text-center">
                                <figure class="product-media">
                                    {{-- <span class="product-label label-sale">Sale</span> --}}
                                    <a href="{{ route('front.product',[$product->id , $product->slug]) }}">
                                        <img src="{{ asset('images/'.$product->image->first()->url) }}" alt="Product image"
                                            class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        {{-- <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to
                                                wishlist</span></a> --}}
                                    </div><!-- End .product-action -->

                                    <div class="product-action action-icon-top">
                                        @if ($product->stock_status == false)
                                                
                                            <p href="#"
                                            wire:click="$emit('addProduct' , {{ $product->id }})"
                                            class="btn-product addToCart-pointer btn-cart"><span>add to cart</span></p>

                                            @else
                                                
                                            <p href="#"
                                        
                                            class="btn-product addToCart "><span>Sold Out</span></p>
                                            @endif

                                        {{-- <a href="popup/quickView.html" class="btn-product btn-quickview"
                                                title="Quick view"><span>quick view</span></a>
                                            <a href="#" class="btn-product btn-compare"
                                                title="Compare"><span>compare</span></a> --}}
                                    </div><!-- End .product-action -->


                                </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                      <a href="{{ route('front.category', $product->category_link) }}">
                                                    
                                                    {{  $product->category_name }}</a>
                                    </div><!-- End .product-cat -->
                               <h3 class="product-title">
                                        <a href="{{ route('front.product',[$product->id , $product->slug]) }}">
                                            {{ $product->name }}
                                         </a>
                                     </h3>

                                       <p class="product-cat font-weight-bold">
                                        <span> Code :</span>
                                        <span class="new-price">{{ $product->code }}</span>
                                    </p>
                                <!-- End .product-title -->
                                <div class="product-price">
                                    @if (empty($product->offer_price))

                                    <span class="new-price">TK{{ $product->main_price }}</span>

                                    @else

                                     <span class="new-price">TK{{ $product->offer_price }}</span>
                                        <span class="old-price">TK{{ $product->main_price  }}</span>
                                    @endif
                                </div><!-- End .product-price -->
                                <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: {{ $product->max_rating }}0%;"></div>
                                            <!-- End .ratings-val -->
                                        </div><!-- End .ratings -->
                                        <span class="ratings-text">(  {{ $product->comment_count }} Reviews )</span>
                                    </div><!-- End .rating-container -->
                               <div class="product-action">
                                                    <input type="number" id="quentity{{ $product->id }}"
                                                        class="form-control" value="1" min="1"  step="1"
                                                        data-decimals="0" required>
                                                </div><!-- End .product-details-quantity -->
                            </div><!-- End .product-body -->
                        </div>
                        
                        @endforeach


                    </div><!-- End .owl-carousel -->
                </div><!-- .End .tab-pane -->

            </div><!-- End .tab-content -->
        </div><!-- End .container -->
        @endforeach

        <div class="mb-3"></div><!-- End .mb-3 -->
    </main>
</div>


@push('scripts')
<script>

window.livewire.on('addToCartToastMessage', (param) => {
    toastr[param['type']](param['message'],param['type']);
  
});
    window.livewire.on('cartOverload', (param) => {
    toastr[param['type']](param['message'],param['type']);
  
});
    window.livewire.on('addProduct', id => {
        let quentity = parseInt(document.getElementById('quentity' + id).value);
        quentity > 0 ? window.livewire.emit('add', id, quentity) :
            window.livewire.emit('add', id, 1)
    });

</script>








@endpush
