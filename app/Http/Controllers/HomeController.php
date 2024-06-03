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

    // detail
    public function show(string $id)
    {
        $products = ModelsProduct::all();
        $productShow = ModelsProduct::findOrFail($id);

        // increment view when viewing details
        if($productShow){
            $productShow->increment('view');
            $productShow->save();
        }
        
        return view('home.show', compact('productShow', 'products'));
    }

    //contact
    public function contact()
    {
        return view('home.contact');
    }


    //search
    public function search(Request $request)
    {
        try {
            // Lưu giá trị tìm kiếm vào session
            $request->session()->put('search_query', $request->input('search'));
    
            $query = $request->session()->get('search_query');
            $queries = ModelsProduct::where('name', 'LIKE', "%$query%");
    
            // Khởi tạo các biến lọc với giá trị mặc định
            $price = $request->input('price', 'all');
            $name = $request->input('name', 'AtoZ');
            session()->put('price_query', $price);
            session()->put('name_query', $name);
            // Lọc theo giá
            switch ($price) {
                case '1':
                    $queries->where('price', '<=', 100);
                    break;
                case '2':
                    $queries->where('price', '>', 100)->where('price', '<=', 200);
                    break;
                case '3':
                    $queries->where('price', '>', 200)->where('price', '<=', 300);
                    break;
                case '4':
                    $queries->where('price', '>', 300)->where('price', '<=', 400);
                    break;
                case '5':
                    $queries->where('price', '>', 400)->where('price', '<=', 500);
                    break;
                default:
                    break;
            }
    
            // Lọc theo tên
            if ($name == 'AtoZ') {
                $queries->orderBy('name', 'asc');
            } elseif ($name == 'ZtoA') {
                $queries->orderBy('name', 'desc');
            }
    
            $products = $queries->paginate(6)->appends([
                'search' => $request->input('search'),
                'price' => $request->input('price'),
                'name' => $request->input('name'),
            ]);
    
            // Trả về view với các biến đã được lưu trong session
            return view('home.search', compact('products', 'price', 'name'));
        } catch (Throwable $th) {
            return $th;
        }
    }
    
    
   
}
