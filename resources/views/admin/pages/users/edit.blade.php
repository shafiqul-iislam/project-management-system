<x-admin-layout>
    <div class="max-w-7xl mx-auto px-6 py-10">
        <!-- Title & Back Button -->
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-2xl font-bold text-slate-800">Edit User</h1>
                <p class="text-sm text-slate-500 mt-1">Update user details and role.</p>
            </div>
            <a href="{{ route('admin.users.index') }}"
                class="px-4 py-2 bg-white text-slate-700 font-medium rounded-lg border border-slate-200 hover:bg-slate-50 transition">
                Back to Users
            </a>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 sm:p-10">
            <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-slate-700 mb-1">Full Name</label>
                        <input type="text" name="name" id="name" required value="{{ old('name', $user->name) }}"
                            class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none transition"
                            placeholder="John Doe">
                        @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-slate-700 mb-1">Email Address</label>
                        <input type="email" name="email" id="email" required value="{{ old('email', $user->email) }}"
                            class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none transition"
                            placeholder="john@example.com">
                        @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <!-- Username -->
                    <div>
                        <label for="username" class="block text-sm font-medium text-slate-700 mb-1">Username</label>
                        <input type="text" name="username" id="username" required value="{{ old('username', $user->username) }}"
                            class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none transition"
                            placeholder="johndoe">
                        @error('username') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <!-- Phone -->
                    <div>
                        <label for="phone" class="block text-sm font-medium text-slate-700 mb-1">Phone Number</label>
                        <input type="text" name="phone" id="phone" value="{{ old('phone', $user->phone) }}"
                            class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none transition"
                            placeholder="+1 234 567 890">
                        @error('phone') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <!-- Role -->
                    <div>
                        <label for="role_id" class="block text-sm font-medium text-slate-700 mb-1">Role</label>
                        <select name="role_id" id="role_id" required
                            class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none transition">
                            <option value="">Select a Role</option>
                            @foreach($roles as $role)
                            <option value="{{ $role->id }}" {{ old('role_id', $user->role_id) == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                            @endforeach
                        </select>
                        @error('role_id') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>



                    <!-- Status -->
                    <div>
                        <label for="status" class="block text-sm font-medium text-slate-700 mb-1">Status</label>
                        <select name="status" id="status" required
                            class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none transition">
                            <option value="active" {{ old('status', $user->status) == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ old('status', $user->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                        @error('status') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-slate-700 mb-1">Password <span class="text-slate-400 font-normal">(Leave blank to keep current)</span></label>
                        <input type="password" name="password" id="password"
                            class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none transition"
                            placeholder="********">
                        @error('password') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="mt-8 pt-6 border-t border-slate-100 flex justify-end">
                    <button type="submit"
                        class="px-6 py-2.5 bg-primary text-white font-medium rounded-lg hover:bg-primary/90 transition shadow-lg shadow-primary/30">
                        Update User
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>