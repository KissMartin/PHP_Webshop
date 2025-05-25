<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $praiseCards = [
            (object)[ 'title' => 'Millions of business offerings', 'content' => 'Explore products and suppliers for your business from millions of offerings worldwide.' ],
            (object)[ 'title' => 'Secure Quality Assurance', 'content' => 'Ensure production quality from verified suppliers, with your orders protected from payment to delivery.' ],
            (object)[ 'title' => 'One-stop trading solution', 'content' => 'Order seamlessly from product/supplier search to order management, payment, and fulfillment.' ],
            (object)[ 'title' => 'Customized Growth Support', 'content' => 'Get curated benefits, such as exclusive discounts, enhanced protection, and extra support, to help grow your business every step of the way.' ],
        ];

        return view('home', compact('praiseCards'));
    }
}
