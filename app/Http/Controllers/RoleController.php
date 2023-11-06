<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class RoleController extends Controller
{
    public function index(): View
    {
        return view('roles.index', [
            'roles' => Role::paginate(10),
        ]);
    }

    public function create(): View
    {
        $permissions = Permission::get();
        return view('roles.create', [
            'permissions' => $permissions,
        ]);
    }

    public function store(Request $request)
    {
        // validate
        $request->validate([
            'name' => ['required', 'min:3'],
            'permissions' => ['required', 'array'],
            'permissions.*' => ['integer', 'exists:permissions,id'],
        ]);

        // create role in database
        $role = Role::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        // attach permissions
        $role->permissions()->attach($request->permissions);

        // redirect
        return redirect()
            ->route('roles.index')
            ->with('message', 'Role was successfully created.');

    }
}
