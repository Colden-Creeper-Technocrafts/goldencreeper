<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\SiteSetting;

class PortfolioController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::pluck('value', 'key')->toArray();
        $projects = Project::where('is_active', true)->orderBy('sort_order')->get();

        return view('portfolio.index', compact('settings', 'projects'));
    }

    public function show(string $slug)
    {
        $settings = SiteSetting::pluck('value', 'key')->toArray();
        $project  = Project::where('slug', $slug)->where('is_active', true)->firstOrFail();
        $related  = Project::where('is_active', true)->where('id', '!=', $project->id)->inRandomOrder()->limit(3)->get();

        return view('portfolio.show', compact('settings', 'project', 'related'));
    }
}
