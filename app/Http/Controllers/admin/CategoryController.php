<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Controllers\Controller;

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
        // step1 :validation the data
        $request->validate([
            'name' => 'required|unique:categories'
        ]);

        // step 2: write logic to save the databade
        $category = new Category();
        $category->name = $request->name; //$request is the user input

        $category->save();
        // step 3:  redirect

        return redirect()->route('admin.category.index');
    }
    public function edit($id){
        
        $category = Category::findOrFail($id);
        return view('admin.category.edit',['category' => $category]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|unique:categories'
        ]);
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
