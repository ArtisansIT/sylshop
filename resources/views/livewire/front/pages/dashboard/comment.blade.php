<div>

    <br><br><br>
    <h2 class="title text-center mb-3">{{ $product['product']['name'] }}</h2>

    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">
            <div class="banner banner-cat">

                <a href="#">
                    <img src="{{ asset('images/'.$product['product']['image'][0]['url']) }}" alt="Product image">
                </a>

                <div class="banner-content banner-content-static text-center">
                    <h3 class="banner-title">Product name: {{ $product['product']['name'] }}</h3><!-- End .banner-title -->
                   

                    {{-- <a href="#" class="banner-link">Shop Now</a> --}}
                </div><!-- End .banner-content -->

            </div><!-- End .banner -->
        </div><!-- End .col-md-6 -->

        <div class="col-md-6 col-lg-8">
            <form wire:submit.prevent="saveComment">

                <div class="form-group">
                    <label><code>*</code><strong>Reviews *</strong>
                        @error('reviewQuote')<code>{{ $message }}</code> @enderror
                    </label>

                    <div class="select-custom">

                        <select 
                        wire:model.lazy="reviewQuote"  
                        class="form-control">
                            <option value="" selected="selected">Select One review from list </option>
                            @foreach ($citems as $citem)

                            <option value="{{ $citem->id }}">{{ $citem->name }}</option>
                            @endforeach

                        </select>

                    </div><!-- End .select-custom -->
                </div>
                <div class="form-group">
                    <label><code>*</code><strong>Rating *</strong>
                        @error('rating')<code>{{ $message }}</code> @enderror
                    </label>

                    <div class="select-custom">

                        <select
                         wire:model.lazy="rating"  
                         class="form-control">
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

                    </div><!-- End .select-custom -->
                </div>
                <div class="form-group">
                    <label><code></code><strong>comment</strong> </label>

                    <textarea wire:model.lazy="shortComment" class="form-control"></textarea>
                </div>

                 <button type="submit" class="btn btn-primary">Submit Comment</button>
               

            </form>
            <br><br>
             <button type="submit" wire:click.prevent="back_to_single_page" class="btn btn-primary">Back</button>

        </div><!-- End .col-md-6 -->


    </div><!-- End .row -->
</div>
