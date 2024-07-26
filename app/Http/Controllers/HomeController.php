<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    public function index(){
        $posts = Post::paginate(8); // get all posts
        return view('index', ['posts'=> $posts]);
    }
}
