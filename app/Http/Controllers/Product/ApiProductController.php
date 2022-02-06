<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ApiProductController extends Controller
{
    //

    public function index(){
        $product = Product::all();
        return response()->json(['product' => $product] , 200);
    }


    public function create(Request $request){
        $product = Product::create($request->all());
        return response()->json(['product' => $product],201);
    }


    public function detail($product){
        $products = Product::find($product);
        return response()->json(['product' => $products],200);
    }


    public function edit(Request $request ,Product $product){
        $product->update($request->all());
        return response()->json(['product' => $product],200);
    }


    public function delete(Product $product){
        $product->delete();
        return response()->json(["Message" => "Delete Successfullly"]);
    }
}
