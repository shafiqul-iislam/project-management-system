<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settings = Setting::all()->pluck('value', 'key')->toArray();
        return view('admin.pages.settings.index', compact('settings'));
    }
    public function updateGeneralSettings(Request $request)
    {
        $data = $request->validate([
            'site_title'   => 'required|string|max:255',
            'admin_email'  => 'required|email|max:255',
            'language'     => 'nullable|string|max:50',
            'timezone'     => 'nullable|string|max:50',
        ]);

        foreach ($data as $key => $value) {
            Setting::set($key, $value, 'general');
        }

        return back()->with('success', 'General settings updated successfully.');
    }


    public function updateSystemSettings(Request $request)
    {
        if ($request->filled('current_password')) {
            $request->validate([
                'current_password' => 'required|current_password',
                'new_password' => 'required|string|min:6|confirmed',
            ]);

            $request->user()->update([
                'password' => \Illuminate\Support\Facades\Hash::make($request->new_password),
            ]);

            return redirect()->back()->with('success', 'Password updated successfully.');
        }

        return redirect()->back()->with('info', 'No system settings to update.');
    }

    public function updateEmailSettings(Request $request)
    {
        $data = $request->validate([
            'mail_mailer'        => 'required|string|max:50',
            'mail_host'          => 'required|string|max:255',
            'mail_port'          => 'required|numeric',
            'mail_username'      => 'nullable|string|max:255',
            'mail_password'      => 'nullable|string|max:255',
            'mail_encryption'    => 'nullable|string|max:50',
            'mail_from_address'  => 'required|email|max:255',
            'mail_from_name'     => 'required|string|max:255',
        ]);

        foreach ($data as $key => $value) {

            // Keep old password if empty
            if ($key === 'mail_password' && blank($value)) {
                continue;
            }

            Setting::set($key, $value, 'email');
        }

        return back()->with('success', 'Email settings updated successfully.');
    }

    public function updateNotificationSettings(Request $request)
    {
        $data = $request->validate([
            'push_notifications' => 'nullable|boolean',
            'email_notifications' => 'nullable|boolean',
        ]);

        foreach ($data as $key => $value) {
            Setting::set($key, $value, 'notification');
        }

        return back()->with('success', 'Notification settings updated successfully.');
    }
}
