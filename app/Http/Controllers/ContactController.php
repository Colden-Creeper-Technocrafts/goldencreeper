<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::pluck('value', 'key')->toArray();

        return view('contact', compact('settings'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'phone'   => 'nullable|string|max:50',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string|min:10',
        ]);

        ContactMessage::create($validated);

        return redirect()->route('contact')->with('success', 'Thank you for reaching out! We\'ll be in touch within one business day.');
    }
}
