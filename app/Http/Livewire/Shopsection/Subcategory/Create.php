<?php

namespace App\Http\Livewire\Shopsection\Subcategory;

use App\Admin\Product;
use Livewire\Component;
use App\Admin\Subcategory;
use App\Events\OrderEvent;
use Livewire\WithFileUploads;
use Intervention\Image\ImageManagerStatic;

class Create extends Component
{
    use WithFileUploads;
    public $name;
    public $photo;
    public $imageName;
    public $selected_id;
    public $subcategory_id_for_imageUpdate;


    public $goto_create_page;
    public $goto_index_page;
    public $goto_inactive_page;
    public $goto_edit_page;
    public $goto_image_update_page;


    protected $listeners = [
        'SCFSSedit' => 'edit', // SCFSS == subCategory for Shop Section
        'SCFSSsoftDelete_subcategory' => 'softDelete_subcategory',
        'SCFSSrestore' => 'restore',
        'SCFSSforceDelete' => 'forceDelete',
        'SCFSSupdateImage' => 'updateImage',
        'backToMainPage' => 'go_index_page',

    ];
    public function render()
    {
        return view('livewire.shopsection.subcategory.create');
    }

    public function mount()
    {
        $this->goto_create_page = true;
        $this->goto_index_page = false;
        $this->goto_inactive_page = false;
        $this->goto_edit_page = false;
        $this->goto_image_update_page = false;
    }

    public function pageReset()
    {
        $this->goto_create_page = false;
        $this->goto_index_page = false;
        $this->goto_inactive_page = false;
        $this->goto_edit_page = false;
        $this->goto_image_update_page = false;
    }

    public function submitForm()
    {


        // dd('dfdfdfdf');
        $this->validate([
            'photo' => 'required|image|max:1024', // 1MB Max
            'name' => 'required'
        ]);



        $current =  Subcategory::create([
            'category_id' => auth()->user()->shop->category_id,
            'shop_id' => auth()->user()->shop->id,
            'name' => $this->name,
            'status' => true,
        ]);
        $this->resizeImage();
        $current->image()->create([
            'url' => $this->imageName,
        ]);



        session()->flash('message', 'Post successfully updated.');

        $this->name = '';
        $this->photo = '';
        $this->imageName = '';
    }

    public function resizeImage()
    {
        $this->imageName  = $this->imageNameCreate();
        $imgPath = 'images/' . $this->imageName;
        ImageManagerStatic::make($this->photo)->resize(200, 100)->encode('jpg')->save($imgPath);
    }
    public function imageNameCreate()
    {
        return  time() . '_' . uniqid() . '_' . 'subcategory' . '.jpg';
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
        $this->pageReset();
        $this->goto_edit_page = true;
    }


    public function update()
    {
        $this->validate([
            'name' => 'required',
        ]);

        if ($this->selected_id) {
            $record = Subcategory::find($this->selected_id);
            $record->update([
                'name' => $this->name,
            ]);

            $this->reset();
            $this->goto_index_page = true;
        }
    }

    public function updateImage($subcategory)
    {
        $this->subcategory_id_for_imageUpdate = $subcategory;

        // dd($this->subcategory_id_for_imageUpdate);
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
            $this->pageReset();
            $this->goto_index_page = true;
        }
    }
}
