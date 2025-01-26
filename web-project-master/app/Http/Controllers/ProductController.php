<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'brief_description' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'old_price' => 'required|numeric',
            'SKU' => 'required',
            'stock_status' => 'required|in:instock,outstock',
            'quantity' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Handle single image
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        // Handle multiple images
        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePaths[] = $image->store('products', 'public');
            }
        }

        // Create product
        $product = Product::create([
            'name' => $request->name,
            'brief_description' => $request->brief_description,
            'description' => $request->description,
            'price' => $request->price,
            'old_price' => $request->old_price,
            'SKU' => $request->SKU,
            'stock_status' => $request->stock_status,
            'quantity' => $request->quantity,
            'image' => $imagePath ?? null,
            'images' => $imagePaths
        ]);

        return redirect()->route('products.index')->with('success', 'Product created successfully');
    }
}