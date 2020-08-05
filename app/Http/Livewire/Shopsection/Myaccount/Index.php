<?php

namespace App\Http\Livewire\Shopsection\Myaccount;

use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;
use App\Admin\Orderdetails as AdminOrderdetails;
use App\Admin\Product;

class Index extends Component
{

    public $order_balance_count, $order_balance_base_query, $order_balance_total;
    public $order_processing, $order_delevery, $rate, $order_processing_count, $order_delevery_count;
    public $index_page, $single_page, $single_product_page, $temp_variable;
    public $product_details_variable, $product_variation_variable, $variable_for_back_to_index_page;

    protected $listeners = [

        'backToMyaccountIndexFromSingle' => 'backToMyAccount',
        'singleProduct'
    ];

    public function mount()
    {
        $this->order_balance_base_query = AdminOrderdetails::with('shop:name,id')
            ->doesntHave('process')
            ->where('received', true)
            ->latest()
            ->get();

        // dd($this->order_balance_base_query);
        $this->order_balance_count = $this->order_balance_base_query->count();
        $this->order_balance_total =  $this->order_balance_base_query->pluck('total')->sum();
        $this->order_processing = $this->order_procecing('processing_status');
        $this->order_delevery = $this->order_delevery_function('delevery_status');
        $this->rate  =   $this->order_balance_base_query->load('shop:id,procecing_rate,delevered_rate')->first();
        // dd($this->rate);
        $this->order_processing_count = $this->order_processing->pluck('procecing_rate')->sum();
        $this->order_delevery_count = $this->order_delevery->pluck('delevered_rate')->sum();



        $this->index_page = true;
        $this->single_page = false;
        $this->single_product_page = false;
        // dd($this->order_delevery);
    }

    public function render()
    {
        return view('livewire.shopsection.myaccount.index');
    }

    public function order_procecing($step)
    {
        return AdminOrderdetails::whereHas('process', function (Builder $query) use ($step) {
            $query->where($step, true);
        })->get();
    }
    public function order_delevery_function($step)
    {
        return AdminOrderdetails::whereHas('process', function (Builder $query) use ($step) {
            $query->where($step, true);
        })->get();
    }

    public function orderBalance()
    {
        $this->temp_variable
            = $this->order_balance_base_query;
        $this->index_page = false;
        $this->single_product_page = false;
        $this->single_page = true;
    }
    public function processing()
    {
        $this->temp_variable
            = $this->order_processing;
        $this->index_page = false;
        $this->single_product_page = false;
        $this->single_page = true;
    }
    public function delevered()
    {
        $this->temp_variable =
            $this->order_delevery;
        $this->index_page = false;
        $this->single_product_page = false;
        $this->single_page = true;
    }

    public function backToMyAccount()
    {

        $this->index_page = true;
        $this->single_page = false;
        $this->single_product_page = false;
    }

    public function singleProduct($proid, $varid)
    {
        $this->product_details_variable =
            Product::with(
                'category:id,name',
                'subcategory:id,name',
                'image'
            )->findOrFail($proid);
        $this->product_variation_variable = $varid;
        $this->variable_for_back_to_index_page = 'shop_section_index_page';

        $this->index_page = false;
        $this->single_page = false;
        $this->single_product_page = true;
    }
}
