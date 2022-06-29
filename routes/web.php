<?php

use App\Http\Controllers\Admin\PostController;
use Illuminate\Support\Facades\Route;
use App\Post;
use App\Category;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', 'Admin\PostController@index');

Auth::routes();

Route::middleware('auth')
    ->namespace('Admin')
    ->name('admin.')
    ->prefix('admin')
    ->group(function(){
        $posts = Post::all();
        $categories = Category::all();
        Route::get('/', 'HomeController@index', compact('posts', 'categories'))->name('home');
        Route::resource('/posts', 'PostController');
        Route::resource('/categories', 'CategoryController');
        Route::resource('/tags', 'TagController');
    });

Route::get("{any?}", function() {
    $posts = Post::all();
    $categories = Category::all();
    return view("guest.home", compact('posts', 'categories'));
})->where("any", ".*");

