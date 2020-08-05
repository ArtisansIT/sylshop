<div>
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
                                    @if(auth()->user()->role_id == 2)
                                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                        @elseif(auth()->user()->role_id == 3)
                                        <li><a href="{{ route('shop.dashboard') }}">Dashboard</a></li>
                                        @else 
                                        <li><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
                                        @endif
                                    @else 

                                {{-- <a  href="{{ route('login') }}">Sign in / Sign up</a> --}}
                                <a href="{{ route('customer.login') }}" ><i class="icon-user"></i>Login</a>
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
                
                <a href="/" class="logo">
                    <img src="{{ asset('user/logo/logo.png') }}" alt="Molla Logo"  width="200" height="50">
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
                   
                    {{-- <a href="wishlist.html" class="wishlist-link">
                        <i class="icon-heart-o"></i>
                        <span class="wishlist-count">3</span>
                        <span class="wishlist-txt">Wishlist</span>
                    </a> --}}

                    <div class="dropdown cart-dropdown">
                        <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown"
                         aria-haspopup="true" aria-expanded="false" data-display="static">
                            <i class="icon-shopping-cart"></i>
                            {{-- <span class="cart-count">{{ $cartTotal }}</span> --}}
                            @livewire('front.partials.cart-size')
                            <span class="cart-txt">Cart</span>
                        </a>
                        @livewire('front.partials.small-cart-view')

                    </div><!-- End .cart-dropdown -->
                </div>
            </div><!-- End .header-right -->
        </div><!-- End .container -->
    </div><!-- End .header-middle -->

    <div class="header-bottom sticky-header">
        <div class="container">
            <div class="header-left">
                <div class="dropdown category-dropdown show is-on" data-visible="true">
                    <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown"
                     aria-haspopup="true" aria-expanded="true" data-display="static" title="Browse Categories">
                        Browse Categories
                    </a>

                    <div class="dropdown-menu show">
                        <nav class="side-nav">
                            <ul class="menu-vertical sf-arrows">

                                @foreach ($categorys as $category)
                                    
                                <li class="megamenu-container">
                                    <a class="sf-with-ul" 
                                    href="{{ route('front.category',[$category->id,$category->slug]) }}">
                                    {{ $category->name }}</a>

                                    <div class="megamenu">
                                        <div class="row no-gutters">
                                            <div class="col-md-8">
                                                <div class="menu-col">
                                                     <div class="row">
                                                         @foreach ($category->shop as $shop)
                                                        <div class="col-md-6">
                                                    
                                                        <div class="menu-title">
                                                            <a href="{{ route('front.single.shop',[$shop->id , $shop->slug]) }}">{{ $shop->name }}</a>
                                                        </div>
                                                             <ul>
                                                                @foreach ($shop->subcategorys as $subcategory)
                                                                
                                                                <li>
                                                                    <a href="{{ route('front.single.subcategory',[$subcategory->id,$subcategory->slug]) }}">
                                                                     {{ $subcategory->name }}
                                                                    </a>
                                                                 </li>

                                                                @endforeach
                                                                
                                                            </ul>
                                                            
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                          
                                                     
                                                </div><!-- End .menu-col -->
                                            </div><!-- End .col-md-8 -->

                                             <div class="col-md-4">
                                                <div class="banner banner-overlay">
                                                    <a href="category.html" class="banner banner-menu">
                                                        <img src="{{ asset('user/assets/images/demos/demo-13/menu/banner-3.jpg') }}" alt="Banner">
                                                    </a>
                                                </div><!-- End .banner banner-overlay -->
                                            </div><

                                          
                                        </div><!-- End .row -->
                                    </div><!-- End .megamenu -->
                                </li>
                                @endforeach
                               
                              
                                {{-- <li><a href="#">Home Appliances</a></li>
                                <li><a href="#">Healthy & Beauty</a></li>
                                <li><a href="#">Shoes & Boots</a></li>
                                <li><a href="#">Travel & Outdoor</a></li>
                                <li><a href="#">Smart Phones</a></li>
                                <li><a href="#">TV & Audio</a></li>
                                <li><a href="#">Gift Ideas</a></li> --}}
                            </ul><!-- End .menu-vertical -->
                        </nav><!-- End .side-nav -->
                    </div><!-- End .dropdown-menu -->
                </div><!-- End .category-dropdown -->
            </div><!-- End .col-lg-3 -->
            {{-- <div class="header-center">
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
            </div><!-- End .col-lg-9 --> --}}
            <div class="header-right">
                <i class="la la-lightbulb-o"></i><p>Clearance Up to 30% Off</span></p>
            </div>
        </div><!-- End .container -->
    </div><!-- End .header-bottom -->
</header><!-- End .header -->
</div>
