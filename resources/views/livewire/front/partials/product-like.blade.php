<div>
    <div class="ratings-container">
        @if ($initial_status == true)
            
        <p class="btn-product btn-wishlist addToCart-pointer"
        {{-- wire:click="like" --}}
         title="Like"><span>Like</span></p>
        @endif
        <a class="ratings-text" href="#product-review-link" id="review-link">( 2 Reviews )</a>
        <p class="btn-product btn-wishlist addToCart-pointer" title="Wishlist"><span>Unlike</span></p>
    </div>


</div>
