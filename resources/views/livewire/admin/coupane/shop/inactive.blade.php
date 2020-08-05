<div>
   <div class="row">
            <div class="col-12">
                <div class="">
                    <div class="card-header">
                       
                        <div class="card-header-action">
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
                             
                                <div class="col-md-4">

                                    <button wire:click="$emit('inactive_back_form_shop')"
                                     class="btn btn-danger btn-icon icon-left">
                                       <i class="fas fa-times"></i> Back To All Shop
                                   </button>
                                  
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
                                        wire:click="active({{ $coupane->id }})">
                                        Active
                                    </button>
                                </td>
                                <td><a href="#"
                                        onclick="confirm('Are you want To Delete') ||
                                         event.stopImmediatePropagation()"
                                        wire:click="delete({{ $coupane->id }})"
                                         class="btn btn-danger btn-icon icon-left"> 
                                          <i class="fas fa-times"></i>Delete
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
</div>
