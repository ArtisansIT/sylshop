<div>
    <div class="container">
        <table class="table table-wishlist table-mobile">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th></th>
                    <th>Create Time</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($orders as $order)
                <tr>
                    <td class="product-col">
                        <div class="product">


                            <h3 class="product-title">
                                <span>Order No:</span>
                                <span><a href="#">#{{ $order->code }}</a></span>

                            </h3><!-- End .product-title -->
                        </div><!-- End .product -->
                    </td>
                   <td class="price-col">{{ $order->details->sum('total') + $order->shipping - $order->discount }} TK </td>
                    <td class="action-col"> 
                        <button wire:click="showDelails({{ $order->id}})"
                         class="btn btn-sm  btn-outline-primary-2">Details</button></td>
                    <td class="stock-col"><span class="out-of-stock">{{ $order->created_at->diffForHumans() }}</span>
                    </td>

                    <td class="action-col">
                        <button class="btn btn-block btn-outline-danger">Cancel Order</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table><!-- End .table table-wishlist -->
    </div><!-- End .container -->

</div>
