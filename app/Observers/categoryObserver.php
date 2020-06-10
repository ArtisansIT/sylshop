<?php

namespace App\Observers;

use App\Admin\Category;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class categoryObserver
{
    /**
     * Handle the category "created" event.
     *
     * @param  \App\Admin\Category  $category
     * @return void
     */
    public function creating(Category $category)
    {
        // dd($category->all());
        // if (!empty( $category->image)) {
           
        //     $image = $category->image;
        //     $originalExtension = $image->getClientOriginalExtension();
        //     $imgName = time().'_'. uniqid().'category'.'.'. $originalExtension;
        //     $imgPath = 'images/' . $imgName;
        //     Image::make($image)->resize(131, 117)->save( $imgPath);
        //     $category->image = $imgName;

        // }

    }

    /**
     * Handle the category "updated" event.
     *
     * @param  \App\Admin\Category  $category
     * @return void
     */
    public function updated(Category $category)
    {
        //
    }

    /**
     * Handle the category "deleted" event.
     *
     * @param  \App\Admin\Category  $category
     * @return void
     */
    public function deleted(Category $category)
    {
        //
    }

    /**
     * Handle the category "restored" event.
     *
     * @param  \App\Admin\Category  $category
     * @return void
     */
    public function restored(Category $category)
    {
        //
    }

    /**
     * Handle the category "force deleted" event.
     *
     * @param  \App\Admin\Category  $category
     * @return void
     */
    public function forceDeleted(Category $category)
    {
        //
    }
}
