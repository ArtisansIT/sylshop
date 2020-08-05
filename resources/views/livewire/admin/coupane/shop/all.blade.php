<div>

        @if ($all_shop == true)
           {{-- {{ dd($coupanes) }}  --}}
        <div class="row">
            <div class="col-12">
                <div class="">
                    <div class="card-header">
                       
                     <div class="card-header-form">
                            <div class="row">
                                <div class="col-md-8">

                                    <form>
                                        <div class="input-group">
                                            <input type="text" wire:model="search"
                                             class="form-control" placeholder="Search">
                                           
                                        </div>
                                    </form>
                                </div>
                                <br>
                                <div class="col-md-2">

                                    <button wire:click="$emit('shop_inactive_list')" class="btn btn-warning btn-icon icon-left">
                                       <i class="fas fa-times"></i> In-Active List
                                   </button>
                                  
                                </div>
                                   <div class="col-md-2">

                                  <h4>All Shop</h4>
                                  
                                </div>
                             
                            </div>
                            <br><br>
                        </div>
                    </div>
                    <div class="card-body">

                        <div>
                            @if (session()->has('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                            @endif
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>
                                    <th>Coupane name</th>
                                    <th>Coupane Code</th>
                                    <td>Total Shopping </td>
                                    <th>Discount Money </th>
                                    <th>Create Time </th>
                                    <th>Edit</th>
                                    <th>Inactive</th>
                                </tr>
                                @foreach($coupanes as $coupane)


                                <td>{{  $coupane->name}}</td>
                                <td>{{  $coupane->code}}</td>
                                <td>{{  $coupane->total}}</td>
                                <td>{{  $coupane->discount}}</td>
                             
                                <td>
                                    {{ $coupane->created_at->diffForHumans() }}
                                </td>
                                <td><button class="btn btn-primary"
                                        wire:click="edit_coupane({{ $coupane->id }})">
                                        Edit
                                    </button>
                                </td>
                                <td><a href="#"
                                        onclick="confirm('Are you want To In-active') || event.stopImmediatePropagation()"
                                        wire:click="softDelete_coupane({{ $coupane->id }})"
                                         class="btn btn-danger btn-icon icon-left"> 
                                          <i class="fas fa-times"></i>In-active
                                    </a>
                                 </td>
                                </tr>

                                @endforeach

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @elseif($edit_shop == true)
             @livewire('admin.coupane.shop.edit',[
                 'coupane_id' => $coupane_id
             ]) 
             
         @elseif($inactive_list_shop == true)
             @livewire('admin.coupane.shop.inactive')            
        @endif




</div>
