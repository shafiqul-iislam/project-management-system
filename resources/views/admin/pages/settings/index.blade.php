<x-admin-layout>

    <!-- Page Title -->
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-slate-800">System Settings</h1>
        <p class="text-slate-500">Manage your application preferences and security.</p>
    </div>

    <!-- Settings Container -->
    <div class="bg-white rounded-xl shadow-sm border border-slate-100 overflow-hidden">

        <!-- Tabs -->
        <div class="border-b border-slate-200">
            <nav class="flex -mb-px">
                <button
                    class="tab-btn active w-1/3 py-4 px-1 text-center border-b-2 border-primary text-primary font-medium text-sm hover:text-primary hover:border-primary transition-all"
                    data-tab="general">
                    General
                </button>
                <button
                    class="tab-btn w-1/3 py-4 px-1 text-center border-b-2 border-transparent text-slate-500 font-medium text-sm hover:text-slate-700 hover:border-slate-300 transition-all"
                    data-tab="system">
                    System
                </button>
                <button
                    class="tab-btn w-1/3 py-4 px-1 text-center border-b-2 border-transparent text-slate-500 font-medium text-sm hover:text-slate-700 hover:border-slate-300 transition-all"
                    data-tab="email">
                    Email Settings
                </button>
                <button
                    class="tab-btn w-1/3 py-4 px-1 text-center border-b-2 border-transparent text-slate-500 font-medium text-sm hover:text-slate-700 hover:border-slate-300 transition-all"
                    data-tab="notifications">
                    Notifications
                </button>
            </nav>
        </div>

        <!-- Tab Contents -->
        <div class="p-6">

            <!-- General Settings -->
            <div id="general-tab" class="tab-content block space-y-6">
                <h2 class="text-lg font-medium text-slate-900">General Information</h2>
                <form action="{{ route('admin.settings.general') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                        <div>
                            <label for="site-title" class="block text-sm font-medium text-slate-700">Site Title</label>
                            <input type="text" name="site_title" id="site-title" value="{{ $settings['site_title'] ?? 'Modern Admin Dashboard' }}"
                                class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-primary focus:ring focus:ring-primary/50 sm:text-sm border p-2">
                        </div>
                        <div>
                            <label for="admin-email" class="block text-sm font-medium text-slate-700">Admin Email</label>
                            <input type="email" name="admin_email" id="admin-email" value="{{ $settings['admin_email'] ?? 'admin@example.com' }}"
                                class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-primary focus:ring focus:ring-primary/50 sm:text-sm border p-2">
                        </div>
                        <div>
                            <label for="language" class="block text-sm font-medium text-slate-700">Language</label>
                            <select name="language" id="language"
                                class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-primary focus:ring focus:ring-primary/50 sm:text-sm border p-2">
                                <option value="English" {{ ($settings['language'] ?? '') == 'English' ? 'selected' : '' }}>English</option>
                                <option value="Spanish" {{ ($settings['language'] ?? '') == 'Spanish' ? 'selected' : '' }}>Spanish</option>
                                <option value="French" {{ ($settings['language'] ?? '') == 'French' ? 'selected' : '' }}>French</option>
                                <option value="German" {{ ($settings['language'] ?? '') == 'German' ? 'selected' : '' }}>German</option>
                            </select>
                        </div>
                        <div>
                            <label for="timezone" class="block text-sm font-medium text-slate-700">Timezone</label>
                            <select name="timezone" id="timezone"
                                class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-primary focus:ring focus:ring-primary/50 sm:text-sm border p-2">
                                <option value="UTC" {{ ($settings['timezone'] ?? '') == 'UTC' ? 'selected' : '' }}>UTC</option>
                                <option value="EST" {{ ($settings['timezone'] ?? '') == 'EST' ? 'selected' : '' }}>EST</option>
                                <option value="PST" {{ ($settings['timezone'] ?? '') == 'PST' ? 'selected' : '' }}>PST</option>
                                <option value="GMT" {{ ($settings['timezone'] ?? '') == 'GMT' ? 'selected' : '' }}>GMT</option>
                            </select>
                        </div>
                    </div>
                    <div class="pt-4 flex justify-end">
                        <button type="submit"
                            class="save-btn bg-primary text-white px-4 py-2 rounded-lg hover:bg-primary/90 transition-colors">Save Changes</button>
                    </div>
                </form>
            </div>

            <!-- Security Settings -->
            <div id="system-tab" class="tab-content hidden space-y-6">
                <h2 class="text-lg font-medium text-slate-900">System Settings</h2>
                <form action="{{ route('admin.settings.system') }}" method="POST">
                    @csrf
                    <div class="space-y-4">
                        <div>
                            <label for="current-password" class="block text-sm font-medium text-slate-700">Current Password</label>
                            <input type="password" name="current_password" id="current-password"
                                class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-primary focus:ring focus:ring-primary/50 sm:text-sm border p-2">
                        </div>
                        <div>
                            <label for="new-password" class="block text-sm font-medium text-slate-700">New Password</label>
                            <input type="password" name="new_password" id="new-password"
                                class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-primary focus:ring focus:ring-primary/50 sm:text-sm border p-2">
                        </div>
                        <div>
                            <label for="confirm-password" class="block text-sm font-medium text-slate-700">Confirm New Password</label>
                            <input type="password" name="new_password_confirmation" id="confirm-password"
                                class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-primary focus:ring focus:ring-primary/50 sm:text-sm border p-2">
                        </div>
                        <div class="flex items-center justify-between py-4 border-t border-slate-100">
                            <div>
                                <h3 class="text-sm font-medium text-slate-900">Two-Factor Authentication</h3>
                                <p class="text-sm text-slate-500">Add an extra layer of security to your account.</p>
                            </div>
                            <button type="button"
                                class="relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 bg-slate-200"
                                role="switch" aria-checked="false">
                                <span aria-hidden="true"
                                    class="translate-x-0 pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out"></span>
                            </button>
                        </div>
                    </div>
                    <div class="pt-4 flex justify-end">
                        <button type="submit"
                            class="save-btn bg-primary text-white px-4 py-2 rounded-lg hover:bg-primary/90 transition-colors">Update Password</button>
                    </div>
                </form>
            </div>

            <!-- Email Settings -->
            <div id="email-tab" class="tab-content hidden space-y-6">
                <h2 class="text-lg font-medium text-slate-900">Email Configuration</h2>
                <form action="{{ route('admin.settings.email') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                        <div>
                            <label for="mail_mailer" class="block text-sm font-medium text-slate-700">Mail Driver</label>
                            <input type="text" name="mail_mailer" id="mail_mailer" value="{{ $settings['mail_mailer'] ?? 'smtp' }}"
                                class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-primary focus:ring focus:ring-primary/50 sm:text-sm border p-2">
                        </div>
                        <div>
                            <label for="mail_host" class="block text-sm font-medium text-slate-700">Mail Host</label>
                            <input type="text" name="mail_host" id="mail_host" value="{{ $settings['mail_host'] ?? 'smtp.gmail.com' }}"
                                class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-primary focus:ring focus:ring-primary/50 sm:text-sm border p-2">
                        </div>
                        <div>
                            <label for="mail_port" class="block text-sm font-medium text-slate-700">Mail Port</label>
                            <input type="number" name="mail_port" id="mail_port" value="{{ $settings['mail_port'] ?? '587' }}"
                                class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-primary focus:ring focus:ring-primary/50 sm:text-sm border p-2">
                        </div>
                        <div>
                            <label for="mail_username" class="block text-sm font-medium text-slate-700">Mail Username</label>
                            <input type="text" name="mail_username" id="mail_username" value="{{ $settings['mail_username'] ?? '' }}"
                                class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-primary focus:ring focus:ring-primary/50 sm:text-sm border p-2">
                        </div>
                        <div>
                            <label for="mail_password" class="block text-sm font-medium text-slate-700">Mail Password</label>
                            <input type="password" name="mail_password" id="mail_password" value="{{ $settings['mail_password'] ?? '' }}"
                                class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-primary focus:ring focus:ring-primary/50 sm:text-sm border p-2">
                        </div>
                        <div>
                            <label for="mail_encryption" class="block text-sm font-medium text-slate-700">Mail Encryption</label>
                            <select name="mail_encryption" id="mail_encryption"
                                class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-primary focus:ring focus:ring-primary/50 sm:text-sm border p-2">
                                <option value="tls" {{ ($settings['mail_encryption'] ?? '') == 'tls' ? 'selected' : '' }}>TLS</option>
                                <option value="ssl" {{ ($settings['mail_encryption'] ?? '') == 'ssl' ? 'selected' : '' }}>SSL</option>
                                <option value="" {{ ($settings['mail_encryption'] ?? '') == '' ? 'selected' : '' }}>None</option>
                            </select>
                        </div>
                        <div>
                            <label for="mail_from_address" class="block text-sm font-medium text-slate-700">From Address</label>
                            <input type="email" name="mail_from_address" id="mail_from_address" value="{{ $settings['mail_from_address'] ?? '' }}"
                                class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-primary focus:ring focus:ring-primary/50 sm:text-sm border p-2">
                        </div>
                        <div>
                            <label for="mail_from_name" class="block text-sm font-medium text-slate-700">From Name</label>
                            <input type="text" name="mail_from_name" id="mail_from_name" value="{{ $settings['mail_from_name'] ?? config('app.name') }}"
                                class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-primary focus:ring focus:ring-primary/50 sm:text-sm border p-2">
                        </div>
                    </div>
                    <div class="pt-4 flex justify-end">
                        <button type="submit"
                            class="save-btn bg-primary text-white px-4 py-2 rounded-lg hover:bg-primary/90 transition-colors">Save Email Settings</button>
                    </div>
                </form>
            </div>

            <!-- Notifications Settings -->
            <div id="notifications-tab" class="tab-content hidden space-y-6">
                <h2 class="text-lg font-medium text-slate-900">Notification Preferences</h2>
                <form action="{{ route('admin.settings.notifications') }}" method="POST">
                    @csrf

                    <div class="space-y-4">
                        <!-- Email -->
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="text-sm font-medium text-slate-900">Email Notifications</h3>
                                <p class="text-sm text-slate-500">Receive emails about your account activity.</p>
                            </div>

                            <!-- hidden fallback -->
                            <input type="hidden" name="email_notifications" value="0">

                            <input
                                type="checkbox"
                                name="email_notifications"
                                id="email_notifications"
                                value="1"
                                {{ $settings['email_notifications'] ? 'checked' : '' }}
                                class="h-4 w-4 rounded border-slate-300 text-primary focus:ring-primary">
                        </div>

                        <!-- Push -->
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="text-sm font-medium text-slate-900">Push Notifications</h3>
                                <p class="text-sm text-slate-500">Receive push notifications on your device.</p>
                            </div>

                            <!-- hidden fallback -->
                            <input type="hidden" name="push_notifications" value="0">

                            <input
                                type="checkbox"
                                name="push_notifications"
                                id="push_notifications"
                                value="1"
                                {{ $settings['push_notifications'] ? 'checked' : '' }}
                                class="h-4 w-4 rounded border-slate-300 text-primary focus:ring-primary">
                        </div>
                    </div>

                    <div class="pt-4 flex justify-end">
                        <button type="submit"
                            class="save-btn bg-primary text-white px-4 py-2 rounded-lg hover:bg-primary/90 transition-colors">
                            Save Preferences
                        </button>
                    </div>
                </form>

            </div>

        </div>
    </div>

    @vite('resources/js/settings.js')
</x-admin-layout>