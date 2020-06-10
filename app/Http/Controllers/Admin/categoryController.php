<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Category;
use App\Alert\Sweetalert;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use App\Http\Requests\CategoryRequest;
use RealRashid\SweetAlert\Facades\Alert;
use App\Repositories\CategoryRepositories;

class categoryController extends Controller
{

    private $categoryRepositories;
    private $sweetalert;

    public function __construct(CategoryRepositories $categoryRepositories, Sweetalert $sweetalert)
    {
        $this->categoryRepositories = $categoryRepositories;
        $this->sweetalert = $sweetalert;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->sweetalert->alert();
        return view('admin.category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->sweetalert->alert();
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {


        $category = Category::create($request->only(['name']));
        $category->image()->create(['url' => $this->categoryRepositories->resizeImage($request, 131, 117, 'category')]);
        return redirect()->back()->withSuccess('asdfasdfsdf');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        if (isset($category->image->url)) {

            \File::delete('images/' . $category->image->url);
            $category->image()->delete();
            $category->image()->create(['url' => $this->categoryRepositories->resizeImage($request, 131, 117, 'category')]);
            return redirect()->back()->withSuccess('asdfasdfsdf');
        }
        $category->image()->create(['url' => $this->categoryRepositories->resizeImage($request, 131, 117, 'category')]);
        return redirect()->back()->withSuccess('asdfasdfsdf');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
