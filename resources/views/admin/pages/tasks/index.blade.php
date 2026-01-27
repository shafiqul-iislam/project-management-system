<x-admin-layout>
    <div class="max-w-7xl mx-auto px-6 py-10">

        <!-- Page Title -->
        <div class="mb-8">
            <h1 class="text-2xl font-bold text-slate-800">Tasks</h1>
            <p class="text-slate-500 mt-1">Overview of all tasks across projects.</p>
        </div>

        <!-- Tasks Table -->
        <div class="bg-white border border-slate-200 rounded-xl shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-slate-600">
                    <thead class="bg-slate-50 border-b border-slate-200">
                        <tr>
                            <th class="px-6 py-4 font-semibold text-slate-700">Task Title</th>
                            <th class="px-6 py-4 font-semibold text-slate-700">Project</th>
                            <th class="px-6 py-4 font-semibold text-slate-700">Priority</th>
                            <th class="px-6 py-4 font-semibold text-slate-700">Status</th>
                            <th class="px-6 py-4 font-semibold text-slate-700">Deadline</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($tasks as $task)
                        <tr class="hover:bg-slate-50 transition">
                            <td class="px-6 py-4 font-medium text-slate-900">
                                {{ $task->title }}
                            </td>
                            <td class="px-6 py-4">
                                @if($task->project)
                                <span class="text-primary font-medium">{{ $task->project->name }}</span>
                                @else
                                <span class="text-slate-400 italic">No Project</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                    {{ $task->priority == 'high' ? 'bg-red-100 text-red-700' : '' }}
                                    {{ $task->priority == 'medium' ? 'bg-orange-100 text-orange-700' : '' }}
                                    {{ $task->priority == 'low' ? 'bg-emerald-100 text-emerald-700' : '' }}">
                                    {{ ucfirst($task->priority) }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                @php
                                $statusColors = [
                                'todo' => 'bg-slate-100 text-slate-600',
                                'in_progress' => 'bg-blue-100 text-blue-700',
                                'completed' => 'bg-emerald-100 text-emerald-700',
                                'cancelled' => 'bg-red-100 text-red-700',
                                ];
                                @endphp
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $statusColors[$task->status] ?? 'bg-gray-100 text-gray-600' }}">
                                    {{ str_replace('_', ' ', ucfirst($task->status)) }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                @if($task->deadline)
                                <div class="flex items-center gap-1 {{ $task->deadline->isPast() && $task->status !== 'completed' ? 'text-red-600 font-medium' : 'text-slate-600' }}">
                                    @if($task->deadline->isPast() && $task->status !== 'completed')
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    @endif
                                    {{ $task->deadline->format('M d, Y') }}
                                </div>
                                @else
                                <span class="text-slate-400">-</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-6 py-10 text-center text-slate-500">
                                No tasks found.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin-layout>