<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = User::count();
        $orders = Order::count();
        $products = Product::count();

        $totalPaid = Order::where('status', 'paid')->sum('total_price');
        $revenue = $totalPaid * 0.15;
        
        $adRevenue = rand(200, 800);

        $visitors = rand(1200, 3500);
        $visitorChart = collect(range(1, 30))->map(fn() => rand(20, 100))->toArray();

        return view('admin.dashboard', compact(
            'customers', 'orders', 'products', 'revenue', 'adRevenue', 'visitors', 'visitorChart'
        ));
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
    public function show(string $id)
    {
        //
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
    public function destroyProduct(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.profile.products')->with('success', 'Product deleted successfully.');
    }

    public function users(Request $request)
    {
        $search = $request->input('user_search');

        $users = User::with('products')
            ->when($search, fn($query) =>
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
            )
            ->get();

        return view('admin.users', compact('users'));
    }


    public function products(Request $request)
    {
        $search = $request->input('product_search');
    
        $products = Product::when($search, fn($query) => $query->where('name', 'like', "%$search%"))
                    ->orderBy('created_at', 'desc')
                    ->paginate(15);

        return view('admin.products', compact('products'));
    }

    public function orders()
    {
        $orders = Order::with(['user', 'products'])
            ->orderBy('created_at', 'desc')
            ->paginate(15);
        return view('admin.orders', compact('orders'));
    }
}
