<?php

namespace App\Http\Controllers\Admin\Product;

use App\Admin\Product;
use App\Alert\Sweetalert;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepositories;

class prosuctController extends Controller
{
    public function __construct(CategoryRepositories $categoryRepositories)
    {
        $this->categoryRepositories = $categoryRepositories;
        // $this->sweetalert = $sweetalert;
    }

    public function store(Request $request, Product $product)
    {
        if (!empty($product->stock)) {

            $product->status = true;
            $product->save();
            $product->image()->create(['url' => $this->categoryRepositories->resizeImage($request, 460, 460, 'product')]);
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }
}
