<div>
    @if ($indexComponent == true)
        
    <div class="card-body">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <h4>
                            <span>

                                All Pending Order
                            </span>

                            <span class="badge badge-danger headerBadge1">
                                {{ $orders->count() }}</span>
                        </h4>
                     
                        <div class="card-body">
                            <div class="dropdown d-inline">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Orders Processing
                                </button>
                                <div class="dropdown-menu">
                                   <a class="dropdown-item has-icon"
                                   wire:click="newOrder"
                                   href="#">
                                       
                                    <i class="far fa-clock"></i> New Orders </a>
                                    <a class="dropdown-item has-icon"
                                      wire:click="chack"
                                    href="#">
                                        
                                        <i class="far fa-clock"></i> Orders chack</a>
                                    <a class="dropdown-item has-icon"
                                     wire:click="Received"
                                    href="#">
                                        
                                        <i class="far fa-clock"></i> Orders Received</a>
                                    <a class="dropdown-item has-icon"
                                     wire:click="Packing"
                                    href="#">
                                        
                                        <i class="far fa-clock"></i> Orders Packing</a>
                                    <a class="dropdown-item has-icon"
                                     wire:click="Shipped"
                                    href="#">
                                        
                                        <i class="far fa-clock"></i> Orders Shipped</a>
                                    <a class="dropdown-item has-icon"
                                     wire:click="Piked"
                                    href="#">
                                        
                                        <i class="far fa-clock"></i> Orders Piked</a>
                                    <a class="dropdown-item has-icon"
                                     wire:click="Delivered"
                                    href="#">
                                        
                                        <i class="far fa-clock"></i> Orders Delivered</a>
                                    <a class="dropdown-item has-icon"
                                     wire:click="Return"
                                    href="#">
                                        
                                        <i class="far fa-clock"></i> Orders Return</a>
                                    <a class="dropdown-item has-icon"
                                     wire:click="Return_Received"
                                    href="#">
                                        
                                        <i class="far fa-clock"></i> Return Received</a>
                                    <a class="dropdown-item has-icon" 
                                     wire:click="ReturnHandhover"
                                    href="#">
                                        
                                        <i class="far fa-clock"></i> Return Handhover</a>
                                    <a class="dropdown-item has-icon" 
                                     wire:click="Cancel"
                                    href="#">
                                        
                                        <i class="far fa-clock"></i> Orders Cancel</a>
                                    <a class="dropdown-item has-icon"
                                     wire:click="Orders_Shop_Cancel"
                                    href="#">
                                        
                                        <i class="far fa-clock"></i> Orders Shop Cancel</a>
                                </div>
                            </div>
                        </div>

                         <h4>
                            <span >

                                Current Page :
                            </span>
                            <span class="text-danger" >

                               {{ $page_name_variable_singleOrder_page }}
                            </span>

                           
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>

                                    <th data-width="60">#</th>
                                    <th>Order No</th>
                                    <th>Order Name</th>
                                    <th>Mobile No</th>
                                    <th>Products</th>
                                    <th>Shiping Free</th>
                                    <th>Cupon Coud</th>
                                    <th>Total Tk</th>
                                    <th>Date</th>
                                    <th>Detail</th>
                                

                                </tr>
                                @foreach($orders->chunk(10) as $singleorder)

                                @foreach ($singleorder as $order)

                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>

                                    <td>
                                        <span>{{ $order->code }}</span>

                                    </td>
                                    <td>{{ $order->user->name }}</td>
                                    <td>{{ $order->user->phone }}</td>
                                    <td>{{ $order->details->count() }}</td>
                                    <td>{{ $order->shipping }}</td>
                                    <td>{{!empty( $order->coupane->name)?
                                      $order->coupane->name : 
                                      ' Coupane Not Use' }}
                                    </td>
                                    <td>
                                        Tk {{ $order->details->sum('total') +
                                             $order->shipping - 
                                              $order->discount  }}
                                    </td>
                                    <td>{{ $order->created_at->diffForHumans()}}</td>

                                    <td><button class="btn btn-primary" 
                                        wire:click="Go_Single_order_details_page({{  $order->details }} ,{{ $order->code }})"
                                           >Details</button></td>


                                    {{-- <td><a href="#" class="btn btn-primary">In active</a></td> --}}
                                </tr>

                                @endforeach
                                @endforeach

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @elseif($singleOrderPage == true)
   @livewire('admin.ordersection.order-details' , ['singleorder'=> $OrderDetails_for_SingleOrder ,
    'orderCode' => $OrderCode_for_SingleOrder ,
     'page_name_variable_singleOrder_page' => $page_name_variable_singleOrder_page
    ])
    @elseif($single_product_page == true)
   @livewire('admin.ordersection.single-product' , [
     'product' => $product_details_variable,
     'variation' => $product_variation_variable
    ])
    @endif
</div>

@push('scripts')
     <script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('f3ea4bbe991d4a67ec19', {
      cluster: 'ap2'
    });

    var channel = pusher.subscribe('order-channel');
    channel.bind('order-event', function(data) {
      window.livewire.emit('realtimeorder')
    });
  </script>
@endpush


