<?php

namespace App\Http\Livewire\Admin\Coupane;

use Livewire\Component;

class Create extends Component
{

    public $indexPage;
    public $go_Category;
    public $go_subCategory;
    public $go_shop;
    public $go_user;
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
        $this->go_user = false;
        $this->all_caoupane = false;
        $this->show_navigation = false;
    }

    public function pageReset()
    {
        $this->indexPage = false;
        $this->go_Category = false;
        $this->go_subCategory = false;
        $this->go_shop = false;
        $this->go_user = false;
        $this->all_caoupane = false;
        $this->show_navigation = true;
    }
    public function render()
    {
        return view('livewire.admin.coupane.create');
    }

    public function go_index()
    {
        $this->pageReset();
        $this->indexPage = true;
    }
    public function go_category()
    {
        $this->pageReset();
        $this->go_Category = true;
    }
    public function go_shop()
    {
        $this->pageReset();
        $this->go_shop = true;
    }
    public function go_user()
    {
        $this->pageReset();
        $this->go_user = true;
    }
    public function go_subCategory()
    {
        $this->pageReset();
        $this->go_subCategory = true;
    }

    public function coupaneCreate()
    {
        $this->mount();
    }
}
