<div>    
      @if ($shop_list_page == true)             
       <div class="row">
            <div class="col-12">
                <div class="">
                    <div class="card-header">
                       
                        <div class="card-header-form">
                            <form>
                                <div class="input-group">
                                    <input type="text" wire:model="search" class="form-control" placeholder="Search">
                                   
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>
                                    <th> shop name</th>
                                    <th> shop Picture</th>
                                    <th> Total</th>
                                    <th>Create Time </th>
                                    <th>Details</th>
                                </tr>
                                @foreach($shops as $shop)

                                <tr>

                                    <td>{{  $shop->name}}</td>
                                    <td>
                                         <img alt="image"
                                            src="{{ asset('images/'.$shop->image->url) }}"
                                             width="100">
                                    </td>
                                    <td>{{  $shop->process_delever_count}}</td>
                                    <td>
                                        {{ $shop->created_at->diffForHumans() }}
                                    </td>
                                    <td><button class="btn btn-primary"
                                            wire:click="details({{ $shop->id }})">Details</button></td>
                                </tr>
                                @endforeach

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @elseif($single_item_page == true)
             @livewire('admin.order-procesing.single-item',[
                 'shop_id' => $shop_id
             ])
        @endif




</div>
