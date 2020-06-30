<div>
    <div class="col-12 col-md-12 col-lg-12">
        <div class=" author-box">
            <div class="card-header">
                <h4>Product Details</h4>
            </div>
            <div class="card-body">
                <div class="author-box-center">
                    <img alt="image" src="{{ asset('images/'.$product['product']['image'][0]['url']) }}"
                        class="rounded-circle author-box-picture">
                    <div class="clearfix"></div>
                    <div class="author-box-name">
                        <a href="#">{{ $product['product']['name'] }}</a>
                    </div>
                    {{-- <div class="author-box-job">Web Developer</div> --}}
                </div>
                {{-- <div class="text-center">

                    <div class="mb-2 mt-3">
                        <div class="text-small font-weight-bold">Make Your Comment</div>
                    </div>
                </div> --}}


                <form wire:submit.prevent="saveComment">

                    <div class="form-group">
                        <label><code>*</code><strong>Reviews *</strong>
                            @error('reviewQuote')<code>{{ $message }}</code> @enderror
                        </label>



                        <select wire:model.lazy="reviewQuote" class="form-control">
                            <option value="" selected="selected">Select One review from list </option>
                            @foreach ($citems as $citem)

                            <option value="{{ $citem->id }}">{{ $citem->name }}</option>
                            @endforeach

                        </select>


                    </div>
                    <div class="form-group">
                        <label><code>*</code><strong>Rating *</strong>
                            @error('rating')<code>{{ $message }}</code> @enderror
                        </label>



                        <select wire:model.lazy="rating" class="form-control">
                            <option value="" selected="selected">please Rate our product </option>


                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>

                        </select>


                    </div>
                    <div class="form-group">
                        <label><code></code><strong>comment</strong> </label>

                        <textarea wire:model.lazy="shortComment" class="form-control"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit Comment</button>


                </form>
                <div class="w-100 d-sm-none"></div>
                <div class="text-md-right">
                   
                  <button wire:click.prevent="back_to_single_page" class="btn btn-danger btn-icon icon-left">
                            <i class="fas fa-times"></i> Back</button>
                </div>
               

            </div>
        </div>
    </div>



    {{-- <div class="card author-box">
                  <div class="card-body">
                    <div class="author-box-center">
                      <img alt="image" src="assets/img/users/user-1.png" class="rounded-circle author-box-picture">
                      <div class="clearfix"></div>
                      <div class="author-box-name">
                        <a href="#">Sarah Smith</a>
                      </div>
                      <div class="author-box-job">Web Developer</div>
                    </div>
                    <div class="text-center">
                      <div class="author-box-description">
                        <p>
                          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur voluptatum alias molestias
                          minus quod dignissimos.
                        </p>
                      </div>
                      <div class="mb-2 mt-3">
                        <div class="text-small font-weight-bold">Follow Hasan On</div>
                      </div>
                      <a href="#" class="btn btn-social-icon mr-1 btn-facebook">
                        <i class="fab fa-facebook-f"></i>
                      </a>
                      <a href="#" class="btn btn-social-icon mr-1 btn-twitter">
                        <i class="fab fa-twitter"></i>
                      </a>
                      <a href="#" class="btn btn-social-icon mr-1 btn-github">
                        <i class="fab fa-github"></i>
                      </a>
                      <a href="#" class="btn btn-social-icon mr-1 btn-instagram">
                        <i class="fab fa-instagram"></i>
                      </a>
                      <div class="w-100 d-sm-none"></div>
                    </div>
                  </div>
                </div> --}}
</div>
