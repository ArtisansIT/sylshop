@extends('admin.layouts.app')


@section('mainContent')
{{-- <div class="section-body"> --}}



<div>
    <div class="row">
        <div class="col-md-8 offset-md-2 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header">
                   
                    <h4>Create new Category</h4>
                    

                    <div class="card-header-action">
                        <a href="{{ route('admin.category.index') }}" class="btn btn-primary">
                            View All
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    
                    <form action="{{ route('admin.category.store') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="form-group">
                            <label><code>*</code><strong>Category name</strong> @error('name')<code>{{ $message }}</code> @enderror</label>
                             
                            <input type="text" name="name" class="form-control form-control-sm">
                        </div>
    
                        <div class="form-group">
                            <label><strong>Category Image</strong> @error('image')<code>{{ $message }}</code> @enderror</label>
                            <input type="file"  name="image" class="form-control">
                        </div>
    
                       
    
                        <button class="btn btn-primary">Primary</button>
    
                        
                    </form>
                  
                </div>
            </div>
        </div>
    
    </div>



    
</div>


@endsection


