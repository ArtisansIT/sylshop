<div>

    <livewire:front.partials.header-two />

<main class="main">
			<br>
            <div class="page-content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9 col-xl-4-5col">
                            <div class="category-banners-slider  data-toggle="owl" 
                               >
                                <div class="banner banner-poster">
                                    
                                    <a href="#">
                                         <img 
                                            @if(!empty($shop->image->banner)) 
                                            
                                            src="{{ asset('images/'.$shop->image->banner) }}"
                                            @endif
                                         alt="Banner">
                                    </a>

                                   
                                </div><!-- End .banner -->

                               
                            </div><!-- End .owl-carousel -->
							
							<div class="accordion accordion-icon" id="accordion-3">
								<div class="card">
										<div class="card-header" id="heading3-2">
											<h4 class="card-title">
												<a class="collapsed" role="button" data-toggle="collapse" href="#collapse3-2" aria-expanded="false" aria-controls="collapse3-2">
													<i class="icon-star-o"></i>{{ $shop->name }}
												</a>
											</h4>
										</div><!-- End .card-header -->
										<div id="collapse3-2" class="collapse" aria-labelledby="heading3-2" data-parent="#accordion-3">
										<div class="card-body">
											<div class="product-body product-action-inner">
											</div><!-- End .product-body -->
											<p>
                                                {{ $shop->about }}
                                            </p>
										</div><!-- End .card-body -->
									</div><!-- End .collapse -->
								</div><!-- End .card -->
							</div><!-- End .accordion -->
                            <div class="cat-blocks-container">
                                <div class="row">
                                    @foreach ($shop->subcategorys as $subcategory)
                                        
                                    <div class="col-6 col-md-4 col-lg-3">
                                        <a href="category.html" class="cat-block">
                                            <figure>
                                                <span>
                                                    <img src="{{ asset('images/'.$subcategory->image->url) }}" alt="Banner">
                                                </span>
                                            </figure>

                                            <h3 class="cat-block-title">{{ $subcategory->name }}</h3><!-- End .cat-block-title -->
                                        </a>
                                    </div><!-- End .col-6 col-md-4 col-lg-3 -->
                                    @endforeach

                               
                                </div><!-- End .row -->
                            </div><!-- End .cat-blocks-container -->

                            <div class="mb-1"></div><!-- End .mb-2 -->


                            <div class="toolbox">
                                <div class="toolbox-left">
                                    <div class="toolbox-info">
										<b>All Product ({{$shop->products->count()  }})</b><!-- End .title -->
                                    </div><!-- End .toolbox-info -->
                                </div><!-- End .toolbox-left -->

                                {{-- <div class="toolbox-right">
                                    <div class="toolbox-sort">
                                        <label for="sortby">Sort by:</label>
                                        <div class="select-custom">
                                            <select name="sortby" id="sortby" class="form-control">
                                                <option value="popularity" selected="selected">Most Popular</option>
                                                <option value="rating">Most Rated</option>
                                                <option value="date">Date</option>
                                            </select>
                                        </div>
                                    </div><!-- End .toolbox-sort -->
                                </div><!-- End .toolbox-right --> --}}
                            </div><!-- End .toolbox -->

                            <div class="products mb-3">
                                <div class="row">
                                    @foreach ($shop->products as $product)
                                    <div class="col-6 col-md-4 col-xl-3">

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
                                                    <p  wire:click="$emit('addProduct' , {{ $product->id }})"
                                                        class="btn-product addToCart-pointer btn-cart"><span>add to cart</span></p>

                                                    {{-- <a href="popup/quickView.html" class="btn-product btn-quickview"
                                                            title="Quick view"><span>quick view</span></a>
                                                        <a href="#" class="btn-product btn-compare"
                                                            title="Compare"><span>compare</span></a> --}}
                                                </div><!-- End .product-action -->


                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                                <div class="product-cat">
                                                    <a href="#">Furniture</a>
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title"><a href="product.html">{{ $product->name }}</a></h3>
                                                <!-- End .product-title -->
                                                <div class="product-price">
                                                    @if (empty($product->offer_price))

                                                    <span class="new-price">TK{{ $product->main_price }}</span>

                                                    @else

                                                    <span class="new-price">TK{{ $product->offer_price }}</span>
                                                        <span class="old-price">Was TK{{ $product->main_price  }}</span>
                                                    @endif
                                                </div><!-- End .product-price -->
                                                <div class="ratings-container">
                                                    <div class="ratings">
                                                        <div class="ratings-val" style="width: 100%;"></div>
                                                        <!-- End .ratings-val -->
                                                    </div><!-- End .ratings -->
                                                    <span class="ratings-text">( 2 Reviews )</span>
                                                </div><!-- End .rating-container -->
                                                <div class="product-action">
                                                    <input type="number" id="quentity{{ $product->id }}" class="form-control" value="1"
                                                        min="1"  step="1" data-decimals="0" required>
                                                </div><!-- End .product-details-quantity -->
                                            </div><!-- End .product-body -->
                                        </div>
                                        
                                    </div><!-- End .col-sm-6 col-md-4 col-xl-3 -->
                                    @endforeach
                                </div><!-- End .row -->
                            </div><!-- End .products -->

                            <nav aria-label="Page navigation">
                                <ul class="pagination">
                                    <li class="page-item disabled">
                                        <a class="page-link page-link-prev" href="#" aria-label="Previous" tabindex="-1" aria-disabled="true">
                                            <span aria-hidden="true"><i class="icon-long-arrow-left"></i></span>Prev
                                        </a>
                                    </li>
                                    <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item-total">of 2</li>
                                    <li class="page-item">
                                        <a class="page-link page-link-next" href="#" aria-label="Next">
                                            Next <span aria-hidden="true"><i class="icon-long-arrow-right"></i></span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div><!-- End .col-lg-9 -->

                       <aside class="col-lg-3 col-xl-5col order-lg-first">
                            <div class="sidebar sidebar-shop">
                                <div class="widget widget-categories">
                                    <div class="widget-body">
                                        <div class="accordion" id="widget-cat-acc">
                                            <div class="acc-item">
                                                <h5>
                                                    <a role="button"  style="color: #333;">
                                                        Laptops & Computers
                                                    </a>
                                                </h5>
                                                <div  class="collapse show" >
                                                    <div class="collapse-wrap">
                                                        <ul>
                                                            @foreach ($shop->subcategorys as $subcategory)
                                                                
                                                            <li >
                                                                <a href="{{ route('front.single.subcategory', [$subcategory->id , $subcategory->slug ]) }}"
                                                                     style="color: #333;">
                                                                     {{ $subcategory->name }}
                                                                </a>
                                                            </li>
                                                            @endforeach
                                                            
                                                        </ul>
                                                    </div><!-- End .collapse-wrap -->
                                                </div><!-- End .collapse -->
                                            </div><!-- End .acc-item -->

                                         
                                        </div><!-- End .accordion -->
                                    </div><!-- End .widget-body -->
                                </div><!-- End .widget -->

                                {{-- <div class="widget">
                                    <h3 class="widget-title">Brands</h3><!-- End .widget-title -->

                                    <div class="widget-body">
                                        <div class="filter-items">
                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="brand-1">
                                                    <label class="custom-control-label" for="brand-1">Next</label>
                                                </div><!-- End .custom-checkbox -->
                                            </div><!-- End .filter-item -->

                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="brand-2">
                                                    <label class="custom-control-label" for="brand-2">River Island</label>
                                                </div><!-- End .custom-checkbox -->
                                            </div><!-- End .filter-item -->

                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="brand-3">
                                                    <label class="custom-control-label" for="brand-3">Geox</label>
                                                </div><!-- End .custom-checkbox -->
                                            </div><!-- End .filter-item -->

                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="brand-4">
                                                    <label class="custom-control-label" for="brand-4">New Balance</label>
                                                </div><!-- End .custom-checkbox -->
                                            </div><!-- End .filter-item -->

                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="brand-5">
                                                    <label class="custom-control-label" for="brand-5">UGG</label>
                                                </div><!-- End .custom-checkbox -->
                                            </div><!-- End .filter-item -->

                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="brand-6">
                                                    <label class="custom-control-label" for="brand-6">F&F</label>
                                                </div><!-- End .custom-checkbox -->
                                            </div><!-- End .filter-item -->

                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="brand-7">
                                                    <label class="custom-control-label" for="brand-7">Nike</label>
                                                </div><!-- End .custom-checkbox -->
                                            </div><!-- End .filter-item -->

                                        </div><!-- End .filter-items -->
                                    </div><!-- End .widget-body -->
                                </div><!-- End .widget --> --}}

                                {{-- <div class="widget">
                                    <h3 class="widget-title">Price</h3><!-- End .widget-title -->

                                    <div class="widget-body">
                                        <div class="filter-items">
                                            <div class="filter-item">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" id="price-1" name="filter-price">
                                                    <label class="custom-control-label" for="price-1">Under $25</label>
                                                </div><!-- End .custom-checkbox -->
                                            </div><!-- End .filter-item -->

                                            <div class="filter-item">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" id="price-2" name="filter-price">
                                                    <label class="custom-control-label" for="price-2">$25 to $50</label>
                                                </div><!-- End .custom-checkbox -->
                                            </div><!-- End .filter-item -->

                                            <div class="filter-item">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" id="price-3" name="filter-price">
                                                    <label class="custom-control-label" for="price-3">$50 to $100</label>
                                                </div><!-- End .custom-checkbox -->
                                            </div><!-- End .filter-item -->

                                            <div class="filter-item">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" id="price-4" name="filter-price">
                                                    <label class="custom-control-label" for="price-4">$100 to $200</label>
                                                </div><!-- End .custom-checkbox -->
                                            </div><!-- End .filter-item -->

                                            <div class="filter-item">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" id="price-5" name="filter-price">
                                                    <label class="custom-control-label" for="price-5">$200 & Above</label>
                                                </div><!-- End .custom-checkbox -->
                                            </div><!-- End .filter-item -->
                                        </div><!-- End .filter-items -->
                                    </div><!-- End .widget-body -->
                                </div><!-- End .widget --> --}}

                            

                                <div class="widget widget-banner-sidebar">
                                    {{-- <div class="banner-sidebar-title">ad banner 218 x 430px</div> --}}
                                    
                                    <div class="banner-sidebar banner-overlay">
                                        <a href="#">
                                            <img src="{{ asset('user/assets/images/demos/demo-13/banners/banner-6.jpg') }}" alt="banner">
                                        </a>
                                 
                                    </div><!-- End .banner-ad -->
                                </div><!-- End .widget -->
                            </div><!-- End .sidebar sidebar-shop -->
                        </aside><!-- End .col-lg-3 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .page-content -->

 </main><!-- End .main -->

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