<x-admin-layout>
    <!-- Page Title -->
    <div class="mb-8 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Tasks</h1>
            <p class="text-slate-500">Manage your daily tasks and priorities.</p>
        </div>
        <button id="create-task-btn"
            class="inline-flex items-center justify-center gap-2 rounded-lg bg-primary px-4 py-2 text-sm font-medium text-white hover:bg-primary/90 shadow-lg shadow-primary/30 transition-all">
            <i class="ri-add-line text-lg"></i>
            Create Task
        </button>
    </div>

    <!-- Tasks Table Card -->
    <div class="rounded-xl bg-white shadow-sm border border-slate-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-slate-600">
                <thead class="bg-slate-50 text-xs uppercase text-slate-500">
                    <tr>
                        <th class="px-6 py-4 font-semibold">Task Name</th>
                        <th class="px-6 py-4 font-semibold">Assigned To</th>
                        <th class="px-6 py-4 font-semibold">Due Date</th>
                        <th class="px-6 py-4 font-semibold">Priority</th>
                        <th class="px-6 py-4 font-semibold">Status</th>
                        <th class="px-6 py-4 font-semibold text-right">Actions</th>
                    </tr>
                </thead>
                <tbody id="tasks-table-body" class="divide-y divide-slate-100">
                    <!-- Rows will be populated by JS -->
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="flex items-center justify-between border-t border-slate-100 bg-slate-50 px-6 py-4">
            <div class="text-sm text-slate-500">
                Showing <span id="start-index" class="font-medium text-slate-700">0</span> to <span
                    id="end-index" class="font-medium text-slate-700">0</span> of <span id="total-items"
                    class="font-medium text-slate-700">0</span> results
            </div>
            <div class="flex gap-2">
                <button id="prev-page"
                    class="flex items-center justify-center rounded-lg border border-slate-200 bg-white px-3 py-1.5 text-sm font-medium text-slate-600 hover:bg-slate-50 hover:text-primary disabled:opacity-50 disabled:cursor-not-allowed transition-colors">
                    <i class="ri-arrow-left-s-line"></i>
                    <span class="ml-1 hidden sm:inline">Previous</span>
                </button>
                <button id="next-page"
                    class="flex items-center justify-center rounded-lg border border-slate-200 bg-white px-3 py-1.5 text-sm font-medium text-slate-600 hover:bg-slate-50 hover:text-primary disabled:opacity-50 disabled:cursor-not-allowed transition-colors">
                    <span class="mr-1 hidden sm:inline">Next</span>
                    <i class="ri-arrow-right-s-line"></i>
                </button>
            </div>
        </div>
    </div>


    <!-- Add/Edit Task Modal -->
    <div id="task-modal" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog"
        aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <!-- Background overlay -->
            <div class="fixed inset-0 bg-slate-900/75 transition-opacity" aria-hidden="true" id="modal-overlay"></div>

            <!-- This element is to trick the browser into centering the modal contents. -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <!-- Modal panel -->
            <div
                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                            <h3 class="text-lg leading-6 font-medium text-slate-900" id="modal-title">
                                Add New Task
                            </h3>
                            <div class="mt-4 space-y-4">
                                <input type="hidden" id="task-id">
                                <div>
                                    <label for="task-name" class="block text-sm font-medium text-slate-700">Task
                                        Name</label>
                                    <input type="text" id="task-name"
                                        class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-primary focus:ring focus:ring-primary/50 sm:text-sm border p-2"
                                        placeholder="Enter task name">
                                </div>
                                <div>
                                    <label for="task-assigned" class="block text-sm font-medium text-slate-700">Assigned
                                        To</label>
                                    <input type="text" id="task-assigned"
                                        class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-primary focus:ring focus:ring-primary/50 sm:text-sm border p-2"
                                        placeholder="Enter assignee name">
                                </div>
                                <div>
                                    <label for="task-date" class="block text-sm font-medium text-slate-700">Due
                                        Date</label>
                                    <input type="date" id="task-date"
                                        class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-primary focus:ring focus:ring-primary/50 sm:text-sm border p-2">
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label for="task-priority"
                                            class="block text-sm font-medium text-slate-700">Priority</label>
                                        <select id="task-priority"
                                            class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-primary focus:ring focus:ring-primary/50 sm:text-sm border p-2">
                                            <option value="Low">Low</option>
                                            <option value="Medium">Medium</option>
                                            <option value="High">High</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="task-status"
                                            class="block text-sm font-medium text-slate-700">Status</label>
                                        <select id="task-status"
                                            class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-primary focus:ring focus:ring-primary/50 sm:text-sm border p-2">
                                            <option value="To Do">To Do</option>
                                            <option value="In Progress">In Progress</option>
                                            <option value="Review">Review</option>
                                            <option value="Done">Done</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-slate-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="button" id="save-task-btn"
                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-primary text-base font-medium text-white hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary sm:ml-3 sm:w-auto sm:text-sm">
                        Save Task
                    </button>
                    <button type="button" id="cancel-modal-btn"
                        class="mt-3 w-full inline-flex justify-center rounded-md border border-slate-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-slate-700 hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="js/script.js"></script>
    <script src="js/tasks.js"></script>

</x-admin-layout>