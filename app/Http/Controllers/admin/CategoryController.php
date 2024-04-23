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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $category = Category::create($request->only([
            'name', 'description'
        ]));
        $message = "Create success!";
        if(empty($category))
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
        //\
        $category = Category::findOrFail($id);
        $category -> update($request->only([
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
        //
        $category = Category::destroy($id);
        // dd($category);
        $message = "Delete successfully!";
        if ($category === null) {
            $message = "Update failed!";
        }
        return redirect()->route("admin.categories.index")->with('message', $message);

    }
}
