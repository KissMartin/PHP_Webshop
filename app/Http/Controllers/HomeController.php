<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $praiseCards = [
            (object)[ 'title' => 'Vast Global Marketplace', 'content' => 'Discover millions of products and reliable suppliers worldwide to meet your business needs.' ],
            (object)[ 'title' => 'Secure Quality Assurance', 'content' => 'Source confidently from verified suppliers, with transaction safeguards covering payment, shipping, and delivery.' ],
            (object)[ 'title' => 'Streamlined End-to-End Solutions', 'content' => 'Simplify your workflow with integrated tools for sourcing, order management, payments, and logistics—all in one platform.' ],
            (object)[ 'title' => 'Customized Growth Support', 'content' => 'Unlock tailored advantages like priority discounts, dedicated assistance, and enhanced safeguards to accelerate your business growth.' ],
        ];

        return view('home', compact('praiseCards'));
    }
}
