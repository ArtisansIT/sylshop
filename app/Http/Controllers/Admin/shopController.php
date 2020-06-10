<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Shop;
use App\Alert\Sweetalert;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepositories;
use App\Http\Requests\shopImageUploadRequest;

class shopController extends Controller
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
        return view('admin.shop.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->sweetalert->alert();
        return view('admin.shop.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Shop $shop)
    {
        dd($shop);
        $shop->image()->create(['url' => $this->categoryRepositories->resizeImage($request)]);
        return redirect()->back()->withSuccess('shop create');
    }

    public function all_pending_shop()
    {
        $shops = Shop::all();
        return view('admin.shop.pending', compact('shops'));
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
    public function update(shopImageUploadRequest $request, Shop $shop)
    {
        $shop->status = true;
        $shop->save();
        $shop->image()->create([
            'url' => $this->categoryRepositories->resizeImage($request, 280, 280, 'shop'),
            'banner' => $this->categoryRepositories->resizeImage($request, 932, 260, 'shop_banner')
        ]);
        return redirect()->back()->withSuccess('shop create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }

    public function update_image(Request $request, Shop $image_select_id)
    {

        if ($request->image && $request->banner) {

            \File::delete('images/' . $image_select_id->image->url);
            $image_select_id->image()->update(['url' => $this->categoryRepositories->resizeImage($request, 280, 280, 'shop')]);


            \File::delete('images/' . $image_select_id->image->banner);
            $image_select_id->image()->update(['banner' => $this->categoryRepositories->resizeImage($request, 932, 260, 'shop_banner')]);
        } elseif ($request->image) {
            \File::delete('images/' . $image_select_id->image->url);
            $image_select_id->image()->update(['url' => $this->categoryRepositories->resizeImage($request, 280, 280, 'shop')]);
        } else {
            \File::delete('images/' . $image_select_id->image->banner);
            $image_select_id->image()->update(['banner' => $this->categoryRepositories->resizeImage($request, 932, 260, 'shop_banner')]);
        }
        return redirect()->back();
    }
}
