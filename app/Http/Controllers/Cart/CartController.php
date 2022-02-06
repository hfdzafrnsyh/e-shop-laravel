<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\User;
use App\Models\OrderProduct;
use Alert;

class CartController extends Controller
{
    //


    public function cartByUser($user){
       $users = User::where('username' , $user)->first();
       $cart = $users->cart;
        return view('pages.cart' , ['cart' => $cart]);
    }

    public function addToCart(Request $request){

        $userId = auth()->user()->id;
        $request->request->add(['user_id' => $userId]);
        $cart = Cart::create($request->all());
        
        toast('Success Add to Cart' , 'success');
        return redirect()->back();
    }


    public function delete(Cart $product){
        $product->delete();
        toast('Remove Product' , 'success');
        return redirect()->back();
        
    }


    public function orderProductByCart(Request $request , Cart $product){
       
        $user = auth()->user();

        $request->request->add(['name_user' => $user->name]);
        $request->request->add(['email_user' =>  $user->email]);
        $request->request->add(['phone_user' =>  $user->phone]);
        $request->request->add(['address' => $user->address]);
        
        $orderProduct = OrderProduct::create($request->all());

        $product->delete();
        Alert::info('Order Message', 'Your order in process');
        return redirect()->back();
    }
}
