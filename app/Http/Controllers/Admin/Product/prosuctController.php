<?php

namespace App\Http\Controllers\Admin\Product;

use Carbon\Carbon;
use App\Admin\Product;
use App\Alert\Sweetalert;
use App\Admin\Orderdetails;
use Illuminate\Http\Request;
use App\Admin\Shopprocessdelever;
use App\Http\Controllers\Controller;
use PhpOffice\PhpWord\TemplateProcessor;
use App\Repositories\CategoryRepositories;

class prosuctController extends Controller
{
    public function __construct(CategoryRepositories $categoryRepositories)
    {
        $this->categoryRepositories = $categoryRepositories;
        // $this->sweetalert = $sweetalert;
    }

    public function store(Request $request, Product $product)
    {
        if (!empty($product->stock)) {

            $product->status = true;
            $product->save();
            $product->image()->create(['url' => $this->categoryRepositories->resizeImage($request, 460, 460, 'product', 'image')]);
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }

    public function printDocument($id)
    {
        //variation

        $data = Orderdetails::with(
            'product',
            'shop:id,name',
            'order.user',
            'order.payment:id,name',
            'order.pickup',
        )->findOrFail($id);
        // dd($data);
        $templateVariable =
            new TemplateProcessor('wordTemplate/singleOrderItem.docx');
        $templateVariable->setValue('order_id', $data->order->code);
        $templateVariable->setValue('user_name', $data->order->name);
        $templateVariable->setValue('user_number', $data->order->mobile);
        $templateVariable->setValue('user_address', $data->order->address);
        if (!empty($data->pickup)) {
            $templateVariable->setValue('pickup_address', $data->pickup->address);
        } else {
            $templateVariable->setValue('pickup_address', 'No Pickup Address');
        }


        $date = Carbon::parse($data->order->created_at)->toFormattedDateString();
        $pay_method = $data->order->payment->name;
        $shop_name = $data->shop->name;
        $templateVariable->setValue('date', $date);
        $templateVariable->setValue('pay_method', $pay_method);
        $templateVariable->setValue('shop_name', $shop_name);
        $templateVariable->setValue('pro_name', $data->product->name);
        $templateVariable->setValue('pro_code', $data->product->code);
        $templateVariable->setValue('pro_price', $data->price);
        $templateVariable->setValue('pro_quentity', $data->quentity);
        $templateVariable->setValue('total', $data->total);
        if (!empty($data->variation)) {
            $templateVariable->setValue('variation', $data->variation->name);
        } else {
            $templateVariable->setValue('variation', 'No variation');
        }

        $fileName =  $data->order->code;
        $templateVariable->saveAs($fileName . '.docx');
        // $this->emit('return_back', $this->page_name_variable_singleOrder_page);
        return response()->download($fileName . '.docx')
            ->deleteFileAfterSend(true);


        //  ->deleteFileAfterSend(true)

    }
    public function shop_processing_invoice($id)
    {
        //variation

        $data = Shopprocessdelever::with(
            'shop',
            'orderDetails.order:id,code,created_at',
            'orderDetails.product:id,name,code',
            'orderDetails.variation:id,name',

        )->findOrFail($id); //   procecingCommision
        // dd($data);
        $templateVariable =
            new TemplateProcessor('wordTemplate/procecingCommision.docx');
        $templateVariable->setValue('order', $data->orderDetails->order->code);
        $templateVariable->setValue('shop_name', $data->shop->name);
        $templateVariable->setValue('shop_address', $data->shop->address);
        $templateVariable->setValue('shop_mobile', $data->shop->phone);
        $templateVariable->setValue('com_rate', $data->shop->procecing_commision_rate);
        $templateVariable->setValue('procecing_rate', $data->shop->procecing_rate);
        $templateVariable->setValue('grand_total', $data->shop->procecing_rate);


        //new items

        $date = Carbon::parse($data->orderDetails->order->created_at)->toFormattedDateString();
        $acc_name = $data->shop->bank_account_name;
        $acc_no = $data->shop->bank_account_number;
        $bank_name = $data->shop->bank_name;

        if (!empty($acc_name)) {
            $templateVariable->setValue('acc_name', $acc_name);
        } else {
            $templateVariable->setValue('acc_name', ' Empty');
        }

        //account  Number
        if (!empty($acc_no)) {
            $templateVariable->setValue('acc_no', $acc_no);
        } else {
            $templateVariable->setValue('acc_no', ' Empty');
        }

        // Bank name
        if (!empty($bank_name)) {
            $templateVariable->setValue('bank_name', $bank_name);
        } else {
            $templateVariable->setValue('bank_name', ' Empty');
        }

        $calcu_proce_price = floor(($data->shop->procecing_rate * $data->orderDetails->total) / 100);
        $calcu_commision = floor(($data->shop->procecing_commision_rate * $data->orderDetails->total) / 100);


        $templateVariable->setValue('date', $date);
        $templateVariable->setValue('procecing_price', $calcu_proce_price);
        $templateVariable->setValue('commsion', $calcu_commision);



        $templateVariable->setValue('product_name', $data->orderDetails->product->name);
        $templateVariable->setValue('product_code', $data->orderDetails->product->code);
        $templateVariable->setValue('product_price', $data->orderDetails->price);
        $templateVariable->setValue('product_quantity', $data->orderDetails->quentity);
        $templateVariable->setValue('total', $data->orderDetails->total);
        $templateVariable->setValue('grand_total', $calcu_proce_price -  $calcu_commision);
        if (!empty($data->orderDetails->variation)) {
            $templateVariable->setValue('variation', $data->orderDetails->variation->name);
        } else {
            $templateVariable->setValue('variation', 'No variation');
        }


        $fileName = $data->orderDetails->order->code;
        $templateVariable->saveAs($fileName . '.docx');
        // $this->emit('return_back', $this->page_name_variable_singleOrder_page);
        return response()->download($fileName . '.docx')
            ->deleteFileAfterSend(true);


        //  ->deleteFileAfterSend(true)

    }
    public function shop_delevered_invoice($id)
    {
        //variation

        $data = Shopprocessdelever::with(
            'shop:id,name,address,phone,delevered_commision_rate,delevered_rate',
            'orderDetails.order:id,code,created_at',
            'orderDetails.product:id,name,code',
            'orderDetails.variation:id,name',

        )->findOrFail($id); //   procecingCommision
        // dd($data);
        $templateVariable =
            new TemplateProcessor('wordTemplate/deleveredCommision.docx');
        $templateVariable->setValue('order', $data->orderDetails->order->code);
        $templateVariable->setValue('shop_name', $data->shop->name);
        $templateVariable->setValue('shop_address', $data->shop->address);
        $templateVariable->setValue('shop_mobile', $data->shop->phone);
        $templateVariable->setValue('com_rate', $data->shop->delevered_commision_rate);
        $templateVariable->setValue('delevered_rate', $data->shop->delevered_rate);


        $date = Carbon::parse($data->orderDetails->order->created_at)->toFormattedDateString();
        $acc_name = $data->shop->bank_account_name;
        $acc_no = $data->shop->bank_account_number;
        $bank_name = $data->shop->bank_name;

        if (!empty($acc_name)) {
            $templateVariable->setValue('acc_name', $acc_name);
        } else {
            $templateVariable->setValue('acc_name', ' Empty');
        }

        //account  Number
        if (!empty($acc_no)) {
            $templateVariable->setValue('acc_no', $acc_no);
        } else {
            $templateVariable->setValue('acc_no', ' Empty');
        }

        // Bank name
        if (!empty($bank_name)) {
            $templateVariable->setValue('bank_name', $bank_name);
        } else {
            $templateVariable->setValue('bank_name', ' Empty');
        }
        $calcu_delever_price = floor(($data->shop->delevered_rate * $data->orderDetails->total) / 100);
        $calcu_commision = floor(($data->shop->delevered_commision_rate * $data->orderDetails->total) / 100);

        $templateVariable->setValue('date', $date);
        $templateVariable->setValue('grand_total', $calcu_delever_price -  $calcu_commision);
        $templateVariable->setValue('delevered_price', $calcu_delever_price);
        $templateVariable->setValue('commsion', $calcu_commision);

        $templateVariable->setValue('product_name', $data->orderDetails->product->name);
        $templateVariable->setValue('product_code', $data->orderDetails->product->code);
        $templateVariable->setValue('product_price', $data->orderDetails->price);
        $templateVariable->setValue('product_quantity', $data->orderDetails->quentity);
        $templateVariable->setValue('total', $data->orderDetails->total);
        if (!empty($data->orderDetails->variation)) {
            $templateVariable->setValue('variation', $data->orderDetails->variation->name);
        } else {
            $templateVariable->setValue('variation', 'No variation');
        }


        $fileName = $data->orderDetails->order->code;
        $templateVariable->saveAs($fileName . '.docx');
        // $this->emit('return_back', $this->page_name_variable_singleOrder_page);
        return response()->download($fileName . '.docx')
            ->deleteFileAfterSend(true);


        //  ->deleteFileAfterSend(true)

    }
}
