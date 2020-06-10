<div>
    @if ($show_navigation == true)
        
    <div class="row">
        <div class="col-12 ">
            <div class="">

                    <div class="card-header-action">

                        @if ($go_Category == false)
                        <a href="#"
                         wire:click="go_category"
                         class="btn btn-primary">
                            Category
                        </a>
                        @endif
                        @if ($indexPage == false)
                        <a href="#"
                         wire:click="go_index"
                         class="btn btn-primary">
                            Home
                        </a>
                        @endif

                        @if ($go_subCategory == false)

                        <a href="#"
                         wire:click="go_subCategory"
                          class="btn btn-primary">
                            Sub-Category
                        </a>
                        @endif

                        @if ($go_shop == false)

                        <a href="#"
                         wire:click="go_shop" 
                         class="btn btn-primary">
                           shop
                        </a>
                        @endif
                        @if ($all_caoupane == false)

                        <a href="#"
                         {{-- wire:click="go_in_actiove_page"  --}}
                         class="btn btn-primary">
                           All Cpupane
                        </a>
                        @endif
                    
                </div>
            </div>
        </div>
    </div>
    @endif
    <div class="mt-4"></div>
    @if ($indexPage == true)
        
    <div class="row">
        <div class="col-12 col-md-6 col-lg-3">
             
            <div class="card card-primary">
                <div class="card-header">
                    <a class="btn" 
                     wire:click="go_category"
                    
                    
                    href="#">
                        <h4>Category</h4>
                    </a>

                </div>
                <div class="card-body">
                    <p>Card <code>.card-primary</code></p>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
            <div class="card card-secondary">
                <div class="card-header">
                    <a class="btn"
                    wire:click="go_subCategory"
                    href="#">
                        <h4>Sub-Category</h4>
                    </a>
                </div>
                <div class="card-body">
                    <p>Card <code>.card-secondary</code></p>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
            <div class="card card-danger">
                <div class="card-header">
                    <a class="btn"
                     wire:click="go_shop"
                    href="#">
                        <h4>Shop</h4>
                    </a>
                </div>
                <div class="card-body">
                    <p>Card <code>.card-danger</code></p>
                </div>
            </div>
        </div>


    </div>
    @elseif($go_Category == true)
    @livewire('admin.coupane.category')
    @elseif($go_shop == true)
    @livewire('admin.coupane.shop')
    @elseif($go_subCategory == true)
    @livewire('admin.coupane.subcategory')
    @endif
</div>
