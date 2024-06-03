<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

        $message = $product ? "Successfully created" : "Created failed";

        return redirect()->route("admin.products.index" )->with('message', $message);
    }
    

    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }


    // public function update(Request $request, string $id)
    // {
    //     $request->validate([
    //         'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //         'name' => 'required|string|max:255',
    //         'description' => 'required|string',
    //         'category_id' => 'required|string',
    //         'price' => 'required|numeric',
    //         'quantity' => 'required|integer',
    //     ]);
        
    //     if ($request->hasFile('image')) {
    //         $imagePath = $request->file('image')->store('img', 'public');
    //     }

    //     $product = Product::findOrFail($id);


    //     $product->update([
    //         'img' => $imagePath,
    //         'name' => $request->input('name'),
    //         'description' => $request->input('description'),
    //         'category_id' => $request->input('category_id'),
    //         'price' => $request->input('price'),
    //         'quantity' => $request->input('quantity'),
    //     ]);
    //     $message = $product ? "Successfully Updated" : "Updated failed";
    //     return redirect()->route('admin.products.index')->with('message', $message);
    // }

    
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);

        // Validate the request
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'view' => 'required|numeric',

        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('img', 'public');
            // Delete previous image if exists
            if ($product->img) {
                Storage::disk('public')->delete($product->img);
            }
            $product->img = $imagePath;
        }

        // Update product details
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->quantity = $request->input('quantity');
        $product->category_id = $request->input('category_id');
        $product->view = $request->input('view');

        // Save the changes
        $product->save();
        return redirect()->route('admin.products.index')->with('message', 'Product updated successfully.');
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
