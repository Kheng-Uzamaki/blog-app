<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        
        return view('admin.category.index', ['categories'=> $categories]);
    }

    public function create(){
        return view('admin.category.create');
    }

    public function store(Request $request){
        // dd($request->all());

        // write logic to save the databade
        $category = new Category();
        $category->name = $request->name; //$request is the user input

        $category->save();
        // redirect

        return redirect()->route('admin.category.index');
    }
    public function edit($id){
        $category = Category::findOrFail($id);
        return view('admin.category.edit',['category' => $category]);
    }

    public function update(Request $request, $id){
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->save();

        return redirect()->route('admin.category.index');
    }

    public function destroy(Request $request , $id){
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('admin.category.index');


    }
}
