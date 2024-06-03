<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Throwable;

class CheckoutController extends Controller
{
  public function handleCheckout(Request $request)
  {
    try {
      $value = $request->only(['user_id', 'name', 'email', 'address', 'phone', 'total', 'note']);

      // Validate address and phone are filled
      if ($value['address'] == null || $value['phone'] == null) {
        return redirect()->back()->with('warning', 'Vui lòng nhập đầy đủ thông tin!');
      } else {
        // Create the order
        $order = Order::create($request->only([
          'user_id', 'address', 'phone', 'total', 'note'
        ]));
        //Reference(tham chiếu) to orderItems
        $cart = session()->get('cart');
        foreach ($cart as $item) {
          $order->orderItems()->create([
            'product_id' => $item['id'],
            'quantity' => $item['quantity'],
            'price' => $item['price']
          ]);
        }
        session()->forget('cart');// delete cart
        return redirect()->back()->with('success', 'Bạn đã đặt hàng thành công!');
      }
    } catch (Throwable $th) {
      return $th;
    }
  }
}
