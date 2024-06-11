<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class HomeAdminController extends Controller
{

    public function index()
    {
        //total revenue 
        $orders = Order::all();
        $total=0;
        foreach($orders as $item){
            $total += $item->total;
        }
        //
        
        // product
        $products = Product::all();
        $countPro= $products->count();
       //

        // order
        $countOrd= $orders->count();
       //

        // order by paid
        $orderPaid = Order::where('status', 'paid')->count();
       //

       //table
       $orderShow = OrderItem::all();
       //

        return view('admin.dashboard', compact('total', 'countPro', 'countOrd', 'orderPaid', 'orderShow'));
    }
}
