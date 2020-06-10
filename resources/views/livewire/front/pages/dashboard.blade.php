<div>
    <livewire:front.partials.header-two />
    <main class="main">
        <div class="page-header text-center"
            style="background-image: url('{{ asset('user/assets/images/page-header-bg.jpg') }}')">
            <div class="container">
                <h1 class="page-title">My Account</h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->

        <div class="page-content">
            <div class="container">
                <hr class="mt-2 mb-1">

                <div class="row">
                    <div class="col-12">
                        <h2 class="title mb-1">Orders Details</h2><!-- End .title mb-1 -->
                    </div><!-- End .col-12 -->
                    <div class="col-md-12">
                        <ul class="nav nav-tabs nav-tabs-bg justify-content-center" id="tabs-3" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link  cursourPointer " wire:click="goPendingOrderPage">Pending</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link cursourPointer" wire:click="goConfirmedPage">Confirmed</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link cursourPointer" wire:click="goProcessingPage">Processing</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link cursourPointer" wire:click="goPickedPage">Picked</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link cursourPointer" wire:click="goDeliveredPage">Delivered</a>
                            </li>
                        </ul>
                        <div class="tab-content " id="tab-content-3">


                            @if ($allPendingOrderPage == true)

                            @livewire('front.pages.dashboard.pending');

                            @elseif($singleOrderPage == true)
                            @livewire('front.pages.dashboard.single-order' ,['singleOrder' => $currentOrder ,
                            'currentComponent' => $currentComponent]);

                            @elseif ($allConfirmedOrderPage == true)

                            @livewire('front.pages.dashboard.confirme-order');

                            @elseif ($allProcessingOrderPage == true)

                            @livewire('front.pages.dashboard.processing-order');

                            @elseif ($allPickedOrderPage == true)

                            @livewire('front.pages.dashboard.picked-order');

                            @elseif ($allDeleveredOrderPage == true)

                            @livewire('front.pages.dashboard.delivered-oder');
                            @endif



                        </div><!-- End .tab-content -->
                    </div><!-- End .col-md-6 -->
                </div><!-- End .row -->

                <hr class="mt-4 mb-4">

                <div class="row">
                    <div class="col-12">
                        <h2 class="title mb-3">Account Details</h2><!-- End .title mb-3 -->
                    </div><!-- End .col-12 -->
                    <div class="col-md-12">
                        <div class="tabs-vertical">
                            <ul class="nav nav-tabs nav-tabs-bg flex-column" id="tabs-7" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="tab-25-tab" data-toggle="tab" href="#tab-25"
                                        role="tab" aria-controls="tab-25" aria-selected="true">Dashboard</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab-26-tab" data-toggle="tab" href="#tab-26" role="tab"
                                        aria-controls="tab-26" aria-selected="false">Old Orders</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab-27-tab" data-toggle="tab" href="#tab-27" role="tab"
                                        aria-controls="tab-27" aria-selected="false">Wishlist</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab-28-tab" data-toggle="tab" href="#tab-28" role="tab"
                                        aria-controls="tab-28" aria-selected="false">Sign Out</a>
                                </li>
                            </ul>
                            <div class="tab-content tab-content-border" id="tab-content-7">
                                <div class="tab-pane fade show active" id="tab-25" role="tabpanel"
                                    aria-labelledby="tab-25-tab">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="card card-dashboard">
                                                <div class="card-body">
                                                    <h3 class="card-title">Your Balance</h3><!-- End .card-title -->
                                                    <h6>BDT 100</h6>
                                                    <p>You Balance Use Code Number: ss9383ds (One Time Use) <br>
                                                </div><!-- End .card-body -->
                                            </div><!-- End .card-dashboard -->
                                            <div class="card card-dashboard">
                                                <div class="card-body">
                                                    <h3 class="card-title">Your Offers</h3><!-- End .card-title -->
                                                    <p>You Offer Use Code Number: fd63524nv (One Time Use)<br>
                                                </div><!-- End .card-body -->
                                            </div><!-- End .card-dashboard -->
                                        </div><!-- End .col-lg-6 -->

                                        <div class="col-lg-6">
                                            <div class="card card-dashboard">
                                                <div class="card-body">
                                                    <h3 class="card-title">Shipping Address</h3><!-- End .card-title -->
                                                    <p>User Name<br>
                                                        District<br>
                                                        Address<br>
                                                        1-234-987-6543<br>
                                                        yourmail@mail.com<br>
                                                        <a href="#">Edit <i class="icon-edit"></i></a></p>
                                                </div><!-- End .card-body -->
                                            </div><!-- End .card-dashboard -->
                                        </div><!-- End .col-lg-6 -->

                                    </div><!-- End .row -->
                                    <h3 class="card-title">Note:</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque
                                        volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh,
                                        viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis
                                        facilisis fermentum int dolore earum rerum tempora aspernatur numquam velit.
                                    </p>
                                </div><!-- .End .tab-pane -->
                                <div class="tab-pane fade" id="tab-26" role="tabpanel" aria-labelledby="tab-26-tab">
                                    <p>No Order available yet. xxxxxxxxxxxxxxxxx xxxxxxxxxxxx xxxxxxxxxxx
                                        xxxxxxxxxxxxxxx xxxxxxxx xxxxxxxxxxx xxxxxxxxxxx xxxxxxxxxxxxx xxxxxxxxxxxx
                                        xxxxxxxxx</p>
                                    <a href="category.html" class="btn btn-outline-primary-2"><span>GO SHOP</span><i
                                            class="icon-long-arrow-right"></i></a>
                                </div><!-- .End .tab-pane -->
                                <div class="tab-pane fade" id="tab-27" role="tabpanel" aria-labelledby="tab-27-tab">
                                    <p>No Wishlist available yet. xxxxxxxxxxxxxxxxx xxxxxxxxxxxx xxxxxxxxxxx
                                        xxxxxxxxxxxxxxx xxxxxxxx xxxxxxxxxxx xxxxxxxxxxx xxxxxxxxxxxxx xxxxxxxxxxxx
                                        xxxxxxxxx</p>
                                    <a href="category.html" class="btn btn-outline-primary-2"><span>GO SHOP</span><i
                                            class="icon-long-arrow-right"></i></a>
                                </div><!-- .End .tab-pane -->
                                <div class="tab-pane fade" id="tab-28" role="tabpanel" aria-labelledby="tab-28-tab">
                                    <p>Hello <span class="font-weight-normal text-dark">User</span> (not <span
                                            class="font-weight-normal text-dark">User</span>?
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                            Log out
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                        </form>
                                        )
                                        <h5>Edit All</h5>
                                        <form action="#">

                                            <label>Your Name *</label>
                                            <input type="text" class="form-control" required>
                                            <small class="form-text">This will be how your name will be displayed in the
                                                account section and in reviews</small>

                                            <label>Your District *</label>
                                            <input type="text" class="form-control" required>
                                            <small class="form-text">This will be how your name will be displayed in the
                                                account section and in reviews</small>

                                            <label>Your Address *</label>
                                            <input type="text" class="form-control" required>
                                            <small class="form-text">This will be how your name will be displayed in the
                                                account section and in reviews</small>

                                            <label>Your Mobile *</label>
                                            <input type="number" class="form-control" required>
                                            <small class="form-text">This will be how your name will be displayed in the
                                                account section and in reviews</small>

                                            <label>Email address *</label>
                                            <input type="email" class="form-control" required>

                                            <label>Current password (leave blank to leave unchanged)</label>
                                            <input type="password" class="form-control">

                                            <label>New password (leave blank to leave unchanged)</label>
                                            <input type="password" class="form-control">

                                            <label>Confirm new password</label>
                                            <input type="password" class="form-control mb-2">

                                            <button type="submit" class="btn btn-outline-primary-2">
                                                <span>SAVE CHANGES</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>
                                        </form>
                                        <h3 class="card-title">Note:</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque
                                            volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna
                                            nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo eget
                                            felis facilisis fermentum int dolore earum rerum tempora aspernatur numquam
                                            velit. </p>
                                </div><!-- .End .tab-pane -->
                            </div><!-- End .tab-content -->
                        </div><!-- End .tabs-vertical -->
                    </div><!-- End .col-md-6 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .page-content -->

    </main><!-- End .main -->
</div>
