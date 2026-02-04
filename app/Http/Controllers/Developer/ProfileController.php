<?php

namespace App\Http\Controllers\Developer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    public function index()
    {
        $developer = auth('developer')->user();
        return view('developer.pages.profile.edit', compact('developer'));
    }

    public function update(Request $request)
    {
        $developer = auth('developer')->user();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:developers,username,' . $developer->id],
            'phone' => ['required', 'string', 'max:20'],
            'designation' => ['nullable', 'string', 'max:255'],
            'address' => ['nullable', 'string', 'max:500'],
            'image' => ['nullable', 'image', 'max:1024'], // 1MB Max
        ]);

        $data = $request->only(['name', 'username', 'phone', 'designation', 'address']);

        if ($request->hasFile('image')) {
            if ($developer->image) {
                Storage::delete($developer->image);
            }
            $data['image'] = $request->file('image')->store('developers', 'public');
        }

        $developer->update($data);

        return back()->with('success', 'Profile updated successfully.');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'current_password:developer'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $developer = auth('developer')->user();

        $developer->update([
            'password' => Hash::make($request->password),
        ]);

        return back()->with('success', 'Password updated successfully.');
    }
}
