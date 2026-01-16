<x-admin-layout>
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Add Developer</h1>
            <p class="text-slate-500">Create a new developer account.</p>
        </div>
        <a href="{{ route('admin.developers.index') }}" class="flex items-center gap-2 rounded-lg bg-white border border-slate-200 px-4 py-2 text-sm font-medium text-slate-600 hover:bg-slate-50 hover:text-slate-800 transition-all">
            <i class="ri-arrow-left-line"></i>
            Back to List
        </a>
    </div>

    <div class="rounded-xl bg-white shadow-sm border border-slate-100 p-6">
        <form action="{{ route('admin.developers.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-slate-700 mb-1">Full Name <span class="text-red-500">*</span></label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" class="w-full rounded-lg border-slate-200 text-sm focus:border-blue-500 focus:ring-blue-500" required>
                    @error('name')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Designation -->
                <div>
                    <label for="designation" class="block text-sm font-medium text-slate-700 mb-1">Designation</label>
                    <input type="text" name="designation" id="designation" value="{{ old('designation') }}" class="w-full rounded-lg border-slate-200 text-sm focus:border-blue-500 focus:ring-blue-500">
                    @error('designation')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Username -->
                <div>
                    <label for="username" class="block text-sm font-medium text-slate-700 mb-1">Username <span class="text-red-500">*</span></label>
                    <input type="text" name="username" id="username" value="{{ old('username') }}" class="w-full rounded-lg border-slate-200 text-sm focus:border-blue-500 focus:ring-blue-500" required>
                    @error('username')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-slate-700 mb-1">Email Address <span class="text-red-500">*</span></label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" class="w-full rounded-lg border-slate-200 text-sm focus:border-blue-500 focus:ring-blue-500" required>
                    @error('email')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Phone -->
                <div>
                    <label for="phone" class="block text-sm font-medium text-slate-700 mb-1">Phone Number <span class="text-red-500">*</span></label>
                    <input type="text" name="phone" id="phone" value="{{ old('phone') }}" class="w-full rounded-lg border-slate-200 text-sm focus:border-blue-500 focus:ring-blue-500" required>
                    @error('phone')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Status -->
                <div>
                    <label for="status" class="block text-sm font-medium text-slate-700 mb-1">Status <span class="text-red-500">*</span></label>
                    <select name="status" id="status" class="w-full rounded-lg border-slate-200 text-sm focus:border-blue-500 focus:ring-blue-500" required>
                        <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                    @error('status')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-slate-700 mb-1">Password <span class="text-red-500">*</span></label>
                    <input type="password" name="password" id="password" class="w-full rounded-lg border-slate-200 text-sm focus:border-blue-500 focus:ring-blue-500" required>
                    @error('password')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-slate-700 mb-1">Confirm Password <span class="text-red-500">*</span></label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="w-full rounded-lg border-slate-200 text-sm focus:border-blue-500 focus:ring-blue-500" required>
                </div>

                <!-- Address -->
                <div class="md:col-span-2">
                    <label for="address" class="block text-sm font-medium text-slate-700 mb-1">Address</label>
                    <textarea name="address" id="address" rows="3" class="w-full rounded-lg border-slate-200 text-sm focus:border-blue-500 focus:ring-blue-500">{{ old('address') }}</textarea>
                    @error('address')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Image -->
                <div class="md:col-span-2">
                    <label for="image" class="block text-sm font-medium text-slate-700 mb-1">Profile Image</label>
                    <input type="file" name="image" id="image" class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition-colors">
                    @error('image')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex items-center justify-end gap-3 pt-6 border-t border-slate-100">
                <button type="reset" class="px-4 py-2 text-sm font-medium text-slate-600 hover:bg-slate-50 rounded-lg transition-colors">Reset</button>
                <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg shadow-lg shadow-blue-500/30 transition-all">Create Developer</button>
            </div>
        </form>
    </div>
</x-admin-layout>