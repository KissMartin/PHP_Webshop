<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $products = $this->buildFilteredQuery($search)->get();

        $categories = Category::whereHas('products')->get();

        return view('products', [
            'products' => $products,
            'categories' => $categories,
            'search' => $search,
        ]);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $userDetails = $product->user()->select('id', 'name')->first();
        $product->author = $userDetails;
        return view('viewProduct', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function filter(Request $request)
    {
        $categories = Category::all();
        $search = $request->input('search');
        $selectedCategories = $request->input('categories', []);
        $products = $this->buildFilteredQuery($search, $selectedCategories)->get();

        return view('products', [
            'products' => $products,
            'categories' => $categories,
            'selectedCategories' => $selectedCategories,
            'search' => $search,
        ]);
    }

    private function buildFilteredQuery(?string $search = null, array $selectedCategories = [])
    {
        $query = Product::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%");
            });
        }

        if (!empty($selectedCategories)) {
            foreach ($selectedCategories as $categoryId) {
                $query->whereHas('categories', function ($q) use ($categoryId) {
                    $q->where('categories.id', $categoryId);
                });
            }
        }

        return $query;
    }
}
