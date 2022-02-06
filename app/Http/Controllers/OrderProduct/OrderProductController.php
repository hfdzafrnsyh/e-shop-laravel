<?php

namespace App\Http\Controllers\OrderProduct;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderProduct;
use App\Models\Transaction;

class OrderProductController extends Controller
{
    //

    public function index(){
        $orderProduct = OrderProduct::all();
        return view('orderproduct.index' , ['orderProduct' => $orderProduct]);
    }


    public function detail($order){
        $orderProduct = OrderProduct::find($order);
        return view('orderproduct.detail' , ['orderProduct' => $orderProduct]);
    }

    public function delete(OrderProduct $order){
    
       
        $transaction = Transaction::create([
            'name' => $order->name_product,
            'name_user' => $order->name_user,
            'email_user' => $order->email_user,
            'income' => $order->price_product
        ]);

        $transaction->save();

        $order->delete();
      
        return redirect('/order')->with('success' , 'Transaction Successfully');

    }

  
}
