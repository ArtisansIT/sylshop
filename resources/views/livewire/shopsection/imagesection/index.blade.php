<div>
    @if ($index_inage_banner == true)
        
    <h2>Shop Image and Banner</h2>
    
    <div class="row ">

        <div class="col-xl-6 col-lg-6">
            <a href="#" wire:click="image">
                <div class="card l-bg-purple">
                    <div class="card-statistic-3">
                        <div class="card-icon card-icon-large"><i class="fa fa-briefcase"></i></div>
                        <div class="card-content">
                            <h5 class="card-title">Shop Image</h5>
                          

                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-6 col-lg-6">
            <a href="#" wire:click="banner">
                <div class="card l-bg-purple">
                    <div class="card-statistic-3">
                        <div class="card-icon card-icon-large"><i class="fa fa-globe"></i></div>
                        <div class="card-content">
                            <h5 class="card-title">Shpo Banner</h5>
                          
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    @elseif($image_page == true)
        @livewire('shopsection.imagesection.image')
    @endif
</div>
