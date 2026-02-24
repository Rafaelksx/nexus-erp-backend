<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // Obtenemos todos los productos de la base de datos
        $products = Product::all();

        // Los devolvemos en formato JSON (el lenguaje universal de las APIs)
        return response()->json($products);
    }
}