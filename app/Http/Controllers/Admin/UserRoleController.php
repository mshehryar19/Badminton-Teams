<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    public function index()
    {
        return view('admin.users.index', [
            'users' => User::all(),
            'roles' => Role::all()
        ]);
    }

    public function update(Request $request, User $user)
    {
        $request->validate(['role' => 'required']);

        $user->syncRoles([$request->role]);

        return back()->with('success', 'Role updated');
    }
}
