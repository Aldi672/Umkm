<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        return response()->json(Product::with('category')->where('is_available', true)->get());
    }

    public function catalog()
    {
        return $this->index();
    }
}
