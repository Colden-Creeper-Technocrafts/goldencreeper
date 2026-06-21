<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\SiteSetting;

class ServiceController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::pluck('value', 'key')->toArray();
        $services = Service::where('is_active', true)->orderBy('sort_order')->get();

        return view('services.index', compact('settings', 'services'));
    }

    public function show(string $slug)
    {
        $settings = SiteSetting::pluck('value', 'key')->toArray();
        $service  = Service::where('slug', $slug)->where('is_active', true)->firstOrFail();
        $related  = Service::where('is_active', true)->where('id', '!=', $service->id)->inRandomOrder()->limit(3)->get();

        return view('services.show', compact('settings', 'service', 'related'));
    }
}
