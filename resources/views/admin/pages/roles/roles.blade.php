<x-admin-layout>

    <!-- Page Title -->
    <div class="mb-8 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Roles & Permissions</h1>
            <p class="text-slate-500">Manage user roles and assign access rights.</p>
        </div>
        <a href="{{ route('admin.roles.create') }}"
            class="inline-flex items-center justify-center gap-2 rounded-lg bg-primary px-4 py-2 text-sm font-medium text-white hover:bg-primary/90 shadow-lg shadow-primary/30 transition-all">
            <i class="ri-add-line text-lg"></i>
            Add New Role
        </a>
    </div>

    @if(session('success'))
    <div class="mb-6 p-4 bg-emerald-50 text-emerald-600 rounded-xl border border-emerald-100 flex items-center gap-2">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
        </svg>
        {{ session('success') }}
    </div>
    @endif

    <!-- Cards -->
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5">

        @foreach($roles as $role)
        <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm hover:shadow-md transition">
            <div class="flex justify-between mb-6">
                <!-- Icon based on role type -->
                @php
                $colors = [
                'admin' => 'bg-indigo-100 text-indigo-600',
                'staff' => 'bg-purple-100 text-purple-600',
                'project_manager' => 'bg-blue-100 text-blue-600',
                ];
                $colorClass = $colors[$role->role_type] ?? 'bg-gray-100 text-gray-600';
                @endphp
                <div class="w-14 h-14 {{ $colorClass }} flex items-center justify-center rounded-xl">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        @if($role->role_type == 'admin')
                        <path d="M12 11.5c.828 0 1.5-.672 1.5-1.5S12.828 8.5 12 8.5 10.5 9.172 10.5 10s.672 1.5 1.5 1.5Z" />
                        <path d="M12 6c2.21 0 4 1.567 4 3.5a3.4 3.4 0 0 1-1.12 2.49c-.46.43-.88.85-.88 1.51v.25" />
                        <path d="M19 21H5v-.75C5 17.455 8.582 15 12 15s7 2.455 7 5.25V21Z" />
                        @elseif($role->role_type == 'project_manager')
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
                        @else
                        <circle cx="12" cy="8" r="4" />
                        <path d="M6 20v-.75C6 16.455 8.582 14 12 14s6 2.455 6 5.25V20" />
                        @endif
                    </svg>
                </div>

                <div class="flex gap-3 text-gray-400">
                    <a href="{{ route('admin.roles.edit', $role->id) }}" class="hover:text-indigo-600 transition">
                        <svg width="22" height="22">
                            <use href="#edit" />
                        </svg>
                    </a>
                    <form action="{{ route('admin.roles.destroy', $role->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="hover:text-red-600 transition">
                            <svg width="22" height="22">
                                <use href="#trash" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>

            <h3 class="text-lg font-bold text-gray-900">{{ $role->name }}</h3>
            <p class="text-sm text-gray-600 mt-1 line-clamp-2 min-h-[40px]">{{ $role->description ?? 'No description provided.' }}</p>

            <!-- Placeholder for Users count if needed -->
            {{--
             <div class="flex items-center mt-6 -space-x-2">
                 <span class="w-8 h-8 bg-emerald-500 text-white rounded-full flex items-center justify-center text-xs font-bold">U1</span>
                 <span class="px-1.5 py-1 bg-gray-200 rounded-full text-xs font-bold">+{{ $role->users()->count() }}</span>
        </div>
        --}}

        <div class="mt-6 pt-4 border-t border-gray-100">
            <a href="{{ route('admin.roles.edit', $role->id) }}" class="text-primary text-sm font-semibold hover:underline cursor-pointer flex items-center gap-1">
                Manage Permissions <span class="text-lg">&rarr;</span>
            </a>
        </div>
    </div>
    @endforeach

    <!-- Add Role Card (Visual Link) -->
    <a href="{{ route('admin.roles.create') }}" class="border-2 border-dashed border-indigo-300 bg-indigo-50 rounded-2xl p-8 flex flex-col justify-center items-center hover:bg-indigo-100 transition cursor-pointer group h-full min-h-[250px]">
        <div class="w-16 h-16 bg-white soft-shadow text-indigo-600 flex items-center justify-center rounded-xl text-4xl group-hover:scale-110 transition-transform">
            +
        </div>
        <h3 class="mt-4 text-base font-bold text-gray-900">Add New Role</h3>
        <p class="text-sm text-gray-500 mt-1 text-center">Create a custom role & assign permissions</p>
    </a>
    </div>

    <!-- Icons Definitions -->
    <svg style="display:none">
        <symbol id="edit" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" fill="none">
            <path d="M16.862 3.487a2.25 2.25 0 1 1 3.182 3.183L7.125 19.59a4.5 4.5 0 0 1-1.86 1.133l-3.07.884.884-3.07a4.5 4.5 0 0 1 1.133-1.859L16.862 3.487Z" />
        </symbol>
        <symbol id="trash" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" fill="none">
            <path d="M3 6h18M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2M10 11v6M14 11v6" />
        </symbol>
    </svg>
</x-admin-layout>