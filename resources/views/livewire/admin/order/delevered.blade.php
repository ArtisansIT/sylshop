<div>
    <div class="card-body">
        <div class="row">
            <div class="col-12">

                <div class="">
                    <div class="card-header">
                        <h4>
                            <span>

                                All Delevered Order
                            </span>

                            <span class="badge badge-danger headerBadge1">
                                {{ $deleveredOrders->count() }}</span>
                        </h4>
                        <div class="card-header-form">
                            <form>
                                <div class="input-group">
                                    <input type="text" wire:model="search" class="form-control" placeholder="Search">
                                    <div class="input-group-btn">
                                        <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class=" p-0">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>

                                    <th>citem Name</th>

                                    <th>Order Time </th>
                                    <th>Delevery Time </th>


                                    <th>Details</th>
                                    <th>Comments</th>

                                </tr>
                                @foreach($deleveredOrders->chunk(10) as $singleorder)

                                @foreach ($singleorder as $order)

                                <tr>

                                    <td>
                                        <span>{{ $order->code }}</span>

                                    </td>
                                    <td>{{ $order->created_at->diffForHumans()}}</td>
                                    <td>{{ $order->updated_at->diffForHumans()}}</td>

                                    <td><button class="btn btn-primary"
                                            wire:click="singleOrder({{ $order->id }})">Details</button></td>
                                    <td><button class="btn btn-primary"
                                            wire:click="viewComment({{ $order->id }})">Comments</button></td>


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
</div>
