<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Throwable;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function handleCheckout(Request $request)
    {
        try {
            $value = $request->only(['user_id', 'name', 'email', 'address', 'phone', 'total']);
            // dd($request['total']);
            if ($value['address'] == null || $value['phone'] == null) {
                return redirect()->back()->with('warning', 'Vui lòng nhập đầy đủ thông tin!');
            } else {
                Order::create($request->only([
                    'user_id', 'address', 'phone', 'total'
                ]));
                session()->forget('cart');
                return redirect()->back()->with('success', 'Bạn đã đặt hàng thành công!');
            }
        } catch (Throwable $th) {
            return $th;
        }
    }
}
