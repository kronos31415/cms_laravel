<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;

class WelcomeController extends Controller
{
    public function index() {
        return view('welcome')
            ->with('posts', Post::paginate(2))
            ->with('tags', Tag::all())
            ->with('categories', Category::all());
    }
}
