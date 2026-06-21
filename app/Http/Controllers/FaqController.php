<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\SiteSetting;

class FaqController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::pluck('value', 'key')->toArray();
        $faqs     = Faq::where('is_active', true)->orderBy('sort_order')->get()->groupBy('category');

        return view('faq', compact('settings', 'faqs'));
    }
}
