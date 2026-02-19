<x-admin-layout>
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Developers</h1>
            <p class="text-slate-500">Manage your development team.</p>
        </div>
        <a href="{{ route('admin.developers.create') }}" class="flex items-center gap-2 rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700 shadow-lg shadow-blue-500/30 transition-all">
            <i class="ri-add-line"></i>
            Add Developer
        </a>
    </div>

    <div class="rounded-xl bg-white shadow-sm border border-slate-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-slate-600">
                <thead class="bg-slate-50 text-xs uppercase text-slate-500">
                    <tr>
                        <th class="px-6 py-4 font-semibold">Name / Designation</th>
                        <th class="px-6 py-4 font-semibold">Contact Info</th>
                        <th class="px-6 py-4 font-semibold">Status</th>
                        <th class="px-6 py-4 font-semibold text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($developers as $developer)
                    <tr class="hover:bg-slate-50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                @if ($developer->image)
                                <img src="{{ asset('storage/' . $developer->image) }}" alt="{{ $developer->name }}" class="h-10 w-10 rounded-full object-cover border border-slate-200">
                                @else
                                <div class="h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-bold">
                                    {{ substr($developer->name, 0, 1) }}
                                </div>
                                @endif
                                <div>
                                    <div class="font-semibold text-slate-800">{{ $developer->name }}</div>
                                    <div class="text-xs text-slate-500">{{ $developer->designation ?? 'N/A' }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex flex-col gap-1">
                                <div class="flex items-center gap-2">
                                    <i class="ri-mail-line text-slate-400"></i>
                                    <span>{{ $developer->email }}</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <i class="ri-phone-line text-slate-400"></i>
                                    <span>{{ $developer->phone }}</span>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            @if($developer->status === 'active')
                            <span class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2.5 py-0.5 text-xs font-medium text-green-700">
                                <span class="h-1.5 w-1.5 rounded-full bg-green-500"></span>
                                Active
                            </span>
                            @else
                            <span class="inline-flex items-center gap-1 rounded-full bg-red-50 px-2.5 py-0.5 text-xs font-medium text-red-700">
                                <span class="h-1.5 w-1.5 rounded-full bg-red-500"></span>
                                Inactive
                            </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.developers.edit', $developer->id) }}" class="rounded-lg p-2 text-blue-600 hover:bg-blue-50 transition-colors" title="Edit">
                                    <i class="ri-pencil-line text-lg"></i>
                                </a>
                                <form action="{{ route('admin.developers.destroy', $developer->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete_btn rounded-lg p-2 text-red-600 hover:bg-red-50 transition-colors" title="Delete">
                                        <i class="ri-delete-bin-line text-lg"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-8 text-center text-slate-500">
                            <div class="flex flex-col items-center justify-center">
                                <div class="mb-3 rounded-full bg-slate-50 p-4">
                                    <i class="ri-user-unfollow-line text-2xl text-slate-400"></i>
                                </div>
                                <p class="font-medium">No developers found</p>
                                <p class="text-sm">Get started by adding a new developer to your team.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($developers->hasPages())
        <div class="border-t border-slate-100 px-6 py-4">
            {{ $developers->links() }}
        </div>
        @endif
    </div>
</x-admin-layout>