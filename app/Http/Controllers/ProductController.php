<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::get();
        return response()->json(['products' => $products]);
    }

    public function show(Product $product)
    {
        return response()->json(['product' => $product]);
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|decimal:1,2',
            'description' => 'required|string',
        ]);

        $product = Product::create($validatedData);

        return response()->json(['product' => $product]);
    }

    // Update the specified task in the database
    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|decimal:1,2',
            'description' => 'required|string'
        ]);

        $product->update($validatedData);

        return response()->json(['product' => $product]);
    }

    // Remove the specified task from the database
    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json(['status' => 'success']);
    }
}
