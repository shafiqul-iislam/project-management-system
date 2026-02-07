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
        // Example system settings
        $request->validate([
            // Add validations if any fields are added later
        ]);

        // Logic for system settings (e.g. password, but usually password is User related, not system wide?)
        // The user's view has password reset here, which is weird for "System Settings".
        // Password reset should be handled by a ProfileController, not SystemSettings.
        // However, the view says "System Settings" then shows Password.
        // If this is global system settings, maybe it shouldn't have password.
        // But since I'm implementing what the USER provided in the view earlier, I should check the view again.
        // View has "Current Password", "New Password". This is definitely User Profile stuff.
        // I will implement a separate updatePassword method for this if it's for the logged in admin.

        // For now, let's assume the user might want to add other system settings here later.
        // I'll leave this empty or handle any actual system settings if added.

        // Wait, looking at the view (step 136), "Security Settings" (renamed to System) has Password fields.
        // If this is for the ADMIN USER, it should update $request->user()->password.

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
