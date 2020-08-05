<?php

namespace App\Http\Livewire\Shopsection\Coupane;

use App\Admin\Coupane;
use Livewire\Component;

class Create extends Component
{

    public $goto_create_page,
        $goto_all_page,
        $goto_inactive_page,
        $goto_edit_page;

    public $name, $code, $total, $discount;


    protected $listeners = [
        // 'coupaneCreate',

    ];
    public function mount()
    {
        $this->goto_create_page = true;
        $this->goto_all_page = false;
        $this->goto_inactive_page = false;
        $this->goto_edit_page = false;
    }

    public function pageReset()
    {
        $this->goto_create_page = false;
        $this->goto_all_page = false;
        $this->goto_inactive_page = false;
        $this->goto_edit_page = false;
    }
    public function render()
    {
        return view('livewire.shopsection.coupane.create');
    }

    public function submitForm()
    {
        $this->validate([
            'name' => 'required',
            'code' => 'required',
            'total' => 'required|numeric',
            'discount' => 'required|numeric',
        ]);

        Coupane::create([
            'category_id' => auth()->user()->shop->category_id,
            'shop_id' => auth()->user()->shop_id,
            'name' => $this->name,
            'code' => $this->code,
            'total' => $this->total,
            'discount' => $this->discount,
        ]);
        $this->pageReset();
        $this->goto_all_page = true;
    }

    public function go_create_page()
    {
        $this->pageReset();
        $this->goto_create_page = true;
    }
    public function go_all_page()
    {
        $this->pageReset();
        $this->goto_all_page = true;
    }
    public function go_inactive_page()
    {
        $this->pageReset();
        $this->goto_inactive_page = true;
    }
}
