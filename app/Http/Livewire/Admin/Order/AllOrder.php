<?php

namespace App\Http\Livewire\Admin\Order;

use App\Admin\Order;
use Livewire\Component;


class AllOrder extends Component
{




    public $go_all_order_page;
    public $goto_Delevered_page;
    public $search;


    public function mount()
    {
        $this->go_all_order_page = true;
        $this->goto_Delevered_page = false;
        $this->search = request()->query('search', $this->search);
    }
    public function pageReset()
    {
        $this->go_all_order_page = false;
        $this->goto_Delevered_page = false;
    }

    public function render()
    {
        return view(
            'livewire.admin.order.all-order',
            [
                'orders' => $this->search === null ?
                    Order::where('pending', false)
                    ->orWhere('confirmed', false)
                    ->orWhere('processing', false)
                    ->orWhere('picked', false)
                    ->orWhere('delivered', false)
                    ->latest()->get() :
                    Order::where([
                        ['code', 'like', '%' . $this->search . '%'],
                        ['pending', false]
                    ])->orWhere([
                        ['code', 'like', '%' . $this->search . '%'],
                        ['confirmed', false]

                    ])->orWhere([
                        ['code', 'like', '%' . $this->search . '%'],
                        ['processing', false]
                    ])->orWhere([
                        ['code', 'like', '%' . $this->search . '%'],
                        ['picked', false]

                    ])->orWhere([
                        ['code', 'like', '%' . $this->search . '%'],
                        ['delivered', false]
                    ])
                    ->latest()->get()
            ]
        );
    }


    public function confirmed($order)
    {
        $data = Order::findOrFail($order);
        $data->update([
            'confirmed' => !$data->confirmed,
        ]);
    }
    public function processing($order)
    {
        $data = Order::findOrFail($order);
        $data->update([
            'processing' => !$data->processing,
        ]);
    }
    public function picked($order)
    {
        $data = Order::findOrFail($order);
        $data->update([
            'picked' => !$data->picked,
        ]);
    }
    public function delivered($order)
    {
        $data = Order::findOrFail($order);
        $data->update([
            'delivered' => !$data->delivered,
        ]);
    }

    public function go_Delevered_page()
    {
        $this->go_all_order_page = false;
        $this->goto_Delevered_page = true;
    }
}
