<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    //
    public function like(Request $request, string $id)
    {
        $quantity = $request->get('quantity', 1);
        $product = Product::findOrFail($id);
        if (!$product) {
            return "lỗi!";
        }

        $like = session()->get('like', []);
        if (isset($like[$id])) {
            $like[$id]['quantity'] += $quantity;
        } else {
            $like[$id] = [
                'id' => $product->id,
                'img' => $product->img,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $quantity,
            ];
        }
        session()->put('like', $like);
        return redirect()->back()->with('success', ' Đã thêm sản phẩm vào thích!');
    }

    public function showLike()
    {
        $like = session()->get('like', []);

        if (empty($like)) {;
            return view('home.like');
        } else {
            return view('home.like', compact('like'));
        }
    }

    public function deleteLike(string $id)
    {
        $like = session()->get('like', []);
        if (isset($like[$id])) {
            unset($like[$id]);
        }
        session()->put('like', $like);
        return redirect()->back()->with('success', 'Đã xóa sản phẩm khỏi thích!');
    }

}
