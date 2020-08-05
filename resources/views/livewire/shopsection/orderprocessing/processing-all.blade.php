<div>


    @if ($orderProceingPage == true)

    <h2>Orders Processing</h2>
    <div class="row ">
        {{-- <div class="col-xl-3 col-lg-6">
            <a href="#" wire:click="viewSingleOrder('new')">
                <div class="card l-bg-purple">
                    <div class="card-statistic-3">
                        <div class="card-icon card-icon-large"><i class="fa fa-award"></i></div>
                        <div class="card-content">
                            <h5 class="card-title">1.Orders Send</h5>
                            <h5>{{ $new->count() ? $new->count() : 0  }}</h5>

                        </div>
                    </div>
                </div>
            </a>
        </div> --}}
        <div class="col-xl-3 col-lg-6">
            <a href="#" wire:click="viewSingleOrder('confirmed')">
                <div class="card l-bg-purple">
                    <div class="card-statistic-3">
                        <div class="card-icon card-icon-large"><i class="fa fa-briefcase"></i></div>
                        <div class="card-content">
                            <h5 class="card-title">1.Orders Confirmed</h5>
                            <h5>{{ $confirmed->count() ? $confirmed->count() : 0  }}</h5>

                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-lg-6">
            <a href="#" wire:click="viewSingleOrder('received')">
                <div class="card l-bg-purple">
                    <div class="card-statistic-3">
                        <div class="card-icon card-icon-large"><i class="fa fa-globe"></i></div>
                        <div class="card-content">
                            <h5 class="card-title">2.Orders Received</h5>
                            <h5>{{ $received->count() ? $received->count() : 0  }}</h5>

                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-lg-6">
            <a href="#" wire:click="viewSingleOrder('packing')">
                <div class="card l-bg-purple">
                    <div class="card-statistic-3">
                        <div class="card-icon card-icon-large"><i class="fa fa-money-bill-alt"></i></div>
                        <div class="card-content">
                            <h5 class="card-title">3.Orders Packing</h5>
                            <h5>{{ $packing->count() ? $packing->count() : 0  }}</h5>

                        </div>
                    </div>
                </div>
            </a>
        </div>
      
        <div class="col-xl-3 col-lg-6">
            <a href="#" wire:click="viewSingleOrder('shipped')">
                <div class="card l-bg-purple">
                    <div class="card-statistic-3">
                        <div class="card-icon card-icon-large"><i class="fa fa-award"></i></div>
                        <div class="card-content">
                            <h5 class="card-title">4.Orders Shipped</h5>
                            <h5>{{ $shipped->count() ? $shipped->count() : 0  }}</h5>

                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-lg-6">
            <a href="#" wire:click="viewSingleOrder('piked')">
                <div class="card l-bg-purple">
                    <div class="card-statistic-3">
                        <div class="card-icon card-icon-large"><i class="fa fa-award"></i></div>
                        <div class="card-content">
                            <h5 class="card-title">5.Orders Piked</h5>
                            <h5>{{ $piked->count() ? $piked->count() : 0  }}</h5>

                        </div>
                    </div>
                </div>
            </a>
        </div>
          <div class="col-xl-3 col-lg-6">
            <a href="#" wire:click="viewSingleOrder('delivered')">
                <div class="card l-bg-purple">
                    <div class="card-statistic-3">
                        <div class="card-icon card-icon-large"><i class="fa fa-award"></i></div>
                        <div class="card-content">
                            <h5 class="card-title">6.Orders Delivered</h5>
                            <h5>{{ $delivered->count() ? $delivered->count() : 0  }}</h5>

                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-lg-6">
            <a href="#" wire:click="viewSingleOrder('return')">
                <div class="card l-bg-orange">
                    <div class="card-statistic-3">
                        <div class="card-icon card-icon-large"><i class="fa fa-briefcase"></i></div>
                        <div class="card-content">
                            <h5 class="card-title">7.Orders Return</h5>
                            <h5>{{ $return->count() ? $return->count() : 0  }}</h5>

                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-lg-6">
            <a href="#" wire:click="viewSingleOrder('return_received')">
                <div class="card l-bg-orange">
                    <div class="card-statistic-3">
                        <div class="card-icon card-icon-large"><i class="fa fa-globe"></i></div>
                        <div class="card-content">
                            <h5 class="card-title">8.Orders Return Received</h5>
                            <h5>{{ $return_received->count() ? $return_received->count() : 0  }}</h5>

                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-lg-6">
            <a href="orders-print.html">
                <div class="card l-bg-orange">
                    <div class="card-statistic-3">
                        <div class="card-icon card-icon-large"><i class="fa fa-globe"></i></div>
                        <div class="card-content">
                            <h5 class="card-title">9.Tk Refend</h5>
                            <h5>4</h5>

                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>



    @elseif($singleOrderPage == true)
    @livewire('shopsection.orderprocessing.single-order-with-details' ,[
    'orders' => $sigleOrderValue ,
    'current_page_status' => $current_page_sstatus
    ]);
    @elseif($singleOrderDetails == true)
    @livewire('shopsection.orderprocessing.single-order-invoice' ,['singleOrder' => $currentOrder ,
    'currentComponent' => $currentComponent]);
    @endif




</div>
