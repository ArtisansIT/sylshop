<div>
     {{-- @if ($productBasePrice) --}}

 <div class="product-price">
     @if (empty($product->offer_price))

     <span class="new-price">TK.{{ $product->main_price }}</span>

     @else

     <span class="new-price">TK.{{ $product->offer_price }}</span>
     <span class="old-price"> TK{{ $product->main_price  }}</span>
     @endif
 </div>
{{-- 
 @else
 <div class="product-price">
     @if (empty($productVariation->offer_price))

     <span class="new-price">TK.{{ $productVariation->sale_price }}</span>

     @else

     <span class="new-price">TK.{{ $productVariation->sale_price }}</span>
     <span class="old-price">Was TK{{ $productVariation->offer_price  }}</span>
     @endif
 </div>
 @endif --}}

 <div class="product-content">
     <p>
         {{-- {{$product->short_description  }} --}}
         {{-- {!! htmlspecialchars_decode( ) !!} --}}
         {!! nl2br(e($product->short_description)) !!}
     </p>
 </div>
 <div>
     <div class="details-filter-row details-row-size">
         <label for="size">Variation:</label>
         <div class="select-custom">
             <select wire:model="variation_id" wire:change="changeVariation"  class="form-control">
                 <option  value=""> Main Product</option>
                 @foreach ($product->variations as $variation)

                 <option value="{{ $variation->id }}">{{ $variation->name }}</option>
                 @endforeach

             </select>
         </div><!-- End .select-custom -->

         <a href="#" class="size-guide"><i class="icon-th-list"></i>View {{ $product->view }}</a>

     </div><!-- End .details-filter-row -->
 </div>
</div>
