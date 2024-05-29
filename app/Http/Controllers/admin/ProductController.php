<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('img', 'public');
        }

        $product = Product::create([
            'img' => $imagePath,
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'category_id' => $request->input('category_id'),
            'price' => $request->input('price'),
            'quantity' => $request->input('quantity'),
        ]);

        $message = $product ? "Successfully created" : "Creation failed";

        return redirect()->route("admin.products.index" );
    }
    

    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);

        $request['img'] = '/img/' . $request['img'];

        $product->update($request->only([
            'img', 'name', 'description', 'price', 'quantity', 'category_id'
        ]));
        $message = "Update succsess!";
        if ($product === null) {
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
        if ($product === null) {
            $message = "Delete fail!";
        }
        return redirect()->route('admin.products.index')->with('message', $message);
    }
}
