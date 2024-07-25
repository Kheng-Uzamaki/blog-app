<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('admin.post.index', ['posts' => $posts]);
    }

   
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        
        return view('admin.post.create' , ['categories'=> $categories, "tags"=> $tags]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        DB::transaction(function() use($request){
          $request->validate([
        'title' => 'required',
        'content' => 'required',
        'thumnail' => 'required|mimes:jpg,jpeg,png|max:2048',
        'category_id' => 'required|exists:categories,id',

       ]);
       $filename = time().'.'.$request->thumnail->getClientOriginalName();
       $filePath = $request->file('thumnail')->storeAs(
        'uploads', $filename, 'public'
       );

       $post = new Post();
       $post->title = $request->title;
       $post->content = $request->content;
       $post->thumnail = $filePath;
       $post->category_id = $request->category_id;
       $post->save();


        //tag
       $post->tags()->sync($request->tags);


        });
       

      

       return redirect()->route('admin.post.index');



    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.post.edit',['post' => $post,'categories'=> $categories, "tags"=> $tags]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        DB::beginTransaction();

        try {
            $request->validate([
        'title' => 'required',
        'content' => 'required',
        'thumnail' => 'nullable|mimes:jpg,jpeg,png|max:2048',
        'category_id' => 'required|exists:categories,id',
       ]);


       

       $post = Post::findOrFail($id);
       $post->title = $request->title;
       $post->content = $request->content;
        $post->category_id = $request->category_id;
      
       if($request->hasFile('thumnail')){
          
            $filename = time().'.'.$request->thumnail->getClientOriginalName();
            $filePath = $request->file('thumnail')->storeAs(
            'uploads', $filename, 'public'
       );
       $post->thumnail = $filePath;
       };


      
       $post->save();

       //tag
       $post->tags()->sync($request->tags);

       DB::commit();
       return redirect()->route('admin.post.index');

        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
       

       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
