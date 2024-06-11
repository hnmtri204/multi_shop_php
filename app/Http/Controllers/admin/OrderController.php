<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();
        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('admin.orders.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $order = Order::create($request->only([
            'code', 'status', 'user_id', 'phone', 'address', 'total', 'note'
        ]));
        $message = "Create success!";
        if (empty($order))
            $message = "Create fail!";

        return redirect()->route("admin.orders.index")->with('message', $message);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users = User::all();
        $order = Order::findOrFail($id);
        return view('admin.orders.edit', compact('order', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $order = Order::findOrFail($id);
        $order->update($request->only([
            'code', 'status', 'user_id', 'phone', 'address', 'total', 'note'
        ]));
        $message = "Updated successfully!";
        if ($order === null) {
            $message = "Update failed!";
        }
        return redirect()->route("admin.orders.index")->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    $order = Order::find($id);

    if ($order === null) {
        $message = "Order not found!";
    } else {
        $hasChildRows = $order->orderItems()->exists();

        if ($hasChildRows) {
            $order->orderItems()->delete();
        }

        $order->delete();
        $message = "Delete successfully!";
    }

    return redirect()->route("admin.orders.index")->with('message', $message);
}

}
