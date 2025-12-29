<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsController extends Controller
{
    /* =======================
       ROLES & PERMISSIONS
    ======================== */

    public function index()
    {
        return view('admin.roles-permissions.index', [
            'roles' => Role::with('permissions')->get(),
            'permissions' => Permission::all(),
        ]);
    }

    public function storeRole(Request $request)
    {
        $request->validate([
            'role_name' => 'required|unique:roles,name',
        ]);

        Role::create(['name' => $request->role_name]);

        return back()->with('success', 'Role created successfully');
    }

    public function updateRolePermissions(Request $request, Role $role)
    {
        $role->syncPermissions($request->permissions ?? []);

        return back()->with('success', 'Permissions updated');
    }

    public function deleteRole(Role $role)
    {
        $role->delete();

        return back()->with('success', 'Role deleted');
    }

    public function storePermission(Request $request)
    {
        $request->validate([
            'permission_name' => 'required|unique:permissions,name',
        ]);

        Permission::create(['name' => $request->permission_name]);

        return back()->with('success', 'Permission created');
    }

    /* =======================
       USER ROLE ASSIGNMENT
    ======================== */

    public function users()
    {
        return view('admin.roles-permissions.users', [
            'users' => User::with('roles')->get(),
            'roles' => Role::all(),
        ]);
    }

    public function assignRole(Request $request, User $user)
    {
        $request->validate([
            'role' => 'required|exists:roles,name',
        ]);

        $user->syncRoles([$request->role]);

        return back()->with('success', 'Role assigned to user');
    }
}

