<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

class HomeController extends Controller
{
    public function index(){
       $posts = Post::paginate(8); // get all posts
    $categories = Category::all(); // get all categories
    $tags = Tag::all(); // get all tags

    return view('index', [
        'posts' => $posts,
        'nav_categories' => $categories,
        'tags' => $tags
    ]);
    }
    public function article(Request $request, $id){
        $post = Post::findOrFail( $id );
        return view('article', ['post'=> $post]);
    }
}
