<div>

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        <span>

                            {{-- Order NO : #{{$orderCode  }} --}}
                        </span>


                    </h4>
                    <div class="card-header-form">

                        <button wire:click="$emit('back')" class="btn btn-danger btn-icon icon-left">
                            <i class="fas fa-times"></i> Back
                        </button>
                    </div>

                </div>
                <div class="card-body">

                    <div id="aniimated-thumbnials" class="list-unstyled row clearfix">
                        @foreach ($product->image as $item)
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <a href="#" >
                                <img class="img-responsive thumbnail" src="{{ asset('images/'.$item->url) }}" alt="">
                            </a>
                        </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-6 col-lg-9">
            <div>
                <div class="card-header">
                    <h4 class="text-info">
                        <span>
                            Product status :
                        </span>
                        <span  class="text-danger">
                            {{ $product->status ? 'Active' : 'In -Active'  }}
                        </span>
                    </h4>
                </div>
                <div class="card-body">
                   <div class="table-responsive">
                      <table class="table table-bordered table-md">

                        <tbody>
                            <tr>
                                <th scope="row">Code</th>
                                <td>{{ $product->code }}</td>

                            </tr>
                            <tr>
                                <th scope="row">Name</th>
                                <td>{{ $product->name }}</td>

                            </tr>
                            <tr>
                                <th scope="row">Product Code</th>
                                <td>{{!empty( $product->code) ?  $product->code: 'No Product Code' }}</td>

                            </tr>
                            <tr>
                                <th scope="row">category</th>
                                <td>{{ $product->category->name }}</td>

                            </tr>
                            <tr>
                                <th scope="row">Shop</th>
                                <td>{{ $product->shop->name }}</td>

                            </tr>
                            <tr>
                                <th scope="row">subcategory</th>
                                <td>{{ $product->subcategory->name }}</td>

                            </tr>
                            <tr>
                                <th scope="row">main_price</th>
                                <td>{{ $product->main_price }}</td>

                            </tr>
                            <tr>
                                <th scope="row">offer_price</th>
                                <td>{{!empty($product->offer_price) ?$product->offer_price: 'No Offer Price'  }}</td>

                            </tr>
                            <tr>
                                <th scope="row">short description</th>
                                <td> {!! nl2br(e($product->short_description)) !!}</td>
                                

                            </tr>
                            <tr>
                                <th scope="row">Long description</th>
                                 <td> {!! nl2br(e($product->long_description)) !!}</td>
                              

                            </tr>
                            <tr>
                                <th scope="row">ship_return</th>
                             <td> {!! nl2br(e($product->ship_return)) !!}</td>

      

                            </tr>
                            <tr>
                                <th scope="row">link</th>
                                <td>{{ $product->link }}</td>

                            </tr>
                            <tr>
                                <th scope="row">serch_tag</th>
                                <td>{{ $product->serch_tag }}</td>

                            </tr>
                            <tr>
                                <th scope="row">Main Stock</th>
                                <td>{{ $product->stock->stock }}</td>

                            </tr>
                            <tr>
                                <th scope="row">Variation Stock</th>
                                <td>{{ $product->stock->variation_stock }}</td>

                            </tr>

                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
            <div class="card-header">
              <h4 > Product Variation Details</h4>
          </div>
            @foreach ($product->variations as $variation)
            <div class="card">
                   <div class="card-body">
                     <div class="table-responsive">

                            
                        <table class="table table-bordered table-md">
                          <tr>
                            <th>Variation Name</th>
                            <th>{{ $variation->name }}</th>
                          </tr>
                          <tr>
                            <th>Variation Offer price</th>
                            <th>{{ $variation->offer_price }}</th>
                          </tr>
                          <tr>
                            <th>Variation Main price</th>
                            <th>{{ $variation->sale_price }}</th>
                          </tr>
                          <tr>
                            <th>Variation stock</th>
                            <th>{{ $variation->stock }}</th>
                          </tr>
                        
                        </table>
                    </div>
                </div>
                
            </div>
            @endforeach
        </div>
      
    </div>

</div>
