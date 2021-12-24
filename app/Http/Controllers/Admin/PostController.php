<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $limit = 10;

    protected $uploadPath;

    public function __construct()
    {
       $this->uploadPath = public_path('posts');
    }

    public function index()
    {
        $posts = Post::with('category')->latest()->paginate($this->limit);
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $post = new Post();
        $categories = Category::all();
        return view('admin.posts.create',compact('post','categories'));
    }

    public function store(PostRequest $request)
    {
        $data = $this->handleRequest($request); 

        Post::create($data);

        return redirect()->route('posts.index')->with('success','New post created successfully!');
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('admin.posts.edit',compact('post','categories'));
    }

    public function update(PostRequest $request, Post $post)
    {
        $data = $this->handleRequest($request);

        $oldImage = $post->image;

        $post->update($data);

        if($oldImage !== $post->image){
            $this->removeImage($oldImage);
        }

        return redirect()->route('posts.index')->with('success','Post edited successfully!');
    }

    public function destroy(Post $post)
    {
        //
    }

    protected function handleRequest($request){
        $data = $request->all();

        if($request->hasFile('image')){
            $image = $request->file('image');
            $fileName = $image->getClientOriginalName();
            $destination = $this->uploadPath;

            $image->move($destination,$fileName);
            
            $data['image'] = $fileName;
        }

        return $data;
    }

    private function removeImage($image){
        if(!empty($image)){
            $imagePath = $this->uploadPath.'/'.$image;
            if(file_exists($imagePath)) unlink($imagePath);
        }
    }
}
