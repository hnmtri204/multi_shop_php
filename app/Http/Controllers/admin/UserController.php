<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

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
        // kiểm tra quyền (check permissions)
        if(Gate::denies('create', User::class)) {
            return abort(403, 'Unauthorized');
        }
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        // check permissions
        if(Gate::denies('create', User::class)) {
            return abort(403, 'Unauthorized');
        }
        $user = User::create($request->only([
            'name', 'email', 'password', 'role'
        ]));
        $message = "Create success!";
        if (empty($user))
            $message = "Create fail!";

        return redirect()->route("admin.users.index")->with('message', $message);
    }

    public function edit(string $id)
    {
        //check permissions
        $targetUser = User::findOrFail($id);
        if(Gate::denies('update', [$targetUser])) {
            return abort(403, 'Unauthorized');
        }
        $users = User::findOrFail($id);
        return view('admin.users.edit', compact('users'));
    }

    public function update(Request $request, string $id)
    {
        //check permissions
        $targetUser = User::findOrFail($id);
        if(Gate::denies('update', [$targetUser] )){
        abort(403, 'Unauthorization');
        }
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

    public function destroy(string $id)
    {
        // check permissions
        $targetUser = User::findOrFail($id);
        if(Gate::denies('destroy', [$targetUser])) {
            return abort(403, 'Unauthorized');
        }
        $user = User::findOrFail($id);
        if ($user->orders()->count() > 0) {
            return redirect()->route("admin.users.index")
                ->with('message', "Không thể xóa người dùng này vì vẫn còn hoá đơn liên kết.");
        }
        $user->delete();
        return redirect()->route("admin.users.index")->with('message', 'Xoá người dùng thành công!');
    }
}
