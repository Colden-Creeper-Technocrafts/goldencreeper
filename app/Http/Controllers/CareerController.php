<?php

namespace App\Http\Controllers;

use App\Models\JobPosting;
use App\Models\SiteSetting;

class CareerController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::pluck('value', 'key')->toArray();
        $jobs     = JobPosting::where('is_active', true)->orderBy('created_at', 'desc')->get();

        return view('careers', compact('settings', 'jobs'));
    }
}
