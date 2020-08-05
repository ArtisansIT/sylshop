<div>
    @if ($index_page == true)

    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12">
            <a href="#" wire:click="orderBalance">
                <div class="card card-statistic-2">
                    <div class="card-icon shadow-primary bg-green">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h3 class="pull-right">Orders Balance</h3>
                            <h3>Orders: {{ $order_balance_count }}</h3>
                        </div>
                        <div class="card-body pull-right">
                            <b> TOTAL: ৳ {{ $order_balance_total }}</b>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <a href="#" wire:click="processing">
                <div class="card card-statistic-2">
                    <div class="card-icon shadow-primary bg-cyan">
                        <i class="fas fa-hiking"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h3 class="pull-right">Orders Processing</h3>
                            <h3>{{ $rate->shop->procecing_rate }}%</h3>
                        </div>
                        <div class="card-body pull-right">
                            <b> TOTAL: ৳ {{ $order_processing_count }}</b>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <a href="#" wire:click="delevered">
                <div class="card card-statistic-2">
                    <div class="card-icon shadow-primary bg-purple">
                        <i class="fas fa-drafting-compass"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h3 class="pull-right">Orders Delivered</h3>
                            <h3>{{ $rate->shop->delevered_rate }}%</h3>
                        </div>
                        <div class="card-body pull-right">
                            <b> TOTAL: ৳ {{ $order_delevery_count }}</b>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3>Old Payment Table</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Account NO</th>
                                    <th>Bank Name</th>
                                    <th>Others 50%</th>
                                    <th>Payment Date</th>
                                    <th>Salary</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Chinmoy Datta</td>
                                    <td>0123 1231 23213</td>
                                    <td>City Bank, Sylhet</td>
                                    <td>Orders Processing</td>
                                    <td>26 Jun 2020</td>
                                    <td>৳190.00</td>
                                </tr>
                                <tr>
                                    <td>Chinmoy Datta</td>
                                    <td>0123 1231 23213</td>
                                    <td>City Bank, Sylhet</td>
                                    <td>Orders Delivered</td>
                                    <td>26 Jun 2020</td>
                                    <td>৳190.60</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @elseif($single_page == true)
    @livewire('shopsection.myaccount.single',[
    'order_details' => $temp_variable
    ])

    @elseif($single_product_page == true)
    @livewire('admin.ordersection.single-product' , [
    'product' => $product_details_variable,
    'variation' => $product_variation_variable,
     'component_identy_variable' => $variable_for_back_to_index_page
    ])

    @endif
</div>
