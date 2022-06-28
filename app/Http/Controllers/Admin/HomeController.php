<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Category;

class HomeController extends Controller
{
    public function index(){

        $posts = Post::all();
        $categories = Category::all();

        return view('admin.home', compact('posts', 'categories'));
    }
}
