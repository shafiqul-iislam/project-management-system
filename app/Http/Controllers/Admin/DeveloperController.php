<?php

namespace App\Http\Controllers\Admin;

use App\Models\Developer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DeveloperController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $developers = Developer::latest()->paginate(10);
        return view('admin.pages.developers.index', compact('developers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.developers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:developers',
            'email' => 'required|email|max:255|unique:developers',
            'phone' => 'required|string|max:20',
            'password' => 'required|string|min:6|confirmed',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'designation' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:500',
            'status' => 'required|in:active,inactive',
        ]);

        $data = $request->all();
        $data['password'] = \Illuminate\Support\Facades\Hash::make($request->password);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('developers', 'public');
            $data['image'] = $imagePath;
        }

        Developer::create($data);

        return redirect()->route('admin.developers.index')->with('success', 'Developer created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Developer $developer)
    {
        return view('admin.pages.developers.show', compact('developer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Developer $developer)
    {
        return view('admin.pages.developers.edit', compact('developer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Developer $developer)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:developers,username,' . $developer->id,
            'email' => 'required|email|max:255|unique:developers,email,' . $developer->id,
            'phone' => 'required|string|max:20',
            'password' => 'nullable|string|min:6|confirmed',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'designation' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:500',
            'status' => 'required|in:active,inactive',
        ]);

        $data = $request->except(['password', 'image']);

        if ($request->filled('password')) {
            $data['password'] = \Illuminate\Support\Facades\Hash::make($request->password);
        }

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($developer->image) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($developer->image);
            }
            $imagePath = $request->file('image')->store('developers', 'public');
            $data['image'] = $imagePath;
        }

        $developer->update($data);

        return redirect()->route('admin.developers.index')->with('success', 'Developer updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Developer $developer)
    {
        if ($developer->image) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($developer->image);
        }
        $developer->delete();

        return redirect()->route('admin.developers.index')->with('success', 'Developer deleted successfully.');
    }
}
