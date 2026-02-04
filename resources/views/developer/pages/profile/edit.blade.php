<x-developer-layout>
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-slate-800">Profile Settings</h1>
        <p class="text-slate-500">Manage your account information and security.</p>
    </div>

    <div class="grid gap-8 md:grid-cols-2">
        <!-- Profile Information -->
        <div class="rounded-xl bg-white shadow-sm border border-slate-100 p-6">
            <h2 class="text-lg font-semibold text-slate-800 mb-4">Profile Information</h2>

            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                @method('PUT')

                <!-- Profile Image -->
                <div class="flex items-center gap-4 mb-6">
                    <img src="{{ $developer->image ? asset('storage/' . $developer->image) : 'https://ui-avatars.com/api/?name='.urlencode($developer->name).'&background=4f46e5&color=fff' }}"
                        alt="{{ $developer->name }}"
                        class="h-20 w-20 rounded-full object-cover border-2 border-slate-100">
                    <div>
                        <label class="block text-sm font-medium text-slate-700">Profile Photo</label>
                        <input type="file" name="image" class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition-colors mt-1">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="name" class="block text-sm font-medium text-slate-700">Display Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $developer->name) }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm border p-2">
                    </div>
                    <div>
                        <label for="username" class="block text-sm font-medium text-slate-700">Username</label>
                        <input type="text" name="username" id="username" value="{{ old('username', $developer->username) }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm border p-2">
                    </div>
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-slate-700">Email Address</label>
                    <input type="email" value="{{ $developer->email }}" disabled class="mt-1 block w-full rounded-md border-gray-200 bg-gray-50 text-gray-500 shadow-sm sm:text-sm border p-2 cursor-not-allowed">
                    <p class="mt-1 text-xs text-slate-400">Email address cannot be changed.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="phone" class="block text-sm font-medium text-slate-700">Phone</label>
                        <input type="text" name="phone" id="phone" value="{{ old('phone', $developer->phone) }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm border p-2">
                    </div>
                    <div>
                        <label for="designation" class="block text-sm font-medium text-slate-700">Designation</label>
                        <input type="text" name="designation" id="designation" value="{{ old('designation', $developer->designation) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm border p-2">
                    </div>
                </div>

                <div>
                    <label for="address" class="block text-sm font-medium text-slate-700">Address</label>
                    <textarea name="address" id="address" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm border p-2">{{ old('address', $developer->address) }}</textarea>
                </div>

                <div class="flex justify-end pt-4">
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors shadow-lg shadow-blue-500/30">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>

        <!-- Security -->
        <div class="space-y-8">
            <div class="rounded-xl bg-white shadow-sm border border-slate-100 p-6">
                <h2 class="text-lg font-semibold text-slate-800 mb-4">Update Password</h2>

                <form action="{{ route('profile.password') }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="current_password" class="block text-sm font-medium text-slate-700">Current Password</label>
                        <input type="password" name="current_password" id="current_password" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm border p-2">
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-slate-700">New Password</label>
                        <input type="password" name="password" id="password" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm border p-2">
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-slate-700">Confirm New Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm border p-2">
                    </div>

                    <div class="flex justify-end pt-4">
                        <button type="submit" class="bg-slate-800 text-white px-4 py-2 rounded-lg hover:bg-slate-700 transition-colors shadow-lg shadow-slate-500/30">
                            Update Password
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-developer-layout>