<?php

namespace App\Http\Controllers\UserSide;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ShowProductController extends Controller
{
    /**
     * Display all products for users
     */
    public function index()
    {
        // Get all active products
        $products = Product::where('status', 'active')
            ->orderBy('created_at', 'desc')
            ->paginate(12);
        
        return view('userside.products', compact('products'));
    }
    
    /**
     * Display single product details
     */
    public function show($id)
    {
        $product = Product::where('status', 'active')->findOrFail($id);
        
        // Get related products (same category)
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $id)
            ->where('status', 'active')
            ->limit(4)
            ->get();
        
        return view('userside.products.show', compact('product', 'relatedProducts'));
    }
    
    /**
     * Search products
     */
    public function search(Request $request)
    {
        $query = $request->input('q');
        
        $products = Product::where('status', 'active')
            ->where(function($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%")
                  ->orWhere('description', 'LIKE', "%{$query}%");
            })
            ->paginate(12);
        
        return view('userside.products.search', compact('products', 'query'));
    }
    
    /**
     * Filter products by category
     */
    public function category($categoryId)
    {
        $products = Product::where('status', 'active')
            ->where('category_id', $categoryId)
            ->paginate(12);
        
        $categoryName = "Category Products"; // You can get actual category name from DB
        
        return view('userside.products.category', compact('products', 'categoryName'));
    }
}