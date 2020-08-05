<div>
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
                                    <th> Coupane name</th>
                                    <th> Coupane Code</th>
                                    <td>Total Shopping </td>
                                    <th>Discount Money </th>
                                    <th>Create Time </th>
                                    <th>Restore</th>
                                    <th>Delete</th>
                                </tr>
                                @foreach($coupanes as $coupane)


                                <td>{{  $coupane->name}}</td>
                                <td>{{  $coupane->code}}</td>
                                <td>{{  $coupane->total}}</td>
                                <td>{{  $coupane->discount}}</td>
                             
                                <td>
                                    {{ $coupane->updated_at->diffForHumans() }}
                                </td>
                                <td><button class="btn btn-primary"
                                        wire:click="Restore_coupane({{ $coupane->id }})">Restore</button></td>
                                <td><a href="#"
                                        onclick="confirm('Are you want To delete') || event.stopImmediatePropagation()"
                                        wire:click="ParmanentDelete_coupane({{ $coupane->id }})"
                                         class="btn btn-danger btn-icon icon-left">  <i class="fas fa-times"></i>Delete</a></td>
                                </tr>

                                @endforeach

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>





</div>
