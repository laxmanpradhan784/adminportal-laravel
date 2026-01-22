<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SliderController;

// ====================
// PUBLIC ROUTES
// ====================
// ONLY Home Route
Route::get('/', function () {
    return view('home');
})->name('home');


Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// ====================
// ADMIN ROUTES (Protected by auth)
// ====================
Route::middleware(['auth'])->group(function () {
    
    // ===== DASHBOARD =====
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    
    // ===== ADMIN PROFILE =====
    Route::prefix('admin')->group(function () {
        Route::get('/profile', [AdminController::class, 'profile'])->name('admin.profile');
        Route::post('/profile', [AdminController::class, 'updateProfile'])->name('admin.profile.update');
    });
    
    // ===== PRODUCTS (CRUD) =====
    Route::resource('products', ProductController::class);
    
    // ===== USERS (CRUD) =====
    Route::resource('users', UserController::class);
    
    // ===== CONTACTS (CRUD) =====
    Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
    Route::get('/contacts/{contact}', [ContactController::class, 'show'])->name('contacts.show');
    Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');
    Route::post('/contacts/{contact}/status', [ContactController::class, 'updateStatus'])->name('contacts.status.update');
    
    // ===== SLIDERS (CRUD) =====
    Route::resource('sliders', SliderController::class);
    
});

// ====================
// USER ROUTES (Protected by auth)
// ====================
Route::middleware(['auth'])->group(function () {
    // ===== USER PROFILE =====
    Route::get('/profile', function () {
        // Check if user is admin
        if (auth()->user()->role === 'admin') {
            return redirect()->route('admin.profile');
        }
        return view('userside.profile');
    })->name('profile');
});

// ====================
// TEST ROUTE
// ====================
Route::get('/test', function() {
    return 'Test route working!';
});


use App\Http\Controllers\UserSide\ShowProductController;
use App\Http\Controllers\UserSide\storeContactController;

// Products Page
Route::get('/products', [ShowProductController::class, 'index'])->name('products');


// Contact Routes
Route::get('/contact', [storeContactController::class, 'index'])->name('contact');
Route::post('/contact', [storeContactController::class, 'store'])->name('contact.store');