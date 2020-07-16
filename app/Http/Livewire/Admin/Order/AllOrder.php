<?php

namespace App\Http\Livewire\Admin\Order;

use App\Admin\Order;
use Livewire\Component;


class AllOrder extends Component
{




    public $go_all_order_page;
    public $go_single_order_page;
    public $goto_Delevered_page;
    public $search;
    public $single_order_variable;
    public $currentComponent;




    protected $listeners = [
        'singleOrderFromDeleverPage' => 'singleOrder',
        'back' => 'return_redirect_back',
    ];

    public function mount()
    {
        $this->go_all_order_page = true;
        $this->goto_Delevered_page = false;
        $this->go_single_order_page = false;
        $this->search = request()->query('search', $this->search);
    }
    public function pageReset()
    {
        $this->go_all_order_page = false;
        $this->goto_Delevered_page = false;
        $this->go_single_order_page = false;
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
        $this->pageReset();
        $this->goto_Delevered_page = true;
    }
    public function go_all_order_page()
    {
        $this->pageReset();
        $this->go_all_order_page = true;
    }

    public function singleOrder($order, $component)
    {
        $this->single_order_variable = Order::with(['details.product.image', 'details.product.comments', 'pickup'])
            ->findOrFail($order);
        $this->currentComponent = $component;
        // dd($this->currentComponent);
        $this->pageReset();
        $this->go_single_order_page = true;
    }
    public function from_SingleOrder_to_allOrder()
    {
        $this->pageReset();
        $this->goto_Delevered_page = true;
    }

    public function return_redirect_back()
    {
        // dd($this->currentComponent);
        $this->pageReset();
        if ($this->currentComponent == 'delevered') {
            $this->goto_Delevered_page = true;
        } elseif ($this->currentComponent == 'allorder') {
            $this->go_all_order_page = true;
        }
    }

    public function ViewsingleOrder($order)
    {
        $component = 'allorder';
        $this->emit('singleOrderFromDeleverPage', $order, $component);
    }

    public function deleteOrder($order)
    {
        $order = Order::findOrFail($order);
        foreach ($order->details as $singleOrder) {
            if (!empty($singleOrder->variation_id)) {
                $singleOrder->variation->stock =  $singleOrder->variation->stock + $singleOrder->quentity;
                dd('true');
            }
            // dd($singleOrder->product->stock);
        }
    }
}
