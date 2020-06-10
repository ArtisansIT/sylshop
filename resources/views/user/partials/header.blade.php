<header class="header header-10 header-intro-clearance">
    <div class="header-top">
        <div class="container">
            <div class="header-left">
                <a href="tel:#"><i class="icon-phone"></i>Call: +0123 456 789</a>
            </div><!-- End .header-left -->

            <div class="header-right">

                <ul class="top-menu">
                    <li>
                        <a href="#">Links</a>
                        <ul>
                            
                            {{-- <li>   
                                <div class="header-dropdown">
                                    <a href="#">Engligh</a>
                                    <div class="header-menu">
                                        <ul>
                                            <li><a href="#">English</a></li>
                                            <li><a href="#">French</a></li>
                                            <li><a href="#">Spanish</a></li>
                                        </ul>
                                    </div><!-- End .header-menu -->
                                </div><!-- End .header-dropdown -->
                            </li> --}}
                            <li class="login">
                                @auth
                                <a  href="{{ route('login') }}">Dashboard</a>
                                @else 

                                <a  href="{{ route('login') }}">Sign in / Sign up</a>
                                @endauth
                            </li>
                        </ul>
                    </li>
                </ul><!-- End .top-menu -->
            </div><!-- End .header-right -->
        </div><!-- End .container -->
    </div><!-- End .header-top -->

    <div class="header-middle">
        <div class="container">
            <div class="header-left">
                <button class="mobile-menu-toggler">
                    <span class="sr-only">Toggle mobile menu</span>
                    <i class="icon-bars"></i>
                </button>
                
                <a href="index.html" class="logo">
                    <img src="{{ asset('user/assets/images/demos/demo-13/logo.png') }}" alt="Molla Logo"  width="105" height="25">
                </a>
            </div><!-- End .header-left -->

            <div class="header-center">
                <div class="header-search header-search-extended header-search-visible header-search-no-radius d-none d-lg-block">
                    <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                    <form action="#" method="get">
                        <div class="header-search-wrapper search-wrapper-wide">
                            <label for="q" class="sr-only">Search</label>
                            <input type="search" class="form-control" name="q" id="q" placeholder="Search product ..." required>
                            <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
                        </div><!-- End .header-search-wrapper -->
                    </form>
                </div><!-- End .header-search -->
            </div>

            <div class="header-right">
                <div class="header-dropdown-link">
                   
                    <a href="wishlist.html" class="wishlist-link">
                        <i class="icon-heart-o"></i>
                        <span class="wishlist-count">3</span>
                        <span class="wishlist-txt">Wishlist</span>
                    </a>

                    <div class="dropdown cart-dropdown">
                        <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                            <i class="icon-shopping-cart"></i>
                            <span class="cart-count">2</span>
                            <span class="cart-txt">Cart</span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-cart-products">
                                <div class="product">
                                    <div class="product-cart-details">
                                        <h4 class="product-title">
                                            <a href="product.html">Beige knitted elastic runner shoes</a>
                                        </h4>

                                        <span class="cart-product-info">
                                            <span class="cart-product-qty">1</span>
                                            x $84.00
                                        </span>
                                    </div><!-- End .product-cart-details -->

                                    <figure class="product-image-container">
                                        <a href="product.html" class="product-image">
                                            <img src="{{ asset('user/assets/images/products/cart/product-1.jpg') }}" alt="product">
                                        </a>
                                    </figure>
                                    <a href="#" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
                                </div><!-- End .product -->

                                <div class="product">
                                    <div class="product-cart-details">
                                        <h4 class="product-title">
                                            <a href="product.html">Blue utility pinafore denim dress</a>
                                        </h4>

                                        <span class="cart-product-info">
                                            <span class="cart-product-qty">1</span>
                                            x $76.00
                                        </span>
                                    </div><!-- End .product-cart-details -->

                                    <figure class="product-image-container">
                                        <a href="product.html" class="product-image">
                                            <img src="{{ asset('user/assets/images/products/cart/product-2.jpg') }}" alt="product">
                                        </a>
                                    </figure>
                                    <a href="#" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
                                </div><!-- End .product -->
                            </div><!-- End .cart-product -->

                            <div class="dropdown-cart-total">
                                <span>Total</span>

                                <span class="cart-total-price">$160.00</span>
                            </div><!-- End .dropdown-cart-total -->

                            <div class="dropdown-cart-action">
                                <a href="cart.html" class="btn btn-primary">View Cart</a>
                                <a href="checkout.html" class="btn btn-outline-primary-2"><span>Checkout</span><i class="icon-long-arrow-right"></i></a>
                            </div><!-- End .dropdown-cart-total -->
                        </div><!-- End .dropdown-menu -->
                    </div><!-- End .cart-dropdown -->
                </div>
            </div><!-- End .header-right -->
        </div><!-- End .container -->
    </div><!-- End .header-middle -->

    <div class="header-bottom sticky-header">
        <div class="container">
            <div class="header-left">
                <div class="dropdown category-dropdown show is-on" data-visible="true">
                    <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" data-display="static" title="Browse Categories">
                        Browse Categories
                    </a>

                    <div class="dropdown-menu show">
                        <nav class="side-nav">
                            <ul class="menu-vertical sf-arrows">
                                <li class="megamenu-container">
                                    <a class="sf-with-ul" href="#">Electronics</a>

                                    <div class="megamenu">
                                        <div class="row no-gutters">
                                            <div class="col-md-8">
                                                <div class="menu-col">
                                                    
                                                            <div class="menu-title">Laptops & Computers</div><!-- End .menu-title -->
                                                            <ul>
                                                                <li><a href="#">Desktop Computers</a></li>
                                                                <li><a href="#">Monitors</a></li>
                                                                <li><a href="#">Laptops</a></li>
                                                                <li><a href="#">iPad & Tablets</a></li>
                                                                <li><a href="#">Hard Drives & Storage</a></li>
                                                                <li><a href="#">Printers & Supplies</a></li>
                                                                <li><a href="#">Computer Accessories</a></li>
                                                            </ul>

                                                            <div class="menu-title">TV & Video</div><!-- End .menu-title -->
                                                            <ul>
                                                                <li><a href="#">TVs</a></li>
                                                                <li><a href="#">Home Audio Speakers</a></li>
                                                                <li><a href="#">Projectors</a></li>
                                                                <li><a href="#">Media Streaming Devices</a></li>
                                                            </ul>
                                                     
                                                </div><!-- End .menu-col -->
                                            </div><!-- End .col-md-8 -->

                                           d .col-md-4 -->
                                        </div><!-- End .row -->
                                    </div><!-- End .megamenu -->
                                </li>
                               
                                <li class="megamenu-container">
                                    <a class="sf-with-ul" href="#">Clothing</a>

                                    <div class="megamenu">
                                        <div class="row no-gutters">
                                            <div class="col-md-8">
                                                <div class="menu-col">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="menu-title">Women</div><!-- End .menu-title -->
                                                            <ul>
                                                                <li><a href="#"><strong>New Arrivals</strong></a></li>
                                                                <li><a href="#"><strong>Best Sellers</strong></a></li>
                                                                <li><a href="#"><strong>Trending</strong></a></li>
                                                                <li><a href="#">Clothing</a></li>
                                                                <li><a href="#">Shoes</a></li>
                                                                <li><a href="#">Bags</a></li>
                                                                <li><a href="#">Accessories</a></li>
                                                                <li><a href="#">Jewlery & Watches</a></li>
                                                                <li><a href="#"><strong>Sale</strong></a></li>
                                                            </ul>
                                                        </div><!-- End .col-md-6 -->

                                                        <div class="col-md-6">
                                                            <div class="menu-title">Men</div><!-- End .menu-title -->
                                                            <ul>
                                                                <li><a href="#"><strong>New Arrivals</strong></a></li>
                                                                <li><a href="#"><strong>Best Sellers</strong></a></li>
                                                                <li><a href="#"><strong>Trending</strong></a></li>
                                                                <li><a href="#">Clothing</a></li>
                                                                <li><a href="#">Shoes</a></li>
                                                                <li><a href="#">Bags</a></li>
                                                                <li><a href="#">Accessories</a></li>
                                                                <li><a href="#">Jewlery & Watches</a></li>
                                                            </ul>
                                                        </div><!-- End .col-md-6 -->
                                                    </div><!-- End .row -->
                                                </div><!-- End .menu-col -->
                                            </div><!-- End .col-md-8 -->

                                            <div class="col-md-4">
                                                <div class="banner banner-overlay">
                                                    <a href="category.html" class="banner banner-menu">
                                                        <img src="{{ asset('user/assets/images/demos/demo-13/menu/banner-3.jpg') }}" alt="Banner">
                                                    </a>
                                                </div><!-- End .banner banner-overlay -->
                                            </div><!-- End .col-md-4 -->
                                        </div><!-- End .row -->

                                        <div class="menu-col menu-brands">
                                            <div class="row">
                                                <div class="col-lg-2">
                                                    <a href="#" class="brand">
                                                        <img src="{{ asset('user/assets/images/brands/1.png') }}" alt="Brand Name">
                                                    </a>
                                                </div><!-- End .col-lg-2 -->

                                                <div class="col-lg-2">
                                                    <a href="#" class="brand">
                                                        <img src="{{ asset('user/assets/images/brands/2.png') }}" alt="Brand Name">
                                                    </a>
                                                </div><!-- End .col-lg-2 -->

                                                <div class="col-lg-2">
                                                    <a href="#" class="brand">
                                                        <img src="{{ asset('user/assets/images/brands/3.png') }}" alt="Brand Name">
                                                    </a>
                                                </div><!-- End .col-lg-2 -->

                                                <div class="col-lg-2">
                                                    <a href="#" class="brand">
                                                        <img src="{{ asset('user/assets/images/brands/4.png') }}" alt="Brand Name">
                                                    </a>
                                                </div><!-- End .col-lg-2 -->

                                                <div class="col-lg-2">
                                                    <a href="#" class="brand">
                                                        <img src="{{ asset('user/assets/images/brands/5.png') }}" alt="Brand Name">
                                                    </a>
                                                </div><!-- End .col-lg-2 -->

                                                <div class="col-lg-2">
                                                    <a href="#" class="brand">
                                                        <img src="{{ asset('user/assets/images/brands/6.png') }}" alt="Brand Name">
                                                    </a>
                                                </div><!-- End .col-lg-2 -->
                                            </div><!-- End .row -->
                                        </div><!-- End .menu-brands -->
                                    </div><!-- End .megamenu -->
                                </li>
                                <li><a href="#">Home Appliances</a></li>
                                <li><a href="#">Healthy & Beauty</a></li>
                                <li><a href="#">Shoes & Boots</a></li>
                                <li><a href="#">Travel & Outdoor</a></li>
                                <li><a href="#">Smart Phones</a></li>
                                <li><a href="#">TV & Audio</a></li>
                                <li><a href="#">Gift Ideas</a></li>
                            </ul><!-- End .menu-vertical -->
                        </nav><!-- End .side-nav -->
                    </div><!-- End .dropdown-menu -->
                </div><!-- End .category-dropdown -->
            </div><!-- End .col-lg-3 -->
            <div class="header-center">
                <nav class="main-nav">
                    <ul class="menu sf-arrows">
                        <li>
                            <a href="elements-list.html" class="sf-with-ul">Elements</a>

                            <ul>
                                <li><a href="elements-products.html">Products</a></li>
                                <li><a href="elements-typography.html">Typography</a></li>
                                <li><a href="elements-titles.html">Titles</a></li>
                                <li><a href="elements-banners.html">Banners</a></li>
                                <li><a href="elements-product-category.html">Product Category</a></li>
                                <li><a href="elements-video-banners.html">Video Banners</a></li>
                                <li><a href="elements-buttons.html">Buttons</a></li>
                                <li><a href="elements-accordions.html">Accordions</a></li>
                                <li><a href="elements-tabs.html">Tabs</a></li>
                                <li><a href="elements-testimonials.html">Testimonials</a></li>
                                <li><a href="elements-blog-posts.html">Blog Posts</a></li>
                                <li><a href="elements-portfolio.html">Portfolio</a></li>
                                <li><a href="elements-cta.html">Call to Action</a></li>
                                <li><a href="elements-icon-boxes.html">Icon Boxes</a></li>
                            </ul>
                        </li>
                    </ul><!-- End .menu -->
                </nav><!-- End .main-nav -->
            </div><!-- End .col-lg-9 -->
            <div class="header-right">
                <i class="la la-lightbulb-o"></i><p>Clearance Up to 30% Off</span></p>
            </div>
        </div><!-- End .container -->
    </div><!-- End .header-bottom -->
</header><!-- End .header -->
