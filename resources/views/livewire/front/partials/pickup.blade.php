<div>
    <div class="select-custom">
        <select wire:model="pickup_id"
        wire:change="changePickup"
        class="form-control">
            <option value="" selected="selected">Pickup Station Address
            </option>
            @foreach ($pickups as $pickup)
                
            <option value="{{ $pickup->id }}">{{ $pickup->address }}</option>
            @endforeach
            
        </select>
    </div><!-- End .select-custom -->
</div>
