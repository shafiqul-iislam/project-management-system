<x-admin-layout>
    <div class="max-w-7xl mx-auto px-6 py-10">
        <!-- Title & Back Button -->
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-2xl font-bold text-slate-800">Create New Role</h1>
                <p class="text-sm text-slate-500 mt-1">Define role details and assign permissions.</p>
            </div>
            <a href="{{ route('admin.roles.index') }}"
                class="px-4 py-2 bg-white text-slate-700 font-medium rounded-lg border border-slate-200 hover:bg-slate-50 transition">
                Back to Roles
            </a>
        </div>

        <form action="{{ route('admin.roles.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Role Details -->
                <div class="lg:col-span-1 space-y-6">
                    <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-200">
                        <h2 class="text-lg font-semibold text-slate-800 mb-4">Role Details</h2>

                        <!-- Name -->
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-slate-700 mb-1">Role Name</label>
                            <input type="text" name="name" id="name" required
                                class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none transition"
                                placeholder="e.g. Super Admin">
                            @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <!-- Type -->
                        <div class="mb-4">
                            <label for="role_type" class="block text-sm font-medium text-slate-700 mb-1">Role Type</label>
                            <select name="role_type" id="role_type" required
                                class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none transition">
                                <option value="admin">Admin</option>
                                <option value="staff">Staff</option>
                                <option value="project_manager">Project Manager</option>
                            </select>
                            @error('role_type') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <!-- Description -->
                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-slate-700 mb-1">Description</label>
                            <textarea name="description" id="description" rows="4"
                                class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary outline-none transition"
                                placeholder="Describe the role..."></textarea>
                            @error('description') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <button type="submit"
                            class="w-full px-4 py-2 bg-primary text-white font-medium rounded-lg hover:bg-primary/90 transition shadow-lg shadow-primary/30">
                            Create Role
                        </button>
                    </div>
                </div>

                <!-- Permissions -->
                <div class="lg:col-span-2">
                    <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-200">
                        <h2 class="text-lg font-semibold text-slate-800 mb-4">Permissions</h2>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @foreach($permissions as $group => $perms)
                            <div class="border border-slate-200 rounded-lg p-4">
                                <h3 class="text-sm font-semibold text-slate-700 mb-3 capitalize">{{ $group }}</h3>
                                <ul class="space-y-2">
                                    @foreach($perms as $key => $label)
                                    <li class="flex items-center gap-3">
                                        <input type="checkbox" name="permissions[]" value="{{ $key }}" id="perm_{{ $key }}"
                                            class="w-4 h-4 text-primary rounded border-slate-300 focus:ring-primary">
                                        <label for="perm_{{ $key }}" class="text-sm text-slate-600 select-none cursor-pointer">{{ $label }}</label>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-admin-layout>