<x-developer-layout>
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Tasks</h1>
            <p class="text-slate-500">{{ $project->name }}</p>
        </div>
        <button id="createTaskBtn" class="flex items-center gap-2 rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-500 shadow-lg shadow-blue-500/30 transition-all">
            <i class="ri-add-line"></i>
            Create Task
        </button>
    </div>

    <div class="rounded-xl bg-white shadow-sm border border-slate-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-slate-600">
                <thead class="bg-slate-50 border-b border-slate-100 uppercase text-xs font-semibold text-slate-500">
                    <tr>
                        <th class="px-6 py-4">Title</th>
                        <th class="px-6 py-4">Description</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4">Priority</th>
                        <th class="px-6 py-4">Created At</th>
                        <th class="px-6 py-4">Updated At</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($project->tasks as $task)
                    <tr class="hover:bg-slate-50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="font-semibold text-slate-800">{{ $task->title }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-xs text-slate-500 truncate max-w-xs">{{ Str::limit($task->description, 50) }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-block px-2 py-1 rounded text-xs font-medium {{ $task->status->color() }}">
                                {{ $task->status->label() }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            @php
                            $priorityColors = [
                            'low' => 'bg-yellow-100 text-yellow-700',
                            'medium' => 'bg-blue-100 text-blue-700',
                            'high' => 'bg-green-100 text-green-700',
                            'urgent' => 'bg-red-100 text-red-700',
                            ];
                            $color = $priorityColors[$task->priority] ?? 'bg-gray-100 text-gray-700';
                            @endphp
                            <span class="inline-block px-2 py-1 rounded text-xs font-medium {{ $color }}">
                                {{ ucfirst(str_replace('_', ' ', $task->priority)) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-xs">
                            <div class="text-slate-900 font-medium">{{ $task->created_at->format('M d, Y') }}</div>
                            <div class="text-xs text-slate-500">{{ $task->created_at->diffForHumans() }}</div>
                        </td>
                        <td class="px-6 py-4 text-xs">
                            <div class="text-slate-900 font-medium">{{ $task->updated_at->format('M d, Y') }}</div>
                            <div class="text-xs text-slate-500">{{ $task->updated_at->diffForHumans() }}</div>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end gap-2">
                                <button class="p-2 rounded-lg text-slate-600 hover:bg-slate-100 hover:text-blue-600 transition-colors editTaskBtn"
                                    title="Edit"
                                    data-id="{{ $task->id }}"
                                    data-title="{{ $task->title }}"
                                    data-description="{{ $task->description }}"
                                    data-status="{{ $task->status }}"
                                    data-priority="{{ $task->priority }}">
                                    <i class="ri-pencil-line text-lg"></i> Edit
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-10 text-center text-slate-500">
                            <div class="flex flex-col items-center justify-center">
                                <i class="ri-folder-open-line text-4xl text-slate-300 mb-2"></i>
                                <p>No tasks found. Create one to get started!</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <!-- Create Task Modal -->
    <div id="createTaskModal" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <!-- Background overlay -->
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true" id="modalOverlay"></div>

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg w-full">
                <form action="{{ route('projects.tasks.store', $project->id) }}" method="POST">
                    @csrf
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-blue-100 sm:mx-0 sm:h-10 sm:w-10">
                                <i class="ri-task-line text-blue-600 text-lg"></i>
                            </div>
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Create New Task</h3>
                                <div class="mt-4 space-y-4">
                                    <div>
                                        <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                                        <input type="text" name="title" id="title" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm border p-2">
                                    </div>

                                    <div>
                                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                                        <textarea name="description" id="description" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm border p-2"></textarea>
                                    </div>

                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                                            <select name="status" id="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm border p-2">
                                                <option value="todo">To Do</option>
                                                <option value="in_progress">In Progress</option>
                                                <option value="completed">Completed</option>
                                            </select>
                                        </div>

                                        <div>
                                            <label for="priority" class="block text-sm font-medium text-gray-700">Priority</label>
                                            <select name="priority" id="priority" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm border p-2">
                                                <option value="low">Low</option>
                                                <option value="medium">Medium</option>
                                                <option value="high">High</option>
                                                <option value="urgent">Urgent</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                            Create Task
                        </button>
                        <button type="button" id="closeModal" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Task Modal -->
    <div id="editTaskModal" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <!-- Background overlay -->
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true" id="editModalOverlay"></div>

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg w-full">
                <form id="editTaskForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-blue-100 sm:mx-0 sm:h-10 sm:w-10">
                                <i class="ri-edit-line text-blue-600 text-lg"></i>
                            </div>
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Edit Task</h3>
                                <div class="mt-4 space-y-4">
                                    <div>
                                        <label for="edit_title" class="block text-sm font-medium text-gray-700">Title</label>
                                        <input type="text" name="title" id="edit_title" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm border p-2">
                                    </div>

                                    <div>
                                        <label for="edit_description" class="block text-sm font-medium text-gray-700">Description</label>
                                        <textarea name="description" id="edit_description" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm border p-2"></textarea>
                                    </div>

                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <label for="edit_status" class="block text-sm font-medium text-gray-700">Status</label>
                                            <select name="status" id="edit_status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm border p-2">
                                                <option value="todo">To Do</option>
                                                <option value="in_progress">In Progress</option>
                                                <option value="completed">Completed</option>
                                            </select>
                                        </div>

                                        <div>
                                            <label for="edit_priority" class="block text-sm font-medium text-gray-700">Priority</label>
                                            <select name="priority" id="edit_priority" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm border p-2">
                                                <option value="low">Low</option>
                                                <option value="medium">Medium</option>
                                                <option value="high">High</option>
                                                <option value="urgent">Urgent</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                            Update Task
                        </button>
                        <button type="button" id="closeEditModal" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        $(document).ready(function() {
            // Open Modal
            $('#createTaskBtn').click(function() {
                $('#createTaskModal').removeClass('hidden');
            });

            // Close Modal (Button)
            $('#closeModal').click(function() {
                $('#createTaskModal').addClass('hidden');
            });

            // Close Modal (Overlay)
            $('#modalOverlay').click(function() {
                $('#createTaskModal').addClass('hidden');
            });

            // Edit Modal Open
            $('.editTaskBtn').click(function() {
                let id = $(this).data('id');
                let title = $(this).data('title');
                let description = $(this).data('description');
                let status = $(this).data('status');
                let priority = $(this).data('priority');

                // Set form action
                let updateUrl = "{{ route('projects.tasks.update', [$project->id, ':id']) }}";
                updateUrl = updateUrl.replace(':id', id);
                $('#editTaskForm').attr('action', updateUrl);

                // Populate Inputs
                $('#edit_title').val(title);
                $('#edit_description').val(description);
                $('#edit_status').val(status);
                $('#edit_priority').val(priority);

                $('#editTaskModal').removeClass('hidden');
            });

            // Close Edit Modal
            $('#closeEditModal, #editModalOverlay').click(function() {
                $('#editTaskModal').addClass('hidden');
            });
        });
    </script>
    @endpush
</x-developer-layout>