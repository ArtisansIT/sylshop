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




    public $category_all_page,
        $category_edit_page,
        $subcateogry_all_page,
        $subcateogry_edit_page,
        $shop_all_page,
        $shop_edit_page,
        $user_all_page,
        $user_edit_page;


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
        $this->category_all_page = false;
        $this->subcateogry_all_page = false;
        $this->shop_all_page = false;
        $this->user_all_page = false;
    }

    public function pageReset()
    {
        $this->indexPage = false;
        $this->go_Category = false;
        $this->go_subCategory = false;
        $this->go_shop = false;
        $this->go_user = false;
        $this->all_caoupane = false;
        $this->category_all_page = false;
        $this->subcateogry_all_page = false;
        $this->shop_all_page = false;
        $this->user_all_page = false;
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


    public function go_all_category()
    {
        $this->pageReset();
        $this->category_all_page = true;
    }
    public function go_all_shop()
    {
        $this->pageReset();
        $this->shop_all_page = true;
    }
    public function go_all_user()
    {
        $this->pageReset();
        $this->user_all_page = true;
    }
    public function go_all_subCategory()
    {
        $this->pageReset();
        $this->subcateogry_all_page = true;
    }

    public function coupaneCreate()
    {
        $this->mount();
    }
}
