<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::latest()->get();
        return view('admin.pages.roles.roles', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = config('permissions');
        return view('admin.pages.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'role_type' => 'required|in:admin,staff,project_manager',
            'description' => 'nullable|string',
            'permissions' => 'nullable|array',
        ]);

        Role::create([
            'name' => $request->name,
            'slug' => \Illuminate\Support\Str::slug($request->name),
            'role_type' => $request->role_type,
            'description' => $request->description,
            'permissions' => $request->permissions ?? [],
        ]);

        return redirect()->route('admin.roles.index')->with('success', 'Role created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        $permissions = config('permissions');
        return view('admin.pages.roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'role_type' => 'required|in:admin,staff,project_manager',
            'description' => 'nullable|string',
            'permissions' => 'nullable|array',
        ]);

        $role->update([
            'name' => $request->name,
            'slug' => \Illuminate\Support\Str::slug($request->name),
            'role_type' => $request->role_type,
            'description' => $request->description,
            'permissions' => $request->permissions ?? [],
        ]);

        return redirect()->route('admin.roles.index')->with('success', 'Role updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('admin.roles.index')->with('success', 'Role deleted successfully.');
    }
}
