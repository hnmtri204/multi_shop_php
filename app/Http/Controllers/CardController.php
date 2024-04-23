<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    // add to card
    public function addToCard(Request $request, string $id)
    {
        $quantity = $request->get('quantity', 1);

        $product = Product::findOrFail($id);

        // Lấy giỏ hàng hiện tại từ session
        $cart = session()->get('cart', []);
        // Kiểm tra sản phẩm đã có trong giỏ hàng chưa
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $quantity;
        } else {
            $cart[$product->id] = [
                'id' => $product->id,
                'img' => $product->img,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $quantity,
            ];
        }

        // Lưu giỏ hàng cập nhật vào session
        session()->put('cart', $cart);
        // dd($cart);


        // Thông báo thành công
        return redirect()->back()->with('success', 'Đã thêm sản phẩm vào giỏ hàng!');
    }

    public function showCard()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            echo "Giỏ hàng của bạn hiện đang rỗng.";
        } else {
            // dd($cart);
            return view('home.card', compact('cart'));
        }
    }





    public function updateCard(Request $request, string $id)
    {
        $newQuantity = $request->input('quantity');

        // Lấy giỏ hàng từ session
        $cart = session()->get('cart', []);

        // Kiểm tra sản phẩm có tồn tại trong giỏ hàng không
        if (isset($cart[$id])) {
            // Cập nhật số lượng mới của sản phẩm trong giỏ hàng
            $cart[$id]['quantity'] = $newQuantity;

            // Lưu giỏ hàng cập nhật vào session
            session()->put('cart', $cart);

            // Thông báo thành công
            return redirect()->back()->with('success', 'Đã cập nhật số lượng sản phẩm trong giỏ hàng!');
        }

        // Nếu sản phẩm không tồn tại trong giỏ hàng, thông báo lỗi
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
}
