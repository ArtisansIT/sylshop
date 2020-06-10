<?php

namespace App\Http\Controllers\Admin\Subcategory;

use App\Admin\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepositories;

class subcategoryController extends Controller
{

    private $categoryRepositories;

    public function __construct(CategoryRepositories $categoryRepositories)
    {
        $this->categoryRepositories = $categoryRepositories;
        // $this->sweetalert = $sweetalert;
    }
    public function imageUpload(Request $request, Subcategory $subcategory)
    {

        if ($request->hasFile('image')) {

            $request->validate([
                'image' => 'required|image'
            ]);
            $subcategory->status = true;
            $subcategory->save();
            $subcategory->image()->create([
                'url' => $this->categoryRepositories->resizeImage($request, 200, 100, 'subcategory'),
            ]);

            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }
    public function imageUpdate(Request $request, Subcategory $subcategory)
    {

        if ($request->hasFile('image')) {

            $request->validate([
                'image' => 'required|image'
            ]);
            \File::delete('images/' . $subcategory->image->url);
            $subcategory->image()->update([
                'url' => $this->categoryRepositories->resizeImage($request, 200, 100, 'subcategory'),
            ]);

            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }
}
