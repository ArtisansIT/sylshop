<div>
    <div class="card-body">
        <div class="row">
           <div class="col-12">
                <div>
                    @if (session()->has('update'))
                    <div class="alert alert-success">
                        {{ session('update') }}
                    </div>
                    @elseif(session()->has('Inactive'))
                     <div class="alert alert-danger">
                        {{ session('Inactive') }}
                    </div>
                    @endif
                </div>
                <div class="">
                    <div class="card-header">
                        <h4>
                            <span>

                                All Pickup
                            </span>

                            <span class="badge badge-danger headerBadge1">
                                {{ $pickups->count() }}</span>
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
                        
                                    <th>Pickup Name</th>
            
                                    <th>Cost </th>
                                  
                                   
                                    <th>Edit</th>
                                    <th>Deletet</th>
                               
                                </tr>
                                @foreach($pickups as $pickup)

                                <tr>
                                    
                                    <td>{{ isset($pickup->address) ? $pickup->address : '' }}</td>
                                    <td>{{ isset($pickup->cost) ? $pickup->cost : '' }}</td>
                                   
                                    <td><button class="btn btn-primary"
                                         onclick="confirm('Do you want To Restore') || event.stopImmediatePropagation()"
                                            wire:click="editpickup({{ $pickup->id }})">Edit</button></td>
                                    <td><a href="#"
                                            onclick="confirm('Do you want To inactive This') || event.stopImmediatePropagation()"
                                            wire:click="inactivepickup({{ $pickup->id }})"
                                            class="btn btn-primary"> inactive</a></td>

                                    {{-- <td><a href="#" class="btn btn-primary">In active</a></td> --}}
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
