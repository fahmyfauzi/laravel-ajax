<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {

        //get all post from model
        // $post = Post::latest()->get();

        //pasing post to view
        return view('posts', [
            'posts' => Post::all()
        ]);
    }
}
