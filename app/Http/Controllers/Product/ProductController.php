<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    //

    public function index(){
        $categories = Category::all();
        $products  =Product::paginate(7);
        

        return view('product.index' , ['products' => $products , 'categories' => $categories]);
    }


    public function create(Request $request){
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'rating' => 'required',
            'category_id' => 'required',
            'description' => 'required'
        ]);
        
        $products=Product::create($request->all());

        if($request->hasFile('image')){
            $request->file('image')->move('assets/image/product/' , $request->file('image')->getClientOriginalName());
            $products->image=$request->file('image')->getClientOriginalName();
            $products->save();
        }

        return redirect('/products')->with('success' , 'Data Products berhasil ditambah');
    }


    public function detail($product){
        $products = Product::find($product);
        return view('product.detail' , ['products' => $products]);
    }

    public function edit($product){
        $categories = Category::all();
        $products = Product::find($product);
        return view('product.edit' , ['products' => $products , 'categories' => $categories]);
    }


    public function update(Request $request , $product){
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'rating' => 'required',
            'category_id' => 'required',
            'description' => 'required'
        ]);
        
        $products=Product::find($product);
        $products->update($request->all());

        if($request->hasFile('image')){
            $request->file('image')->move('assets/image/product/' , $request->file('image')->getClientOriginalName());
            $products->image=$request->file('image')->getClientOriginalName();
            $products->save();
        }

        return redirect('/products')->with('success' , 'Update Successfully');
    }


    public function delete($product){
        Product::destroy($product);
        return redirect('/products')->with('success' , 'Delete Successfully');
    }


 
}

