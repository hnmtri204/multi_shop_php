<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    /**
     * Display the specified resource.
     */

    public function show($id, Request $request)
    {
        $category = Category::find($id);

        $query = Product::where('category_id', $id);

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

        $products = $query->paginate(2);

        return view('categories.show', compact('category', 'products', 'price', 'name'));
    }
}
