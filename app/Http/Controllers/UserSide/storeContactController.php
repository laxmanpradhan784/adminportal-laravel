<?php

namespace App\Http\Controllers\UserSide;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class storeContactController extends Controller
{
    /**
     * Display contact page
     */
    public function index()
    {
        return view('userside.contact');
    }

    /**
     * Handle contact form submission
     */
    public function store(Request $request)
    {
        // Simple validation
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string|min:10',
        ]);

        // Here you would typically:
        // 1. Save to database
        // 2. Send email
        // 3. Send notification

        // For now, just show success message
        return back()->with('success', 'Thank you for your message! We will contact you soon.');
    }
}
