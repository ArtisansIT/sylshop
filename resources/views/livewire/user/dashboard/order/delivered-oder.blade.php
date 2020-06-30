<div>
    <div class="card-body">
        <div class="row">
           <div class="col-12">
             
                <div class="">
                 
                    <div class=" p-0">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>
                        
                                    <th>Order No:</th>
            
                                    <th>Total Price </th>
                                 <th>Order Time </th>
                                    <th>Details</th>
                               
                                </tr>
                                @foreach($orders as $order)

                                <tr>

                                    <td>#{{ isset($order->code ) ? $order->code  : '' }}</td>
                                    <td>{{$order->details->sum('total') + $order->shipping - $order->discount }}</td>
                                     <td>{{ $order->created_at->diffForHumans()  }}</td>
                                   
                                    <td><button class="btn btn-primary"
                                       
                                           wire:click="showDelails({{ $order->id}})">Details</button></td>
                                  
                                </tr>

                                @endforeach

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
