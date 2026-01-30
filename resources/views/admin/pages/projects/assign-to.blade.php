<x-admin-layout>
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Assign Project: {{ $project->name }}</h1>
            <p class="text-slate-500">Manage developer assignments for this project.</p>
        </div>
        <a href="{{ route('admin.projects.index') }}" class="flex items-center gap-2 rounded-lg bg-white border border-slate-200 px-4 py-2 text-sm font-medium text-slate-600 hover:bg-slate-50 transition-all">
            <i class="ri-arrow-left-line"></i>
            Back to List
        </a>
    </div>

    <div class="max-w-4xl mx-auto rounded-xl bg-white p-8 shadow-sm border border-slate-100">
        <form action="{{ route('admin.project.assign-to.store', $project->id) }}" method="POST">
            @csrf

            @if ($errors->any())
            <div class="mb-6 rounded-lg bg-red-50 p-4 border border-red-100">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <i class="ri-error-warning-fill text-red-500 text-lg"></i>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-red-800">There were errors with your submission</h3>
                        <div class="mt-2 text-sm text-red-700">
                            <ul role="list" class="list-disc pl-5 space-y-1">
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <div class="grid grid-cols-1 gap-6">
                <!-- Project Title -->
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Project Title</label>
                    <input type="text" value="{{ $project->name }}" class="w-full rounded-lg border-slate-200 bg-slate-50 text-slate-500 cursor-not-allowed py-2 px-3 border" disabled>
                </div>

                <label class="block text-sm font-medium text-slate-700 mb-3">Assign Developers <span class="text-red-500">*</span></label>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach($developers as $developer)
                    <label class="relative flex cursor-pointer rounded-lg border bg-white p-4 shadow-sm focus:outline-none">
                        <input type="checkbox" name="developer_ids[]" value="{{ $developer->id }}" class="sr-only peer"
                            @if(in_array($developer->id, old('developer_ids', $project->developers->pluck('id')->toArray()))) checked @endif>
                        <span class="flex flex-1">
                            <span class="flex flex-col">
                                <span class="block text-sm font-medium text-slate-900 peer-checked:text-blue-600">
                                    {{ $developer->name }}
                                </span>
                                <span class="mt-1 flex items-center text-xs text-slate-500">
                                    {{ $developer->designation ?? 'N/A' }}
                                </span>
                            </span>
                        </span>
                        <!-- Checkmark icon for selected state -->
                        <i class="ri-checkbox-circle-fill text-2xl text-blue-600 opacity-0 peer-checked:opacity-100 transition-opacity absolute top-4 right-4"></i>
                        <!-- Border highlight for selected state -->
                        <span class="pointer-events-none absolute inset-0 rounded-lg border-2 border-transparent peer-checked:border-blue-600 transition-all" aria-hidden="true"></span>
                    </label>
                    @endforeach
                </div>
                @if($developers->isEmpty())
                <div class="text-sm text-slate-500 italic p-4 border border-dashed border-slate-300 rounded-lg text-center">
                    No developers found to assign.
                </div>
                @endif
            </div>

            <div class="mt-8 flex justify-end gap-3">
                <a href="{{ route('admin.projects.index') }}" class="rounded-lg border border-slate-200 px-6 py-2.5 text-sm font-medium text-slate-600 hover:bg-slate-50 transition-colors">Cancel</a>
                <button type="submit" class="rounded-lg bg-blue-600 px-6 py-2.5 text-sm font-medium text-white hover:bg-blue-500 shadow-lg shadow-blue-500/30 transition-all">Save Assignments</button>
            </div>
        </form>
    </div>
</x-admin-layout>