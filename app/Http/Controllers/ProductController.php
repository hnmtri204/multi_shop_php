<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index( Request $request)
    {
        $query = Product::query();

        // Initialize filter variables with default values
        $price = $request->input('price', 'all');
        $name = $request->input('name', 'AtoZ');

        // Filter by price
        switch ($price) {
            case '1':
                $query->where('price', '<=', 100);
                break;
            case '2':
                $query->where('price', '>', 100)->where('price', '<=', 200);
                break;
            case '3':
                $query->where('price', '>', 200)->where('price', '<=', 300);
                break;
            case '4':
                $query->where('price', '>', 300)->where('price', '<=', 400);
                break;
            case '5':
                $query->where('price', '>', 400)->where('price', '<=', 500);
                break;
            default:
                break;
        }

        // Filter by name
        if ($name == 'AtoZ') {
            $query->orderBy('name', 'asc');
        } elseif ($name == 'ZtoA') {
            $query->orderBy('name', 'desc');
        }

        $products = $query->paginate(6);

        return view('products.index', compact('products', 'price', 'name'));
    }
}
