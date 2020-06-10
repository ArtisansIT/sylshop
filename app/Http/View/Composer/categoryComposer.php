<?php

namespace App\Http\View\Composer;

use App\Admin\Category;
use Illuminate\View\View;

class categoryComposer{

    public function allCategoryFromComposer(View $view)
    {
        $view->with('categorys',Category::with('image')->get());
    }

    // public function allCategoryQueryfromModel(){
    //     return Category::allCategory();
    // }
}