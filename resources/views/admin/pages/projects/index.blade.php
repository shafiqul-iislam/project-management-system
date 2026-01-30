<x-admin-layout>
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Projects</h1>
            <p class="text-slate-500">Manage your projects here.</p>
        </div>
        <a href="{{ route('admin.projects.create') }}" class="flex items-center gap-2 rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-500 shadow-lg shadow-blue-500/30 transition-all">
            <i class="ri-add-line"></i>
            Create Project
        </a>
    </div>

    <div class="rounded-xl bg-white shadow-sm border border-slate-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-slate-600">
                <thead class="bg-slate-50 border-b border-slate-100 uppercase text-xs font-semibold text-slate-500">
                    <tr>
                        <th class="px-6 py-4">Name</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4">Timeline</th>
                        <th class="px-6 py-4">Assigned To</th>
                        <th class="px-6 py-4">Created By</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($projects as $project)
                    <tr class="hover:bg-slate-50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="font-semibold text-slate-800">{{ $project->name }}</div>
                            <div class="text-xs text-slate-500 truncate max-w-xs">{{ Str::limit($project->description, 50) }}</div>
                        </td>
                        <td class="px-6 py-4">
                            @php
                            $statusColors = [
                            'pending' => 'bg-yellow-100 text-yellow-700',
                            'in_progress' => 'bg-blue-100 text-blue-700',
                            'completed' => 'bg-green-100 text-green-700',
                            'active' => 'bg-emerald-100 text-emerald-700',
                            ];
                            $color = $statusColors[$project->status] ?? 'bg-gray-100 text-gray-700';
                            @endphp
                            <span class="inline-block px-2 py-1 rounded text-xs font-medium {{ $color }}">
                                {{ ucfirst(str_replace('_', ' ', $project->status)) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-xs">
                            <div><span class="font-medium">Started:</span> {{ $project->started_at }}</div>
                            <div><span class="font-medium">Ends:</span> {{ $project->ended_at }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex flex-wrap gap-1">
                                @forelse($project->developers as $developer)
                                    <span class="inline-flex items-center rounded-md bg-slate-50 px-2 py-1 text-xs font-medium text-slate-600 ring-1 ring-inset ring-slate-200/50">
                                        {{ $developer->name }}
                                    </span>
                                @empty
                                    <span class="text-xs text-slate-400 italic">Unassigned</span>
                                @endforelse
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            {{ $project->created_by_username ?? 'Unknown' }}
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end gap-2">
                                <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">
                                    <a href="{{ route('admin.projects.edit', $project) }}" class="p-2 rounded-lg text-slate-600 hover:bg-slate-100 hover:text-blue-600 transition-colors" title="Edit">
                                        <i class="ri-pencil-line text-lg"></i>
                                    </a>
                                    <a href="{{ route('admin.project.assign-to', $project->id) }}" class="p-2 rounded-lg text-slate-600 hover:bg-slate-100 hover:text-blue-600 transition-colors" title="Assign">
                                        <i class="ri-user-add-line text-lg"></i>
                                    </a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 delete_btn rounded-lg text-slate-600 hover:bg-red-50 hover:text-red-600 transition-colors" title="Delete">
                                        <i class="ri-delete-bin-line text-lg"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-10 text-center text-slate-500">
                            <div class="flex flex-col items-center justify-center">
                                <i class="ri-folder-open-line text-4xl text-slate-300 mb-2"></i>
                                <p>No projects found. Create one to get started!</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- @push('scripts') -->
    @vite('resources/js/projects.js')
    <!-- @endpush -->
</x-admin-layout>