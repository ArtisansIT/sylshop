<?php

namespace App\Http\Livewire\Admin\Coupane;

use Livewire\Component;

class Create extends Component
{

    public $indexPage;
    public $go_Category;
    public $go_subCategory;
    public $go_shop;
    public $all_caoupane;
    public $show_navigation;


    protected $listeners = [
        'coupaneCreate',

    ];
    public function mount()
    {
        $this->indexPage = true;
        $this->go_Category = false;
        $this->go_subCategory = false;
        $this->go_shop = false;
        $this->all_caoupane = false;
        $this->show_navigation = false;
    }
    public function render()
    {
        return view('livewire.admin.coupane.create');
    }

    public function go_index()
    {
        $this->indexPage = true;
        $this->go_shop = false;
        $this->go_subCategory = false;
        $this->go_Category = false;
        $this->show_navigation = false;
    }
    public function go_category()
    {
        $this->indexPage = false;
        $this->go_shop = false;
        $this->go_subCategory = false;
        $this->go_Category = true;
        $this->show_navigation = true;
    }
    public function go_shop()
    {
        $this->indexPage = false;
        $this->go_Category = false;
        $this->go_subCategory = false;
        $this->go_shop = true;
        $this->show_navigation = true;
    }
    public function go_subCategory()
    {
        $this->indexPage = false;
        $this->go_Category = false;
        $this->go_shop = false;
        $this->go_subCategory = true;
        $this->show_navigation = true;
    }

    public function coupaneCreate()
    {
        $this->mount();
    }
}
