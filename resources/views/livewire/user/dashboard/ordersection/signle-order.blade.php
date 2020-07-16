<div>
    <div class="row">
        <div class="col-12">
            <div class="card">
              <div class="card-header">
                        <h4>
                            <span>

                               Current Page:
                            </span>
                            <span class="text-danger">
                              {{ $current_page_status }}
                            </span>


                        </h4>
                        <div class="card-header-form">

                            <button wire:click="backToMain" class="btn btn-danger btn-icon icon-left">
                                <i class="fas fa-times"></i> Back
                            </button>
                        </div>

                    </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-2">
                            <thead>
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
                            </thead>
                            <tbody>

                                @foreach($orders as $order)

                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>#{{ isset($order->code ) ? $order->code  : '' }}</td>
                                    <td><small>{{ $order->user->name }}</small></td>
                                    <td><small>{{ $order->user->phone }}</small></td>
                                    <td>{{ $order->details->count() }}</td>
                                    <td>{{ $order->shipping }}</td>
                                    <td> No Coupane</td>
                                    <td>Tk {{$order->details->sum('total') + $order->shipping - $order->discount }}</td>
                                    <td>{{ $order->created_at->diffForHumans()  }}</td>
                                    <td><button class="btn btn-primary" 
                                      wire:click="viewSingleOrderDetails({{$order->id }})"
                                      >Detail</button></td>
                                </tr>

                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
