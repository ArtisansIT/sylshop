<div>
    <livewire:front.partials.header-two />
    <main class="main">
        <div class="page-header text-center"
            style="background-image: url('{{ asset('user/assets/images/page-header-bg.jpg') }}')">
            <div class="container">
                <h1 class="page-title">Shop <span>List</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="toolbox">

                            <div class="toolbox-right">
                                <div class="toolbox-sort">
                                    <label for="sortby">Sort by:</label>
                                    <div class="select-custom">
                                        <select name="sortby" id="sortby" class="form-control">
                                            <option value="popularity" selected="selected">Popular Category</option>
                                            <option value="rating">Main Category</option>
                                            <option value="rating">Main Category1</option>
                                            <option value="rating">Main Category2</option>
                                            <option value="rating">Main Category3</option>
                                            <option value="rating">Main Category4</option>
                                            <option value="rating">Main Category5</option>
                                        </select>
                                    </div>
                                </div><!-- End .toolbox-sort -->
                            </div><!-- End .toolbox-right -->
                        </div><!-- End .toolbox -->

                        @foreach ($shops as $shop)

                        <div class="product product-list">
                            <div class="row">
                                <div class="col-6 col-lg-3">
                                    <figure class="product-media">
                                        {{-- <span class="product-label label-new">New</span> --}}
                                        <a href="product.html">
                                            <img src="{{ asset('images/'.$shop->image->url) }}" class="product-image">
                                        </a>
                                    </figure><!-- End .product-media -->
                                </div><!-- End .col-sm-6 col-lg-3 -->

                                <div class="col-6 col-lg-3 order-lg-last">
                                    <div class="product-list-action">
                                        <div class="product-price">
                                            {{ $shop->address }}
                                        </div><!-- End .product-price -->
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 20%;"></div>
                                                <!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( 2 Reviews )</span>
                                        </div><!-- End .rating-container -->
                                        <div class="product-action">
                                            <a href="popup/quickView.html" class="btn-product btn-quickview"
                                                title="All view"><span>40 view</span></a>
                                            <a href="#" class="btn-product btn-compare"
                                                title="Shop Chat"><span>Chat</span></a>
                                            <a href="#" class="btn-product btn-wishlist"
                                                title="Love"><span>wishlist</span></a>
                                        </div><!-- End .product-action -->
                                        <a href="{{ route('front.single.shop',[$shop->id , $shop->slug]) }}"
                                            class="btn-product btn-cart"><span>Go
                                                Shop</span></a>
                                    </div><!-- End .product-list-action -->
                                </div><!-- End .col-sm-6 col-lg-3 -->

                                <div class="col-md-6">
                                    <div class="accordion accordion-icon" id="accordion-3">

                                        <div class="card">
                                            <div class="card-header" id="heading3-2">
                                                <h4 class="card-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse"
                                                        href="#collapse3-2" aria-expanded="false"
                                                        aria-controls="collapse3-2">
                                                        <i class="icon-star-o"></i>{{$shop->name  }}
                                                    </a>
                                                </h4>
                                            </div><!-- End .card-header -->
                                            <div id="collapse3-2" class="collapse" aria-labelledby="heading3-2"
                                                data-parent="#accordion-3">
                                                <div class="card-body">
                                                    <div class="product-body product-action-inner">
                                                        <div class="product-cat">
                                                            <a href="#">Shipping Fee:
                                                                <span>{{ $shop->shipping }}</span></a>
                                                        </div><!-- End .product-cat -->
                                                    </div><!-- End .product-body -->
                                                    <p>{{ $shop->details }} </p>
                                                </div><!-- End .card-body -->
                                            </div><!-- End .collapse -->
                                        </div><!-- End .card -->
                                    </div><!-- End .accordion -->
                                </div><!-- End .col-md-6 -->
                            </div><!-- End .row -->
                        </div><!-- End .product -->
                        @endforeach

                    </div><!-- End .products -->

                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                            <li class="page-item disabled">
                                <a class="page-link page-link-prev" href="#" aria-label="Previous" tabindex="-1"
                                    aria-disabled="true">
                                    <span aria-hidden="true"><i class="icon-long-arrow-left"></i></span>Prev
                                </a>
                            </li>
                            <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item-total">of 6</li>
                            <li class="page-item">
                                <a class="page-link page-link-next" href="#" aria-label="Next">
                                    Next <span aria-hidden="true"><i class="icon-long-arrow-right"></i></span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div><!-- End .col-lg-9 -->

            </div><!-- End .row -->
        </div><!-- End .container -->
</div><!-- End .page-content -->
</main><!-- End .main -->
</div>


{{-- @push('scripts')
<script>
    window.onscroll = function (ev) {
        if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
            // alert('dfdfdf')
            window.livewire.emit('loadMore')
        }
    };

</script>
@endpush --}}
