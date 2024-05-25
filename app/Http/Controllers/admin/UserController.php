<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = User::create($request->only([
            'name', 'email', 'password', 'role'
        ]));
        $message = "Create success!";
        if (empty($user))
            $message = "Create fail!";

        return redirect()->route("admin.users.index")->with('message', $message);
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
        $users = User::findOrFail($id);
        return view('admin.users.edit', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //\
        $user = User::findOrFail($id);
        $user->update($request->only([
            'name', 'email', 'password', 'role'
        ]));
        $message = "Updated successfully!";
        if ($user === null) {
            $message = "Update failed!";
        }
        return redirect()->route("admin.users.index")->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        if ($user->orders()->count() > 0) {
            return redirect()->route("admin.users.index")
                ->with('message', "Không thể xóa người dùng này vì vẫn còn hoá đơn liên kết.");
        }
        $user->delete();
        return redirect()->route("admin.users.index")->with('message', 'Xoá người dùng thành công!');
    }
}
