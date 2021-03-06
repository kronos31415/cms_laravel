<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;

class WelcomeController extends Controller
{
    public function index() {

        $search = request()->query('search');
        if($search) {
           $posts=Post::where('title','LIKE',"%{$search}%")->paginate(2);
        } else {
            $posts = Post::paginate(4);
        }
        
        return view('welcome')
            ->with('posts', $posts)
            ->with('tags', Tag::all())
            ->with('categories', Category::all());
    }
}
