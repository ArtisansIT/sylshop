<div>
    <div class="row">
        <div class="col-12">
           
            <table class="table table-striped" id="table-1">
                <thead>
                  <tr>
                    <th class="text-center">
                      #
                    </th>
                    <th> Name</th>
                    {{-- <th>Picture</th> --}}
                    <th>Created_at</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($shops as $shop)
                        
                    <tr>
                      <td>
                        {{ $loop->index+1 }}
                      </td>
                      <td>{{ $shop->name }}</td>
                      {{-- <td>
                        <img alt="image" src="{{ asset('images/'.$shop->image->url) }}" width="35">
                      </td> --}}
                      <td>{{ $shop->created_at->diffForHumans() }}</td>
                      <td><a href="#" 
                       
                        class="btn btn-primary" data-toggle="modal" data-target="#exampleModa{{ $shop->id }}">image</a></td>
                      <td><a href="#"
                        {{-- onclick="confirm('Are you want To delete') || event.stopImmediatePropagation()" --}}
                        {{-- wire:click="deleteshop({{ $shop->id }})" --}}
                        class="btn btn-primary">Delete</a></td>
                    </tr>


                    <div class="modal fade" id="exampleModa{{ $shop->id }}" tabindex="-1" role="dialog" aria-labelledby="formModal"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="formModal">{{ $shop->name}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                               
                                <div class="modal-body">
                                    <form action="{{ route('admin.shop.store',$shop->id) }}" enctype="multipart/form-data" method="post" >
                                        @csrf
                                        <div class="form-group">
                                            <label>Image</label>
                                            <div class="input-group">
                                               
                                                <input type="file" class="form-control"  name="image">
                                            </div>
                                        </div>
                
                                        <button class="btn mt-2 btn-primary">Primary</button>
                                    </form>
                                        <div class="form-group mb-0">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" name="remember" class="custom-control-input" id="remember-me">
                                                <label class="custom-control-label" for="remember-me">Remember Me</label>
                                            </div>
                                        </div>
                                     
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                   
                </tbody>
              </table>

                           

        </div>
    </div>

</div>
