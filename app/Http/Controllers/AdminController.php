<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Contact;
use App\Models\Slider;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Check if user is logged in and is admin
        if (!auth()->check()) {
            return redirect('/login');
        }
        
        if (auth()->user()->role !== 'admin') {
            return redirect('/')->with('error', 'Admin access required.');
        }
        
        // Create data array
        $data = [
            'totalProducts' => Product::count(),
            'totalUsers' => User::count(),
            'totalContacts' => Contact::count(),
            'totalSliders' => Slider::count(),
            'recentProducts' => Product::latest()->take(5)->get(),
            'recentContacts' => Contact::latest()->take(5)->get(),
        ];
        
        // Pass data to view
        return view('admin.dashboard', compact('data'));
    }
    
    public function profile()
    {
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            return redirect('/login');
        }
        
        return view('admin.profile');
    }
    
    public function updateProfile(Request $request)
    {
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            return redirect('/login');
        }
        
        $user = auth()->user();
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        ]);
        
        $user->update($request->only('name', 'email'));
        
        return redirect()->route('admin.profile')->with('success', 'Profile updated successfully.');
    }
}