<div>
    <div class="ratings-container">
        @if ($like_count_by_user < 1)
            
            <p class="btn-product btn-wishlist addToCart-pointer"
            wire:click="like"
            title="Like">
            <span>Like</span>
            </p>
        @else 


        <p class="btn-product btn-wishlist addToCart-pointer"
          wire:click="unlike"
         title="Wishlist">
         <span>Unlike</span>
        </p>
        @endif
        <a class="ratings-text" href="#product-review-link"
         id="review-link">( {{ $like_count }} Like )</a>
    </div>


</div>
