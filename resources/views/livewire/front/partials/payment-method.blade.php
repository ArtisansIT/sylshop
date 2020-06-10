<div>
    <form wire:submit.prevent="confirmOrder">
        <div class="row">
            <div class="col-md-6">
                <label>Your Name </label>
                @error('orderDetails.name')<code>{{ $message }}</code> @enderror
                <div class="mb-2"></div>
                <input wire:model.lazy="orderDetails.name" type="text" class="form-control">

        
                <label>Phone *</label>
                @error('orderDetails.mobile')<code>{{ $message }}</code> @enderror
                <div class="mb-2"></div>
                <input wire:model.lazy="orderDetails.mobile" type="text" class="form-control" required>

              



            </div>
            <div class="col-md-6">

                
                <div class="form-group">
                    <label><code>*</code><strong>Address *</strong>
                        @error('orderDetails.address')<code>{{ $message }}</code> @enderror</label>

                    <input wire:model.lazy="orderDetails.address"  type="text" class="form-control"
                        placeholder="House number, Subdistrict name and District name" required>
                </div>
              
               


                <div class="form-group">
                    <label><code>*</code><strong>Payment Method *</strong>
                        @error('orderDetails.paymentOption')<code>{{ $message }}</code> @enderror</label>

                    <div class="select-custom">

                        <select wire:model.lazy="orderDetails.paymentOption" class="form-control">
                            <option value="#" selected="selected">Select One Payment Method</option>
                            @foreach ($payments as $payment)

                            <option value="{{ $payment->id }}">{{ $payment->name }}</option>
                            @endforeach

                        </select>

                    </div><!-- End .select-custom -->
                </div>

            

                <div class="form-group">
                    <label><code>*</code><strong>Pickup Point </strong>
                      </label>

                    @livewire('front.partials.pickup')
                </div>
            

                  <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">
                    Order Confirm
                </button>




            </div>
    </form>
</div>








</div>
