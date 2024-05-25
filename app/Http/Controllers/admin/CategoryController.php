<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

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
        $request['img'] = '/img/' . $request['img'];
        $category = Category::create($request->only([
            'name', 'description', 'img'
        ]));
        $message = "Create success!";
        if (empty($category))
            $message = "Create fail!";

        return redirect()->route("admin.categories.index")->with('message', $message);
    }

    public function edit(string $id)
    {
        //
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }


    public function update(Request $request, string $id)
    {
        //
        $category = Category::findOrFail($id);
        $category->update($request->only([
            'name', 'description'
        ]));
        $message = "Updated successfully!";
        if ($category === null) {
            $message = "Update failed!";
        }
        return redirect()->route("admin.categories.index")->with('message', $message);
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
