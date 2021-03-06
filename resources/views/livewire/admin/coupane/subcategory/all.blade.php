<div>

    @if ($all_subcategory == true)
    {{-- {{ dd($coupanes) }} --}}
    <div class="row">
        <div class="col-12">
            <div class="">
                <div class="card-header">
                    <div class="card-header-form">
                        <div class="row">
                            <div class="col-md-8">

                                <form>
                                    <div class="input-group">
                                        <input type="text" wire:model="search" class="form-control"
                                            placeholder="Search">

                                    </div>
                                </form>
                            </div>
                            <br>
                            <div class="col-md-2 ">

                                <button wire:click="$emit('subcategory_inactive_list')"
                                    class="btn btn-warning btn-icon icon-left">
                                    <i class="fas fa-times"></i> In-Active List
                                </button>

                            </div>

                            <div class="col-md-2">

                                <h4>All Sub-category</h4>

                            </div>

                        </div>
                        <br><br>
                    </div>
                </div>
            </div>
            <div class="card-body">
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
                        <td><button class="btn btn-primary" wire:click="edit_coupane({{ $coupane->id }})">
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
@elseif($edit_subcategory == true)
@livewire('admin.coupane.subcategory.edit',[
'coupane_id' => $coupane_id
])
@elseif($inactive_list_subcategory == true)
@livewire('admin.coupane.subcategory.inactive')
@endif




</div>
