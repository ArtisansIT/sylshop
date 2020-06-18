
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
                                <input type="text"  wire:model="search"  class="form-control" placeholder="Search">
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
                                <th>Image</th>
                                <th>Banner</th>
                                <th>Category</th>
                                <td>Pending</td>
                                <th>Edit</th>
                                <th>Image Update</th>

                                <th>Activation</th>
                            </tr>
                            @foreach ($shops as $shop)

                            <tr>
                              
                                 <td>{{ isset($shop->name ) ? $shop->name  : ''}}</td>
                                <td class="align-middle">

                                    <img alt="image" class="rounded-circle" @if (isset($shop->image->url))
                                        src="{{ asset('images/'.$shop->image->url) }}" width="35">
                                        @endif

                                </td>
                                <td class="align-middle">

                                    <img  class="" @if (!empty($shop->image->banner))
                                        src="{{ asset('images/'.$shop->image->banner) }}" @else alt="image" @endif width="70">
                                        
                                </td>
                                <td>{{ $shop->category->name ? $shop->category->name : '' }}</td>

                             

                                <td><button class="btn btn-primary"
                                    wire:click="editShop({{ $shop->id }})"
                                    >Edit</button></td>

                                <td><a href="#"
                                    wire:click="imageUpdate({{ $shop->id }})"
                                    class="btn btn-primary">Image Update</a></td>


                               

                                <td><a href="#"
                                    wire:click="softDeleteShop({{ $shop->id }})"
                                    class="btn btn-primary">In-Active</a></td>

                             
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
