<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product as ModelsProduct;
use PHPUnit\Event\Code\Throwable;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $productHot = ModelsProduct::orderBy('view', 'desc')->paginate(8);
        $productNew = ModelsProduct::orderBy('created_at', 'desc')->take(4)->get();
        return view('home.index', compact('productHot', 'productNew', 'categories'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $products = ModelsProduct::all();
        $productShow = ModelsProduct::findOrFail($id);
        return view('home.show', compact('productShow', 'products'));
    }

    public function contact()
    {
        return view('home.contact');
    }


    //search
    public function search(Request $request)
    {
        try {
            // return $request;
            $query = $request->input('search');
            $request->session()->put('search_query', $query);
            // dd($query);
            $products = ModelsProduct::where('name', 'LIKE', "%$query%")->paginate(6);
            return view('home.search', compact('products'));
        } catch (Throwable $th) {
            return $th;
        }
    }

    // filter search
    public function filter(Request $request)
    {
        try {
            $price = $request->input('price');
            $name = $request->input('name');
            $searchParameter = session()->get('search_query');
            $query = ModelsProduct::query();
            switch ($price) {
                case 'all':
                    $query->where('name', 'LIKE', "%$searchParameter%");
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
            // Lọc sản phẩm từ kết quả tìm kiếm
            if ($price !== 'all') {
                $query->where('name', 'LIKE', "%$searchParameter%");
            }

            $response = $query->paginate(6);
            $products = ModelsProduct::paginate(6);

            return view('home.search', compact('response', 'price', 'name', 'products'));
        } catch (Throwable $th) {
            return $th;
        }
    }
}
