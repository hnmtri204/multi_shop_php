<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request['img']= '/images/'.$request['img'];

        $product = Product::create( $request->only([
            'img', 'name', 'description', 'price', 'quantity', 'category_id'
        ]));
        $message = "Create succsess!";
        if($product===null){
        $message = "Create fail!";
        }
        return redirect()->route('admin.products.index')->with('message', $message);
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
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $product = Product::findOrFail($id);

        $request['img']= '/images/'.$request['img'];

        $product->update($request->only([
            'img', 'name', 'description', 'price', 'quantity', 'category_id'
        ]));
        $message = "Update succsess!";
        if($product===null){
        $message = "Update fail!";
        }
        return redirect()->route('admin.products.index')->with('message', $message);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $product = Product::destroy($id);
        $message = "Delete succsess!";
        if($product===null){
        $message = "Delete fail!";
        }
        return redirect()->route('admin.products.index')->with('message', $message);
    }
}
