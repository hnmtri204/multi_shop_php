<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(6);
        return view('products.index', compact('products'));
    }

    public function filterPrice(Request $request)
    {
        $price = $request->input('price');
        $name = $request->input('name');

        $query = Product::query();
        switch ($price) {
            case 'all':
                break;
            case '1':
                $query->where('price', '<=', 100);
                break;
            case '2':
                $query->whereBetween('price', [100, 200]);
                break;
            case '3':
                $query->whereBetween('price', [200, 300]);
                break;
            case '4':
                $query->whereBetween('price', [300, 400]);
                break;
            case '5':
                $query->where('price', '>=', 400);
                break;
        }

        switch ($name) {
            case 'AtoZ':
                $query->orderBy('name');
                break;
            case 'ZtoA':
                $query->orderByDesc('name');
                break;
        }

        $response = $query->paginate(6);
        $products = Product::paginate(6);

        return view('products.index', compact('response', 'price', 'name', 'products'));
    }
}
