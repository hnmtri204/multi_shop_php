<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CardController extends Controller
{
    public function addToCard(Request $request, string $id)
    {
        $quantity = $request->get('quantity', 1);
        $product = Product::findOrFail($id);
        if (!$product) {
            return "lỗi!";
        }

        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $quantity;
        } else {
            $cart[$id] = [
                'id' => $product->id,
                'img' => $product->img,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $quantity,
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Đã thêm sản phẩm vào giỏ hàng!');
    }

    public function showCard()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {;
            return view('home.card');
        } else {
            return view('home.card', compact('cart'));
        }
    }


    public function updateCard(Request $request, string $id)
    {
        $newQuantity = $request->input('quantity');
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $newQuantity;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Đã cập nhật số lượng sản phẩm trong giỏ hàng!');
        }
        return redirect()->back()->with('error', 'Sản phẩm không có trong giỏ hàng!');
    }

    public function deleteCard(string $id)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Đã xóa sản phẩm khỏi giỏ hàng!');
    }

    public function showCardCheckout()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return view('home.checkout');
        } else {
            return view('home.checkout', compact('cart'));
        }
    }
}
