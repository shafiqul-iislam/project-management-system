<x-admin-layout>

    <!-- Breadcrumb -->
    <nav class="flex mb-8" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="index.html"
                    class="inline-flex items-center text-sm font-medium text-slate-700 hover:text-primary">
                    <i class="ri-home-line mr-2"></i>
                    Dashboard
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <i class="ri-arrow-right-s-line text-slate-400 mx-1"></i>
                    <a href="projects.html"
                        class="ml-1 text-sm font-medium text-slate-700 hover:text-primary md:ml-2">Projects</a>
                </div>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <i class="ri-arrow-right-s-line text-slate-400 mx-1"></i>
                    <span class="ml-1 text-sm font-medium text-slate-500 md:ml-2">Create New</span>
                </div>
            </li>
        </ol>
    </nav>

    <!-- Page Title -->
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-slate-800">Create New Project</h1>
        <p class="text-slate-500">Fill in the details to create a new project.</p>
    </div>

    <!-- Form Card -->
    <div class="rounded-xl bg-white p-6 shadow-sm border border-slate-100 max-w-3xl">
        <form id="create-project-form" class="space-y-6">
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                <!-- Project Name -->
                <div class="col-span-2">
                    <label for="project-name" class="block text-sm font-medium text-slate-700 mb-1">Project Name
                        <span class="text-red-500">*</span></label>
                    <input type="text" id="project-name" name="project-name" required
                        class="w-full rounded-lg border border-slate-300 px-3 py-2 text-slate-700 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary transition-colors"
                        placeholder="e.g. Website Redesign">
                </div>

                <!-- Client Name -->
                <div>
                    <label for="client-name" class="block text-sm font-medium text-slate-700 mb-1">Client Name
                        <span class="text-red-500">*</span></label>
                    <input type="text" id="client-name" name="client-name" required
                        class="w-full rounded-lg border border-slate-300 px-3 py-2 text-slate-700 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary transition-colors"
                        placeholder="e.g. Acme Corp">
                </div>

                <!-- Budget -->
                <div>
                    <label for="budget" class="block text-sm font-medium text-slate-700 mb-1">Budget</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-slate-500">$</span>
                        <input type="number" id="budget" name="budget"
                            class="w-full rounded-lg border border-slate-300 pl-8 pr-3 py-2 text-slate-700 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary transition-colors"
                            placeholder="0.00">
                    </div>
                </div>

                <!-- Start Date -->
                <div>
                    <label for="start-date" class="block text-sm font-medium text-slate-700 mb-1">Start
                        Date</label>
                    <input type="date" id="start-date" name="start-date"
                        class="w-full rounded-lg border border-slate-300 px-3 py-2 text-slate-700 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary transition-colors">
                </div>

                <!-- Deadline -->
                <div>
                    <label for="deadline" class="block text-sm font-medium text-slate-700 mb-1">Deadline <span
                            class="text-red-500">*</span></label>
                    <input type="date" id="deadline" name="deadline" required
                        class="w-full rounded-lg border border-slate-300 px-3 py-2 text-slate-700 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary transition-colors">
                </div>

                <!-- Status -->
                <div class="col-span-2 md:col-span-1">
                    <label for="status" class="block text-sm font-medium text-slate-700 mb-1">Status</label>
                    <select id="status" name="status"
                        class="w-full rounded-lg border border-slate-300 px-3 py-2 text-slate-700 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary transition-colors">
                        <option value="Active">Active</option>
                        <option value="Pending">Pending</option>
                        <option value="Completed">Completed</option>
                        <option value="On Hold">On Hold</option>
                    </select>
                </div>

                <!-- Description -->
                <div class="col-span-2">
                    <label for="description"
                        class="block text-sm font-medium text-slate-700 mb-1">Description</label>
                    <textarea id="description" name="description" rows="4"
                        class="w-full rounded-lg border border-slate-300 px-3 py-2 text-slate-700 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary transition-colors"
                        placeholder="Project details..."></textarea>
                </div>
            </div>

            <div class="flex items-center justify-end gap-4 pt-4 border-t border-slate-100 mt-6">
                <a href="projects.html"
                    class="px-4 py-2 text-sm font-medium text-slate-600 hover:text-slate-800 transition-colors">Cancel</a>
                <button type="submit"
                    class="rounded-lg bg-primary px-6 py-2 text-sm font-medium text-white hover:bg-primary/90 shadow-md shadow-primary/20 transition-all">
                    Create Project
                </button>
            </div>
        </form>
    </div>
    <script>
        // Simple form handling for demo
        $('#create-project-form').submit(function(e) {
            e.preventDefault();
            alert('Project created successfully! (Mock Action)');
            window.location.href = 'projects.html';
        });
    </script>

</x-admin-layout>