<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        //
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|string|max:255',
            'description' => 'required|string'
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('categories', 'public');
        }

        $category = Category::create([
            'img' => $imagePath,
            'name' => $request->input('name'),
            'description' => $request->input('description'),

        ]);

        $message = $category ? "Successfully created" : "Created failed";

        return redirect()->route("admin.categories.index" )->with('message', $message);
    }

    public function edit(string $id)
    {
        //
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }


    // public function update(Request $request, string $id)
    // {
    //     //
    //     $category = Category::findOrFail($id);
    //     $category->update($request->only([
    //         'name', 'description'
    //     ]));
    //     $message = "Updated successfully!";
    //     if ($category === null) {
    //         $message = "Update failed!";
    //     }
    //     return redirect()->route("admin.categories.index")->with('message', $message);
    // }
    public function update(Request $request, string $id)
    {
        $category = Category::findOrFail($id);

        // Validate the request
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('categories', 'public');
            // Delete previous image if exists
            if ($category->img) {
                Storage::disk('public')->delete($category->img);
            }
            $category->img = $imagePath;
        }

        // Update category details
        $category->name = $request->input('name');
        $category->description = $request->input('description');

        // Save the changes
        $category->save();
        return redirect()->route('admin.categories.index')->with('message', 'Product updated successfully.');
    }

    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        if ($category->products()->count() > 0) {
            return redirect()->route("admin.categories.index")
                ->with('message', "Không thể xóa danh mục này vì vẫn còn sản phẩm liên kết.");
        }

        $category->delete();

        return redirect()->route("admin.categories.index")
            ->with('message', "Xóa danh mục thành công!");
    }
}
