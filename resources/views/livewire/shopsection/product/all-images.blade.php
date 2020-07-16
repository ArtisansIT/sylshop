<div>

    @if ($index_page_all_image == true)
    <div class="card-header">
        <h4>{{$product->name  }}</h4>
        <div class="card-header-action">
            <button wire:click="imageInsert" class="btn btn-success">Add new
                Image</button>
        </div>
    </div>
    <div class="card-body">

        <ul class="list-unstyled user-progress list-unstyled-border list-unstyled-noborder">
            @foreach ($product->image as $singleImage)

            <li class="media">
                <img alt="image" class="mr-3 " width="200" src="{{ asset('images/'.$singleImage->url) }}">
                <div class="media-body">
                    <div class="media-title"></div>
                    <div class="text-job text-muted">Web Developer</div>
                </div>

                <div class="media-cta">
                    <button wire:click="image_delete({{ $singleImage->id }})"
                        class="btn btn-outline-danger">Delete</button>
                    <button wire:click="image_update({{ $singleImage->id }})"
                        class="btn btn-outline-primary">Update</button>
                </div>
            </li>
            
            @endforeach

        </ul>
    </div>

    @elseif($create_image_page == true)

    @livewire('shopsection.product.image-create' ,[
    'product' => $ProductWithAllImage
    ]);
    @elseif($update_image_page == true)

    @livewire('shopsection.product.image-update' ,[
    'product' => $update_image_id
    ]);

    @endif
</div>
