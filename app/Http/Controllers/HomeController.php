<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Inertia\Inertia;

// use Inertia class

class HomeController extends Controller
{

    public function index()
    {

        $posts = Post::with('category')->get();

        return Inertia::render('Home/Index', $posts);
    }

    public function about()
    {

        return Inertia::render('About/Index');

    }

}
