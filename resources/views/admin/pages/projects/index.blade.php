<x-admin-layout>

    <!-- Page Title -->
    <div class="mb-8 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Projects</h1>
            <p class="text-slate-500">Manage your ongoing and completed projects.</p>
        </div>
        <a href="project-create.html"
            class="inline-flex items-center justify-center gap-2 rounded-lg bg-primary px-4 py-2 text-sm font-medium text-white hover:bg-primary/90 shadow-lg shadow-primary/30 transition-all">
            <i class="ri-add-line text-lg"></i>
            Create Project
        </a>
    </div>

    <!-- Projects Table Card -->
    <div class="rounded-xl bg-white shadow-sm border border-slate-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-slate-600">
                <thead class="bg-slate-50 text-xs uppercase text-slate-500">
                    <tr>
                        <th class="px-6 py-4 font-semibold">Project Name</th>
                        <th class="px-6 py-4 font-semibold">Client</th>
                        <th class="px-6 py-4 font-semibold">Deadline</th>
                        <th class="px-6 py-4 font-semibold">Budget</th>
                        <th class="px-6 py-4 font-semibold">Status</th>
                        <th class="px-6 py-4 font-semibold text-right">Actions</th>
                    </tr>
                </thead>
                <tbody id="projects-table-body" class="divide-y divide-slate-100">
                    <!-- Rows will be populated by JS -->
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="flex items-center justify-between border-t border-slate-100 bg-slate-50 px-6 py-4">
            <div class="text-sm text-slate-500">
                Showing <span id="start-index" class="font-medium text-slate-700">1</span> to <span
                    id="end-index" class="font-medium text-slate-700">10</span> of <span id="total-items"
                    class="font-medium text-slate-700">20</span> results
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

    <script src="js/projects.js"></script>
</x-admin-layout>