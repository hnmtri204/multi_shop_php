<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function handleCheckout( Request $request)
    {
        $value = $request->only(['name', 'email', 'address', 'phone']);
        if( $value['address'] == null || $value['phone'] == null )
        return redirect()->back()->with('waring', 'Vui lòng nhập đầy đủ thông tin!');
        else
        return redirect()->back()->with('success', 'Bạn đã đặt hàng thành công!');
    }
}
