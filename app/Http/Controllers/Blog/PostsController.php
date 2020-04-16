<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use App\Tag;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function show(Post $post) {
        return view('blog.show')->with('post', $post);
    }

    public function category(Category $category) {

        $search = request()->query('search');

        if($search) {
            $posts = Post::where('title','LIKE', "%{$search}%")->paginate(2);
        } else {
            $posts = $category->posts()->paginate(2);
        }

        return view('blog.category')
            ->with('category', $category)
            ->with('categories', Category::all())
            ->with('posts', $posts)
            ->with('tags', Tag::all());

    }
    

    public function tag(Tag $tag) {

        $search = request()->query('search');

        if($search) {
            $posts = Post::where('title','LIKE', "%{$search}%")->paginate(2);
        } else {
            $posts = $tag->posts()->paginate(2);
        }

        return view('blog.tag')
            ->with('tag', $tag)
            ->with('tags', Tag::all())
            ->with('posts', $tag->posts)
            ->with('category', $tag->posts)
            ->with('categories', Category::all());

    }
}
