<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    //

    public function index(){

        $categories = Category::all();

        return view('category.index' , ['categories' => $categories]);
    }



    public function edit($category){
        $categories = Category::find($category);
        return view('category.edit' , ['categories' => $categories]);
    }

    
    public function update(Request $request , $category){
        $request->validate([
            'name' => 'required',
        ]);
        
        $categories=Category::find($category);
        $categories->update($request->all());

        if($request->hasFile('image')){
            $request->file('image')->move('assets/image/icon/' , $request->file('image')->getClientOriginalName());
            $categories->icon=$request->file('image')->getClientOriginalName();
            $categories->save();
        }

        return redirect('/categories')->with('success' , 'Update Successfully');
    }


}
