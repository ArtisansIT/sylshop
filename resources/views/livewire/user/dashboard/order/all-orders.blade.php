<div>
    <div class="row mt-sm-4">
      
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Your All Orders</h4>
                </div>
                <div class="card-body">
                    <ul class="nav nav-pills" id="myTab3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link  
                          @if ($allPendingOrderPage == true)
                         active
                         @endif
                        cursorPointer" wire:click="goPendingOrderPage">Pending</a>
                        </li>
                        <li class="nav-item">

                            <a class="nav-link cursorPointer
                         @if ($allConfirmedOrderPage == true)
                         active
                         @endif
                         " wire:click="goConfirmedPage">Confirmed</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link
                         @if ($allProcessingOrderPage == true)
                         active
                         @endif
                        cursorPointer" wire:click="goProcessingPage">Processing</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link
                         @if ($allPickedOrderPage == true)
                         active
                         @endif
                         cursorPointer" wire:click="goPickedPage">Picked</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link
                         @if ($allDeleveredOrderPage == true)
                         active
                         @endif
                         cursorPointer" wire:click="goDeliveredPage">Delivered</a>
                        </li>
                    </ul>
                   
                        @if ($allPendingOrderPage == true)

                        @livewire('user.dashboard.order.pending');

                        @elseif($singleOrderPage == true)
                        @livewire('user.dashboard.order.single-order' ,['singleOrder' => $currentOrder ,
                        'currentComponent' => $currentComponent]);

                        @elseif ($allConfirmedOrderPage == true)

                        @livewire('user.dashboard.order.confirme-order');

                        @elseif ($allProcessingOrderPage == true)

                        @livewire('user.dashboard.order.processing-order');

                        @elseif ($allPickedOrderPage == true)

                        @livewire('user.dashboard.order.picked-order');

                        @elseif ($allDeleveredOrderPage == true)

                        @livewire('user.dashboard.order.delivered-oder');
                        @endif
                   
                </div>
            </div>
        </div>
    </div>
</div>
