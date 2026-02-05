<x-developer-layout>
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Projects</h1>
            <p class="text-slate-500">Manage your projects here.</p>
        </div>
    </div>

    <div class="rounded-xl bg-white shadow-sm border border-slate-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-slate-600">
                <thead class="bg-slate-50 border-b border-slate-100 uppercase text-xs font-semibold text-slate-500">
                    <tr>
                        <th class="px-6 py-4">Name</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4">Timeline</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($projects as $project)
                    <tr class="hover:bg-slate-50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="font-semibold text-slate-800">{{ $project->project?->name ?? '' }}</div>
                            <div class="text-xs text-slate-500 truncate max-w-xs">{{ Str::limit($project->project?->description, 50) }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-block px-2 py-1 rounded text-xs font-medium {{ $project->project?->status->color() }}">
                                {{ $project->project?->status->label() }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-xs">
                            <div><span class="font-medium">Started:</span> {{ $project->project?->started_at ?? '' }}</div>
                            <div><span class="font-medium">Ends:</span> {{ $project->project?->ended_at ?? '' }}</div>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end gap-2">
                                <a href="{{ route('projects.tasks', $project->project_id) }}" class="p-2 rounded-lg text-slate-600 hover:bg-slate-100 hover:text-blue-600 transition-colors" title="View Tasks">
                                    <i class="ri-eye-line text-lg"></i> Tasks
                                </a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-10 text-center text-slate-500">
                            <div class="flex flex-col items-center justify-center">
                                <i class="ri-folder-open-line text-4xl text-slate-300 mb-2"></i>
                                <p>No projects found.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-developer-layout>