
{{-- @section('header')
     <link rel="stylesheet" href="{{ asset('admin/assets/bundles/summernote/summernote-bs4.css') }}">
@endsection --}}
<div>
    <div class="row">
        <div class="col-md-10 offset-md-1 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-body">

                    <form wire:submit.prevent="submitForm">
                        <div class="form-group ">
                            <label><code>*</code><strong>short_description</strong>
                                @error('short_description')<code>{{ $message }}</code>
                                @enderror</label>


                            {{-- <textarea wire:model="short_description" class="form-control"></textarea> --}}
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <textarea wire:model="short_description" class="summernote"></textarea>
                            </div>

                        </div>
                        <div class="form-group ">
                            <label><code>*</code><strong>long_description</strong>
                                @error('long_description')<code>{{ $message }}</code>
                                @enderror</label>


                            {{-- <textarea wire:model="long_description" class="form-control"></textarea> --}}
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <textarea wire:model="long_description" class="summernote"></textarea>
                            </div>

                        </div>


                        <div class="form-group row mb-4">
                            <label><code>*</code><strong>ship_return</strong>
                                @error('ship_return')<code>{{ $message }}</code>
                                @enderror</label>
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <textarea wire:model="ship_return" class="summernote"></textarea>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- @section('footer')
    <script src="{{ asset('admin/assets/bundles/summernote/summernote-bs4.js') }}"></script>
  <script src="{{ asset('admin/assets/bundles/ckeditor/ckeditor.js') }}"></script>
  <script src="{{ asset('admin/assets/js/page/ckeditor.js') }}"></script>
@endsection --}}
