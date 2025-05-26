<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Auth::user()->products()->with('categories')->latest()->get();
        $categories = Category::all();
        return view('profile.products', compact('products', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string|max:500',
        'image' => 'nullable|url',
        'stock' => 'required|integer|min:0',
        'price' => 'required|numeric|min:0',
        'categories' => 'nullable|array',
        'categories.*' => 'string|max:255',
        'new_category' => 'nullable|string|max:255',
        ]);

        $user = Auth::user();

        $product = $user->products()->create([
            'name' => $validated['name'],
            'description' => $validated['description'] ?? '',
            'image' => $validated['image'] ?? 'https://via.placeholder.com/150',
            'stock' => $validated['stock'],
            'price' => $validated['price'],
        ]);

        $categoryIds = [];

        if (!empty($validated['categories'])) {
            foreach ($validated['categories'] as $catName) {
                $catName = Str::ucfirst(trim($catName));
                $category = Category::firstOrCreate(['name' => $catName]);
                $categoryIds[] = $category->id;
            }
        }

        if (!empty($validated['new_category'])) {
            $newCatName = Str::ucfirst(trim($validated['new_category']));
            $newCategory = Category::firstOrCreate(['name' => $newCatName]);
            $categoryIds[] = $newCategory->id;
        }

        $product->categories()->sync($categoryIds);

        return redirect()->route('profile.products')->with('success', 'Product added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('profile.edit-product', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string|max:500',
        'image' => 'nullable|url',
        'stock' => 'required|integer|min:0',
        'price' => 'required|numeric|min:0',
        'categories' => 'nullable|array',
        'categories.*' => 'string|max:255',
        'new_category' => 'nullable|string|max:255',
        ]);

        $categories = [];
        if (!empty($validated['categories'])) {
            foreach ($validated['categories'] as $categoryName) {
                $categoryName = ucfirst($categoryName);
                $category = Category::firstOrCreate(['name' => $categoryName]);
                $categories[] = $category->id;
            }
        }

        if (!empty($validated['new_category'])) {
            $newCategory = ucfirst($validated['new_category']);
            $category = Category::firstOrCreate(['name' => $newCategory]);
            $categories[] = $category->id;
        }

        $product->update([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'image' => $validated['image'] ?? 'https://via.placeholder.com/150',
            'stock' => $validated['stock'],
            'price' => $validated['price'],
        ]);

        $product->categories()->sync($categories);

        return redirect()->route('profile.products')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('profile.products')->with('success', 'Product deleted successfully.');
    }
}
