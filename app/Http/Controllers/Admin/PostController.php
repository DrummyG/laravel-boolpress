<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Iluminate\Support\Facades\Storage;
use App\Post;
use App\Category;
use App\Tag;

class PostController extends Controller
{
    // protected $validationRule = [
    //     "title" => "required|string|max:100",
    //     "content" => "required",
    //     "published" => "sometimes|accepted",
    //     "category_id" => "nullable|exists:categories,id",
    // ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.home', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate($this->validationRule);
        $data = $request->all();
        $newPost = new Post();
        $newPost->title = $data['title'];
        $newPost->content = $data['content'];
        $newPost->published  = isset($data['published']);// true o false
        $newPost->category_id = $data['category_id'];
        $newPost->slug = $this->getSlug($newPost->title);
        $img_path=Storage::put('uploads', $data['image']);
        $newPost->image = $img_path;
        $newPost->save();
        return redirect()->route('admin.posts.show',$newPost->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where("slug",$slug)->with(["category","tags"])->first();
        if(empty($post)){
            return response()->json(["message"=>"Post not Found"], 404);
        }
        return response()->json($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)

    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        return view('admin.posts.edit',compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate($this->validationRule);
        $data = $request->all();

        if($post->title != $data['title']){
            $post->title = $data['title'];
            $slug = Str::of($post->title)->slug("-");
            if($slug != $post->slug) {
                $post->slug = $this->getSlug($post->title);
            }
        }
        $post->category_id = $data['category_id'];
        $post->content = $data['content'];
        $post->published = isset($data["published"]);
        $post->update();
        return redirect()->route('admin.posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index')->with("message","Post with id: {$post->id} successfully deleted !");
    }
    /**
     * Generate an unique slug
     *
     * @param  string $title
     * @return string
     */
    private function getSlug($title)
    {
        $slug = Str::of($title)->slug("-");
        $count = 1;

        // Prendi il primo post il cui slug ?? uguale a $slug
        // se ?? presente allora genero un nuovo slug aggiungendo -$count
        while( Post::where("slug", $slug)->first() ) {
            $slug = Str::of($title)->slug("-") . "-{$count}";
            $count++;
        }

        return $slug;
    }
}
