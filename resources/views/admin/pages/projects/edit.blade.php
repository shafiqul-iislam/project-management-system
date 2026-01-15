<x-admin-layout>
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Edit Project</h1>
            <p class="text-slate-500">Update project details: {{ $project->name }}</p>
        </div>
        <a href="{{ route('admin.projects.index') }}" class="flex items-center gap-2 rounded-lg bg-white border border-slate-200 px-4 py-2 text-sm font-medium text-slate-600 hover:bg-slate-50 transition-all">
            <i class="ri-arrow-left-line"></i>
            Back to List
        </a>
    </div>

    <div class="max-w-4xl mx-auto rounded-xl bg-white p-8 shadow-sm border border-slate-100">
        <form action="{{ route('admin.projects.update', $project) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

                <!-- Name -->
                <div class="col-span-2">
                    <label for="name" class="block text-sm font-medium text-slate-700 mb-1">Project Name <span class="text-red-500">*</span></label>
                    <input type="text" name="name" id="name" value="{{ old('name', $project->name) }}" class="w-full rounded-lg border-gray-300 text-sm focus:border-blue-500 focus:ring-blue-500 py-2 px-3" required>
                    @error('name')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Status -->
                <div>
                    <label for="status" class="block text-sm font-medium text-slate-700 mb-1">Status <span class="text-red-500">*</span></label>
                    <select name="status" id="status" class="w-full rounded-lg border-slate-200 text-sm focus:border-blue-500 focus:ring-blue-500 py-2 px-3" required>
                        <option value="pending" {{ old('status', $project->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="in_progress" {{ old('status', $project->status) == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                        <option value="active" {{ old('status', $project->status) == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="completed" {{ old('status', $project->status) == 'completed' ? 'selected' : '' }}>Completed</option>
                    </select>
                    @error('status')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div class="col-span-2">
                    <label for="description" class="block text-sm font-medium text-slate-700 mb-1">Description <span class="text-red-500">*</span></label>
                    <textarea name="description" id="description" rows="4" class="w-full rounded-lg border-slate-200 text-sm focus:border-blue-500 focus:ring-blue-500 py-2 px-3" required>{{ old('description', $project->description) }}</textarea>
                    @error('description')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Dates -->
                <div>
                    <label for="started_at" class="block text-sm font-medium text-slate-700 mb-1">Start Date</label>
                    <input type="date" name="started_at" id="started_at" value="{{ $project->started_at }}" class="w-full rounded-lg border-slate-200 text-sm focus:border-blue-500 focus:ring-blue-500 py-2 px-3">
                    @error('started_at')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="ended_at" class="block text-sm font-medium text-slate-700 mb-1">Deadline / End Date</label>
                    <input type="date" name="ended_at" id="ended_at" value="{{ $project->ended_at }}" class="w-full rounded-lg border-slate-200 text-sm focus:border-blue-500 focus:ring-blue-500 py-2 px-3">
                    @error('ended_at')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="finished_at" class="block text-sm font-medium text-slate-700 mb-1">Finished Date</label>
                    <input type="date" name="finished_at" id="finished_at" value="{{$project->finished_at}}" class="w-full rounded-lg border-slate-200 text-sm focus:border-blue-500 focus:ring-blue-500 py-2 px-3">
                    @error('finished_at')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mt-8 flex justify-end gap-3">
                <a href="{{ route('admin.projects.index') }}" class="rounded-lg border border-slate-200 px-6 py-2.5 text-sm font-medium text-slate-600 hover:bg-slate-50 transition-colors">Cancel</a>
                <button type="submit" class="rounded-lg bg-blue-600 px-6 py-2.5 text-sm font-medium text-white hover:bg-blue-500 shadow-lg shadow-blue-500/30 transition-all">Update Project</button>
            </div>
        </form>
    </div>
</x-admin-layout>