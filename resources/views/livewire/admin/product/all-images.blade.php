<div>

    <div class="card-header">
        <h4>{{$allimages->name  }}</h4>
        <div class="card-header-action">
            <button wire:click="imageInsert({{ $allimages->id }})"  class="btn btn-success">Add new Image</button>
        </div>
    </div>
    <div class="card-body">

        <ul class="list-unstyled user-progress list-unstyled-border list-unstyled-noborder">
            @foreach ($allimages->image as $imagee)

            <li class="media">
                <img alt="image" class="mr-3 " width="200" src="{{ asset('images/'.$imagee->url) }}">
                <div class="media-body">
                    <div class="media-title"></div>
                    <div class="text-job text-muted">Web Developer</div>
                </div>

                <div class="media-cta">
                    <button  wire:click="single_product_image_delete({{ $imagee->id }})"  class="btn btn-outline-danger">Delete</button>
                    <button   wire:click="single_product_image_update({{ $imagee->id }})"  class="btn btn-outline-primary">Update</button>
                </div>
            </li>
            @endforeach

        </ul>
    </div>
</div>
