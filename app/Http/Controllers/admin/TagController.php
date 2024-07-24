<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class TagController extends Controller
{
    public function index(){
        $tags = Tag::all();
        
        return view('admin.tag.index', ['tags'=> $tags]);
    }

    public function create(){
        return view('admin.tag.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|unique:tags'
        ]);

        // write logic to save the databade
        $tags = new Tag();
        $tags->name = $request->name; //$request is the user input

        $tags->save();
        // redirect

        return redirect()->route('admin.tag.index');
    }
    public function edit($id){
        $tags = Tag::findOrFail($id);
        return view('admin.tag.edit',['tag' => $tags]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|unique:tags'
        ]);
        $tags = Tag::findOrFail($id);
        $tags->name = $request->name;
        $tags->save();

        return redirect()->route('admin.tag.index');
    }

    public function destroy(Request $request , $id){
        $tags = Tag::findOrFail($id);
        $tags->delete();
        return redirect()->route('admin.tag.index');


    }
}
