<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    // jhilmilGyanbox
    public function jhilmilGyanbox()
    {
        $products = Product::whereIn('id', [1, 2, 3, 4])->get();
        return view('landing.jhilmil-gyanbox', compact('products'));
    }
}
