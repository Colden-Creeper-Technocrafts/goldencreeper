<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use App\Models\TeamMember;

class AboutController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::pluck('value', 'key')->toArray();
        $team     = TeamMember::where('is_active', true)->orderBy('sort_order')->get();

        return view('about', compact('settings', 'team'));
    }
}
