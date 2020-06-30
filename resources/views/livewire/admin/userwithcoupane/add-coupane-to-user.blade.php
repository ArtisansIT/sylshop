<div>
    <div class="card-body">
        <form wire:submit.prevent="submitCoupane">

            <div>
                @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
                @endif
            </div>



            <div class="form-group">

                <label><code>*</code><strong>Select  Coupane </strong>
                    @error('selectedCoupane')<code>{{ $message }}</code> @enderror</label>
                <select wire:model="selectedCoupane" class="form-control">
                    <option selected value="">Select</option>
                    @foreach ($coupans as $coupane)
                    <option value="{{ $coupane->id }}"> {{ $coupane->name }}</option>

                    @endforeach

                </select>
            </div>




            <button class="btn btn-primary">Primary</button>


        </form>
    </div>
</div>
