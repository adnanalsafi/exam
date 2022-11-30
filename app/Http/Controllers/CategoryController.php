<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function addcategory(Request $request){
        $categories= $request->category;
        $model = new Category();
        $datas = $model->orderBy('id', 'DESC')->get();
        return view("category", compact('datas'));
    }

    function insertcategory(Request $request){
        $categories = $request->category;
        $insert = new Category();
        $insert->category = $categories;
        $insert->save();
        return back()->with('message','Categories Insert Successful!');

    }
    
    function UpdateId($id){
        $model = new Category();
        $datas = $model->where('id',$id)->get();
        return view('edit', ['data' => $datas]);

    }

    function update(Request $request){
        $categories = $request->category;
        $category_id = $request->id;
        $model = Category::find($category_id);
        $model->category = $categories;
        $model->save();
        return redirect("/add_category")->with('message','Categories Update Successful!');
    }

}
