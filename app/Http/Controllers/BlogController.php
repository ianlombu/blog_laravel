<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{
    public function index(Post $post)
    {
        $data = $post->orderBy('created_at','desc')->get();
        return view('frontend.index', compact('data'));
    }

    public function isi_blog($slug)
    {
        $data = Post::where('slug', $slug)->get();
        return view('frontend.isi_post', compact('data'));
    }
}
