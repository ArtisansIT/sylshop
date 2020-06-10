<div>
    <div class="product-details-action">
        <div class="details-action-col">
            <div class="product-details-quantity">
                <input type="number" id="qty" class="form-control" value="1" min="1" max="10" step="1" data-decimals="0"
                    required>
            </div><!-- End .product-details-quantity -->

            <button wire:click="$emit('ass')" class="btn-product btn-cart"><span>add to
                    cart</span></button>
        </div><!-- End .details-action-col -->

        <div class="details-action-wrapper">
            <a href="#" class="btn-product btn-wishlist" title="Wishlist"><span>Add to
                    Wishlist</span></a>
            <a href="#" class="btn-product btn-compare" title="Compare"><span>Add to
                    Compare</span></a>
        </div><!-- End .details-action-wrapper -->
    </div><!-- End .product-details-action -->
</div>


