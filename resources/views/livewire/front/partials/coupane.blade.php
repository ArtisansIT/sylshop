<div>
    <div class="cart-discount">
        @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        <div class="mb-5"></div>
        @endif


        <form wire:submit.prevent="addCoupane">

            <div class="input-group">

                <input type="text" class="form-control" wire:model="coupane" required placeholder="coupon code">
                <div class="input-group-append">
                    <button class="btn btn-outline-primary-2" type="submit">

                        <i class="icon-long-arrow-right"></i>
                    </button>
                </div><!-- .End .input-group-append -->

            </div><!-- End .input-group -->
        </form>
    </div>
</div>
