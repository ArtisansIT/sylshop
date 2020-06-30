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
                 <label><code>*</code><strong>Shipping Information *</strong>


                @if ($address_section_active == true)

                <div class="form-group">
                    <label><code>*</code><strong>Address *</strong>
                        @error('orderDetails.address')<code>{{ $message }}</code> @enderror</label>

                    <input wire:model.lazy="orderDetails.address" type="text" class="form-control"
                        placeholder="House number, Subdistrict name and District name" required>
                </div>
                @endif
                @if($pickup_section_active == true)

                <div class="form-group">
                    <label><code>*</code><strong>Pickup Point </strong>
                    </label>

                    @livewire('front.partials.pickup')
                </div>
                @endif

                <div class="form-group">
                   
                        @if ($paymentField_address == true)
                        <div class="filter-item">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" wire:change="address_button_click" class="custom-control-input"
                                    id="brand-6">
                                <label class="custom-control-label" for="brand-6">Address</label>
                            </div><!-- End .custom-checkbox -->
                        </div><!-- End .filter-item -->
                        @endif
                        @if($paymentField_pickup == true)
                        <div class="filter-item">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" wire:change="pickup_button_click" class="custom-control-input"
                                    id="pickup-6">
                                <label class="custom-control-label" for="pickup-6">Pickup Point</label>
                            </div><!-- End .custom-checkbox -->
                        </div><!-- End .filter-item -->
                        @endif
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






                <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">
                    Order Confirm
                </button>




            </div>
    </form>
</div>








</div>
