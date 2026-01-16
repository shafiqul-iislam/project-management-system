<x-admin-layout>
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Developer Details</h1>
            <p class="text-slate-500">View developer information.</p>
        </div>
        <div class="flex items-center gap-2">
            <a href="{{ route('admin.developers.index') }}" class="flex items-center gap-2 rounded-lg bg-white border border-slate-200 px-4 py-2 text-sm font-medium text-slate-600 hover:bg-slate-50 hover:text-slate-800 transition-all">
                <i class="ri-arrow-left-line"></i>
                Back to List
            </a>
            <a href="{{ route('admin.developers.edit', $developer->id) }}" class="flex items-center gap-2 rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700 shadow-lg shadow-blue-500/30 transition-all">
                <i class="ri-pencil-line"></i>
                Edit
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Sidebar / Profile Card -->
        <div class="md:col-span-1">
            <div class="rounded-xl bg-white shadow-sm border border-slate-100 p-6 text-center">
                @if ($developer->image)
                <img src="{{ asset('storage/' . $developer->image) }}" alt="{{ $developer->name }}" class="h-32 w-32 rounded-full object-cover border-4 border-slate-50 mx-auto mb-4">
                @else
                <div class="h-32 w-32 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-bold text-4xl mx-auto mb-4">
                    {{ substr($developer->name, 0, 1) }}
                </div>
                @endif
                <h2 class="text-xl font-bold text-slate-800">{{ $developer->name }}</h2>
                <p class="text-slate-500 mb-2">{{ $developer->designation ?? 'Developer' }}</p>

                @if($developer->status === 'active')
                <span class="inline-flex items-center gap-1 rounded-full bg-green-50 px-3 py-1 text-sm font-medium text-green-700">
                    <span class="h-1.5 w-1.5 rounded-full bg-green-500"></span>
                    Active
                </span>
                @else
                <span class="inline-flex items-center gap-1 rounded-full bg-red-50 px-3 py-1 text-sm font-medium text-red-700">
                    <span class="h-1.5 w-1.5 rounded-full bg-red-500"></span>
                    Inactive
                </span>
                @endif

                <div class="mt-6 pt-6 border-t border-slate-100 text-left">
                    <div class="flex items-center gap-3 mb-3 text-slate-600">
                        <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-slate-50">
                            <i class="ri-mail-line text-slate-400"></i>
                        </div>
                        <span class="text-sm truncate" title="{{ $developer->email }}">{{ $developer->email }}</span>
                    </div>
                    <div class="flex items-center gap-3 mb-3 text-slate-600">
                        <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-slate-50">
                            <i class="ri-phone-line text-slate-400"></i>
                        </div>
                        <span class="text-sm">{{ $developer->phone }}</span>
                    </div>
                    <div class="flex items-center gap-3 text-slate-600">
                        <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-slate-50">
                            <i class="ri-map-pin-line text-slate-400"></i>
                        </div>
                        <span class="text-sm">{{ $developer->address ?? 'No address provided' }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="md:col-span-2 space-y-6">
            <div class="rounded-xl bg-white shadow-sm border border-slate-100 p-6">
                <h3 class="text-lg font-bold text-slate-800 mb-4">Account Information</h3>
                <dl class="grid grid-cols-1 sm:grid-cols-2 gap-x-4 gap-y-6">
                    <div>
                        <dt class="text-xs font-medium uppercase text-slate-500 mb-1">Username</dt>
                        <dd class="text-sm font-medium text-slate-800">{{ $developer->username }}</dd>
                    </div>
                    <div>
                        <dt class="text-xs font-medium uppercase text-slate-500 mb-1">Joined On</dt>
                        <dd class="text-sm font-medium text-slate-800">{{ $developer->created_at->format('M d, Y') }}</dd>
                    </div>
                    <div>
                        <dt class="text-xs font-medium uppercase text-slate-500 mb-1">Last Updated</dt>
                        <dd class="text-sm font-medium text-slate-800">{{ $developer->updated_at->format('M d, Y') }}</dd>
                    </div>
                </dl>
            </div>

            <!-- Future: Projects Section -->
            <div class="rounded-xl bg-white shadow-sm border border-slate-100 p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-bold text-slate-800">Projects</h3>
                    <!-- Placeholder -->
                    <span class="text-xs text-slate-500 font-medium bg-slate-100 px-2 py-1 rounded">Coming Soon</span>
                </div>
                <div class="text-center py-8 bg-slate-50 rounded-lg border border-dashed border-slate-200">
                    <i class="ri-folder-open-line text-4xl text-slate-300 mb-2"></i>
                    <p class="text-slate-500 text-sm">No projects assigned yet.</p>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>