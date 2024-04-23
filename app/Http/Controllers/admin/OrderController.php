<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $orders = Order::all();
        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.orders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $order = Order::create($request->only([
            'code', 'status', 'user_id'
        ]));
        $message = "Create success!";
        if(empty($order))
        $message = "Create fail!";
        
        return redirect()->route("admin.orders.index")->with('message', $message);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $order = Order::findOrFail($id);
        return view('admin.orders.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //\
        $order = Order::findOrFail($id);
        $order -> update($request->only([
            'code', 'status', 'user_id'
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
        //
        $order = Order::destroy($id);
        // dd($user);
        $message = "Delete successfully!";
        if ($order === null) {
            $message = "Update failed!";
        }
        return redirect()->route("admin.orders.index")->with('message', $message);

    }
}
