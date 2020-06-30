<div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">

                    <h4>Create new Category</h4>


                    <div class="card-header-action">

                        @if ($go_all_order_page == false)
                        <a href="#" wire:click="go_all_order_page" class="btn btn-primary">
                            All Order
                        </a>
                        @endif

                        @if ($goto_Delevered_page == false)

                        <a href="#" wire:click="go_Delevered_page" class="btn btn-primary">
                            Delevered
                        </a>
                        @endif

                        {{-- @if ($goto_in_actiove_page == false)

                        <a href="#" wire:click="go_in_actiove_page" class="btn btn-primary">
                            
                        </a>
                        @endif --}}
                    </div>
                </div>


                @if ($go_all_order_page == true)

                <div class="card-body">
                    <div class="row">
                        <div class="col-12">

                            <div class="card-header">
                                <h4>
                            <span>

                                All products
                            </span>

                            <span class="badge badge-danger headerBadge1">
                                {{ $orders->count() }}</span>
                        </h4>
                                <div class="card-header-form">
                                    <form>
                                        <div class="input-group">
                                            <input type="text" wire:model="search" class="form-control"
                                                placeholder="Search">
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

                                            <th>Order Code </th>
                                            <th> Create </th>
                                            <th> pending</th>
                                            <th> confirmed</th>
                                            <th> processing</th>
                                            <th> picked</th>
                                            <th> delivered</th>

                                        </tr>

                                        @foreach($orders->chunk(10) as $singleorder)

                                        @foreach ($singleorder as $order)
                                        <tr>
                                                
                                            
                                          
                                            <td>
                                                <span>{{ $order->code }}</span>

                                            </td>
                                            <td>{{ $order->created_at->diffForHumans() }}</td>
                                             <td class="p-0 text-center">
                                                <div class="custom-checkbox custom-control">
                                                    <input type="checkbox" data-checkboxes="mygroup"
                                                      
                                                      @if(!empty($order->pending == true)) checked @endif

                                                    class="custom-control-input" id="checkbox-{{ $order->id }}">
                                                    <label for="checkbox-{{ $order->id }}"
                                                        class="custom-control-label">&nbsp;</label>
                                                </div>
                                            </td>
                                             <td class="p-0 text-center">
                                                <div class="custom-checkbox custom-control">
                                                    <input type="checkbox" data-checkboxes="mygroup"
                                                        wire:change="confirmed({{$order->id  }})" 
                                                        @if ($order->confirmed == true) checked @endif

                                                    class="custom-control-input" id="confirmed-{{ $order->id }}">
                                                    <label for="confirmed-{{ $order->id }}"
                                                        class="custom-control-label">&nbsp;</label>
                                                </div>
                                            </td>
                                             <td class="p-0 text-center">
                                                <div class="custom-checkbox custom-control">
                                                    <input type="checkbox" data-checkboxes="mygroup"
                                                        wire:change="processing({{$order->id  }})" 
                                                        @if ($order->processing == true) checked @endif

                                                    class="custom-control-input" id="processing-{{ $order->id }}">
                                                    <label for="processing-{{ $order->id }}"
                                                        class="custom-control-label">&nbsp;</label>
                                                </div>
                                            </td>
                                             <td class="p-0 text-center">
                                                <div class="custom-checkbox custom-control">
                                                    <input type="checkbox" data-checkboxes="mygroup"
                                                        wire:change="picked({{$order->id  }})" 
                                                        @if ($order->picked == true) checked @endif

                                                    class="custom-control-input" id="picked-{{ $order->id }}">
                                                    <label for="picked-{{ $order->id }}"
                                                        class="custom-control-label">&nbsp;</label>
                                                </div>
                                            </td>
                                             <td class="p-0 text-center">
                                                <div class="custom-checkbox custom-control">
                                                    <input type="checkbox" data-checkboxes="mygroup"
                                                        wire:change="delivered({{$order->id  }})" 
                                                        @if ($order->delivered == true) checked @endif

                                                    class="custom-control-input" id="delivered-{{ $order->id }}">
                                                    <label for="delivered-{{ $order->id }}"
                                                        class="custom-control-label">&nbsp;</label>
                                                </div>
                                            </td>


                                            {{-- <td><a href="#" class="btn btn-primary">In active</a></td> --}}
                                        </tr>
                                        @endforeach

                                        @endforeach

                                    </table>
                                  
                                </div>
                            </div>

                        </div>
                    </div>

                    {{-- @elseif($goto_image_page == true)
                @include('livewire.admin.category.image-update')
                @elseif($go_edit_category_page == true)
                @include('livewire.admin.category.edit-category') --}}
                @elseif($goto_Delevered_page == true)
                @livewire('admin.order.delevered')
                {{-- @elseif($go_all_category_page == true)
                @livewire('admin.category.all-category') --}}
                @endif
                </div>
            </div>

        </div>
