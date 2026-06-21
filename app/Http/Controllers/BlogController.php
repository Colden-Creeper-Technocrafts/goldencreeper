<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\SiteSetting;

class BlogController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::pluck('value', 'key')->toArray();
        $posts    = BlogPost::where('is_published', true)->orderBy('published_at', 'desc')->get();

        return view('blog.index', compact('settings', 'posts'));
    }

    public function show(string $slug)
    {
        $settings = SiteSetting::pluck('value', 'key')->toArray();
        $post     = BlogPost::where('slug', $slug)->where('is_published', true)->firstOrFail();
        $recent   = BlogPost::where('is_published', true)->where('id', '!=', $post->id)->orderBy('published_at', 'desc')->limit(4)->get();

        return view('blog.show', compact('settings', 'post', 'recent'));
    }
}
