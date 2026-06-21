<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Project;
use App\Models\Service;
use App\Models\SiteSetting;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        $settings     = SiteSetting::pluck('value', 'key')->toArray();
        $services     = Service::where('is_active', true)->orderBy('sort_order')->limit(6)->get();
        $projects     = Project::where('is_featured', true)->where('is_active', true)->orderBy('sort_order')->limit(3)->get();
        $testimonials = Testimonial::where('is_active', true)->orderBy('sort_order')->limit(3)->get();
        $posts        = BlogPost::where('is_published', true)->orderBy('published_at', 'desc')->limit(3)->get();

        return view('home', compact('settings', 'services', 'projects', 'testimonials', 'posts'));
    }
}
