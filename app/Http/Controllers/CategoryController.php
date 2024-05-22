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
    public function show(string $id)
    {
        //
        // dd($id);
        session()->put('id_cat', $id);
        $category = Category::findOrFail($id);
        $products = Product::where('category_id', $id)->paginate(6);
        return view('categories.show', compact('products', 'category'));
    }
    public function filter(Request $request)
    {
        $price = $request->input('price');
        $name = $request->input('name');
        $id = session()->get('id_cat');
        $query = Product::query()->where('category_id', $id);
        // dd( $query);
        switch ($price) {
            // case 'all':
            //     break;
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
        dd($response);
        // $products = Product::paginate(6);
        $products = Product::where('category_id', $id)->paginate(6);

    
        return view('categories.show', compact('response', 'price', 'name', 'products'));
    }
    // filter search
    // public function filter(Request $request)
    // {
    //     $price = $request->input('price');
    //     $name = $request->input('name');
    //     $id = session()->get('id_cat');
    //     // dd($id);
    //     $query = Product::query();
    //     switch ($price) {
    //         case 'all':
    //             $query->Product::where('category_id', $id)->paginate(6);
    //             break;
    //         case '1':
    //             $query->where('price', '<=', 100);
    //             break;
    //         case '2':
    //             $query->whereBetween('price', [100, 200]);
    //             break;
    //         case '3':
    //             $query->whereBetween('price', [200, 300]);
    //             break;
    //         case '4':
    //             $query->whereBetween('price', [300, 400]);
    //             break;
    //         case '5':
    //             $query->where('price', '>=', 400);
    //             break;
    //     }
    //     switch ($name) {
    //         case 'AtoZ':
    //             $query->orderBy('name');
    //             break;
    //         case 'ZtoA':
    //             $query->orderByDesc('name');
    //             break;
    //     }
    //     if ($price !== 'all') {
    //         $query->Product::where('category_id', $id)->paginate(6);
    //     }

    //     $response = $query->paginate(6);
    //     $products = Product::paginate(6);

    //     return view('categories.show', compact('response', 'price', 'name', 'products'));
    // }
  
    

}
