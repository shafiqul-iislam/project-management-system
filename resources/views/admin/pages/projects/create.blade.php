<x-admin-layout>
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Create Project</h1>
            <p class="text-slate-500">Start a new project management journey.</p>
        </div>
        <a href="{{ route('admin.projects.index') }}" class="flex items-center gap-2 rounded-lg bg-white border border-slate-200 px-4 py-2 text-sm font-medium text-slate-600 hover:bg-slate-50 transition-all">
            <i class="ri-arrow-left-line"></i>
            Back to List
        </a>
    </div>

    <div class="max-w-4xl mx-auto rounded-xl bg-white p-8 shadow-sm border border-slate-100">
        <form action="{{ route('admin.projects.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                <!-- Name -->
                <div class="col-span-2">
                    <label for="name" class="block text-sm font-medium text-slate-700 mb-1">Project Name <span class="text-red-500">*</span></label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" class="w-full rounded-lg border-slate-200 text-sm focus:border-blue-500 focus:ring-blue-500 py-2 px-3 border border-slate-200" placeholder="e.g. Website Redesign" required>
                    @error('name')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Status -->
                <div>
                    <label for="status" class="block text-sm font-medium text-slate-700 mb-1">Status <span class="text-red-500">*</span></label>
                    <select name="status" id="status" class="w-full rounded-lg border-slate-200 text-sm focus:border-blue-500 focus:ring-blue-500 py-2 px-3 border border-slate-200" required>
                        <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="in_progress" {{ old('status') == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                        <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                    </select>
                    @error('status')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- assigned to
                <div>
                    <label for="assigned_to" class="block text-sm font-medium text-slate-700 mb-1">Assigned To <span class="text-red-500">*</span></label>
                    <select name="assigned_to" id="assigned_to" class="w-full rounded-lg border-slate-200 text-sm focus:border-blue-500 focus:ring-blue-500 py-2 px-3 border border-slate-200" required>
                        <option value="">Select Developer</option>

                        @if($developers->count() > 0)
                        @foreach($developers as $developer)
                        <option value="{{ $developer->id }}" {{ old('assigned_to') == $developer->id ? 'selected' : '' }}>{{ $developer->name }}</option>
                        @endforeach
                        @endif
                    </select>
                    @error('assigned_to')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div> -->

                <!-- Description -->
                <div class="col-span-2">
                    <label for="description" class="block text-sm font-medium text-slate-700 mb-1">Description <span class="text-red-500">*</span></label>
                    <textarea name="description" id="description" rows="4" class="w-full rounded-lg border-slate-200 text-sm focus:border-blue-500 focus:ring-blue-500 py-2 px-3 border border-slate-200" placeholder="Describe the project..." required>{{ old('description') }}</textarea>
                    @error('description')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Dates -->
                <div>
                    <label for="started_at" class="block text-sm font-medium text-slate-700 mb-1">Start Date</label>
                    <input type="date" name="started_at" id="started_at" value="{{ old('started_at') }}" class="w-full rounded-lg border-slate-200 text-sm focus:border-blue-500 focus:ring-blue-500 py-2 px-3 border border-slate-200">
                    @error('started_at')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="ended_at" class="block text-sm font-medium text-slate-700 mb-1">Deadline / End Date</label>
                    <input type="date" name="ended_at" id="ended_at" value="{{ old('ended_at') }}" class="w-full rounded-lg border-slate-200 text-sm focus:border-blue-500 focus:ring-blue-500 py-2 px-3 border border-slate-200">
                    @error('ended_at')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mt-8 flex justify-end gap-3">
                <a href="{{ route('admin.projects.index') }}" class="rounded-lg border border-slate-200 px-6 py-2.5 text-sm font-medium text-slate-600 hover:bg-slate-50 transition-colors">Cancel</a>
                <button type="submit" class="rounded-lg bg-blue-600 px-6 py-2.5 text-sm font-medium text-white hover:bg-blue-500 shadow-lg shadow-blue-500/30 transition-all">Create Project</button>
            </div>
        </form>
    </div>
</x-admin-layout>