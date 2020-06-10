<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <div class="">
                    <div class="card-header">
                        <h4>Shop section</h4>
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
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>

                                    {{-- <th> Name</th> --}}
                                    <th> Name</th>
                                    <th>Category</th>
                                    <th>shop</th>
                                    <td>upload Image</td>
                                    


                                </tr>
                                @foreach ($subcategorys as $subcategory)

                                <tr>

                                    <td>{{ isset($subcategory->name ) ? $subcategory->name  : ''}}</td>

                                    <td>{{ $subcategory->category->name ? $subcategory->category->name : '' }}</td>
                                    <td>{{ $subcategory->shop->name ? $subcategory->shop->name : '' }}</td>



                                    <td><button class="btn btn-primary"
                                            wire:click="pendingImage({{ $subcategory->id }})">Pending Image</button></td>

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
