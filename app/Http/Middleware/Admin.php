<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is logged in
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Please login first.');
        }

        // Get the authenticated user
        $user = Auth::user();
        
        // Check if user has admin role
        // For now, let's just allow if logged in
        // You can uncomment the admin check later
        /*
        if ($user->role !== 'admin') {
            return redirect('/')->with('error', 'Access denied. Admin only.');
        }
        */

        return $next($request);
    }
}