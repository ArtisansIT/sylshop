<?php

namespace App\Http\Livewire\Admin\Subcategory;

use App\Admin\Shop;
use App\Admin\Product;
use App\Admin\Category;
use Livewire\Component;
use App\Alert\Sweetalert;
use App\Admin\Subcategory;

class Create extends Component
{

    public $category;
    public $categoryies;
    public $shops = [];
    public $shop;
    public $name;
    public $goto_create_page;
    public $goto_index_page;
    public $goto_inactive_page;
    public $goto_edit_page;
    public $goto_image_upload_page;
    public $goto_image_update_page;
    public $goto_pending_page;


    public $subcategory_id;



    public $selected_id;

    protected $listeners = [
        'edit',
        'softDelete_subcategory',
        'restore',
        'forceDelete',
        'pendingImage',
        'updateImage',

    ];

    public function mount()
    {
        $this->goto_create_page = true;
        $this->goto_index_page = false;
        $this->goto_inactive_page = false;
        $this->goto_edit_page = false;
        $this->goto_image_upload_page = false;
        $this->goto_image_update_page = false;
        $this->goto_pending_page = false;
    }

    public function pageReset()
    {
        $this->goto_create_page = false;
        $this->goto_index_page = false;
        $this->goto_inactive_page = false;
        $this->goto_edit_page = false;
        $this->goto_image_upload_page = false;
        $this->goto_image_update_page = false;
        $this->goto_pending_page = false;
    }


    public function render()
    {
        if (!empty($this->category)) {
            $this->shops = Shop::where([
                ['category_id', $this->category],
                ['deleted_at', null],
                ['status', true]
            ])->get();
        }
        return view('livewire.admin.subcategory.create')
            ->withCategorys(Category::orderBy('name')->get());
    }

    public function submitForm()
    {

        $this->validate([
            'name' => 'required',
            'category' => 'required',
            'shop' => 'required',
        ]);


        $data = Subcategory::create([
            'name' => $this->name,
            'category_id' => $this->category,
            'shop_id' => $this->shop,

        ]);
        $this->subcategory_id = $data->id;
        $this->pageReset();
        $this->goto_image_upload_page = true;
    }

    public function go_index_page()
    {
        $this->pageReset();
        $this->goto_index_page = true;
    }

    public function go_create_page_from_index()
    {

        $this->reset();
        $this->goto_create_page = true;
    }
    public function go_inactive_page()
    {
        $this->pageReset();
        $this->goto_inactive_page = true;
    }


    public function edit($id)
    {


        $record = Subcategory::findOrFail($id);
        $this->selected_id = $id;
        $this->name = $record->name;
        $this->category = $record->category_id;
        $this->shop = $record->shop_id;
        $this->categoryies = Category::orderBy('name')->get();
        if (!empty($this->category)) {
            $this->shops = Shop::where([
                ['category_id', $this->category],
                ['deleted_at', null],
                ['status', true]
            ])->get();
        }

        $this->pageReset();
        $this->goto_edit_page = true;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required',
            'category' => 'required',
            'shop' => 'required',
        ]);

        if ($this->selected_id) {
            $record = Subcategory::find($this->selected_id);
            $record->update([
                'name' => $this->name,
                'category_id' => $this->category,
                'shop_id' => $this->shop,

            ]);

            $this->reset();
            $this->goto_index_page = true;
        }
    }


    public function goto_pending_page()
    {
        $this->pageReset();
        $this->goto_pending_page = true;
    }

    public function pendingImage($subcategory)
    {
        $this->subcategory_id = $subcategory;
        $this->pageReset();
        $this->goto_image_upload_page = true;
    }


    public function updateImage($subcategory)
    {
        $this->subcategory_id = $subcategory;
        $this->pageReset();
        $this->goto_image_update_page = true;
    }



    public function softDelete_subcategory($id)
    {
        Subcategory::findOrfail($id)->delete();
        $this->pageReset();
        $this->goto_inactive_page = true;
    }
    public function restore($id)
    {

        Subcategory::where('id', $id)->onlyTrashed()->first()->restore();
        $this->pageReset();
        $this->goto_index_page = true;
    }
    public function forceDelete($id)
    {
        $products = Product::onlyTrashed()->where([
            ['subcategory_id', $id],
        ])->get();

        if ($products->count() <= 0) {
            $subcategory = Subcategory::where('id', $id)
                ->onlyTrashed()
                ->first();


            \File::delete('images/' . $subcategory->image->url);
            $subcategory->image->delete();
            $subcategory->forceDelete();
            $this->pageReset();
            $this->goto_index_page = true;
        } else {
            session()->flash('message', 'Can not Delete Sub-category , 
            First Delete all Products.');
            return redirect()->route('admin.subcategory_create');
        }
    }
}
