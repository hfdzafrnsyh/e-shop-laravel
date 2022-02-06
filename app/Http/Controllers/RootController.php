<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\OrderProduct;
use App\Models\User;
use Alert;
use Validator;

class RootController extends Controller
{
    //

    public function index(Request $request){
        $category = Category::all();
        $product = Product::paginate(6);
        $latesProduct = Product::latest()->paginate(8);

        return view('pages.home' , ['category' => $category , 'product' => $product , 'latesProduct' => $latesProduct
    ]);
    }

    public function searchProduct(Request $request){
        $search = $request->query('product');

        $productQuery = Product::where('name' , "LIKE" , '%' . $search . '%')->paginate();
        return view('pages.searchProduct',['productQuery' => $productQuery]);
    }


    public function detailProduct($product){
        $products = Product::find($product);
        return view('pages.detail' , ['products' => $products]);
    }


    public function orderProduct(Request $request){

        $request->validate([
            'name_product' => 'required',
            'name_user' => 'required',
            'email_user' => 'required',
            'phone_user' => 'required',
            'address' => 'required'
        ]);

     
        $orderProuct = OrderProduct::create($request->all());
        Alert::info('Order Message', 'Your order in process');
        return redirect()->back();

    }


    public function getProductByCategoryId($category){
        $products = Category::find($category)->product;
        $categories = Category::find($category);
        return view('pages.productCategory' , ['products' => $products , 'categories' => $categories]);
     
    }


    public function productAll(){
        $products = Product::all();
        return view('pages.allproduct' , ['products' => $products]);
    }


    public function userProfile($user){
        $users = User::where('username' , $user)->first();
        return view('pages.profile' , ['users' => $users]);
    }


    public function updateProfile(Request $request,$user){
        $request->validate([
            'name' => 'required',
            'username' => 'required'
        ]);

        $users = User::where('username' , $user)->first();
        $users->update($request->all());

        if($request->hasFile('image')){
            $request->file('image')->move('wp-kashop/user/image/' , $request->file('image')->getClientOriginalName());
            $users->photo=$request->file('image')->getClientOriginalName();
            $users->save();
        }
        Alert::success('Profile', 'Update Profile Succesfully');
        return redirect('/');
    }

    public function password($user){
        $users = User::where('username' , $user)->first();
        return view('pages.password' , ['users' => $users]);
    }


    public function updatePassword(Request $request,$user){
        $validator = Validator::make($request->all() , [
            'old_password' => 'required|password', 
            'new_password' => 'required|min:6|required_with:repeat_password|same:repeat_password',
            'repeat_password' => 'min:6'
        ]); 

        if($validator->fails()){
            return redirect()
            ->back()
            ->withErrors($validator->errors());
        }

        $users = User::where('username' , $user)->first();
        $users->password = bcrypt(request('new_password'));

        $users->save();

        Alert::success('Password', 'Update Password Successfully');
        return redirect()->back();
    }

}
