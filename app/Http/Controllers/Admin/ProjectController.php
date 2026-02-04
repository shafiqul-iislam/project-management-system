<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Models\Developer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\ProjectAssignedNotification;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::latest()->get();
        return view('admin.pages.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $developers = Developer::select('id', 'name')->get();

        return view('admin.pages.projects.create', compact('developers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:pending,in_progress,completed,active',
            'started_at' => 'nullable|date',
            'ended_at' => 'nullable|date',
        ]);

        $validated['slug'] = \Illuminate\Support\Str::slug($request->name);
        // Assuming the authenticated admin/user is the creator. 
        // If there's an auth system, we might want to capture the username/ID.
        // The migration has 'created_by_username'. 
        // For now, checks if Auth::user() exists, otherwise null or default.

        if (Auth::guard('admin')->check()) {
            $validated['created_by_username'] = Auth::guard('admin')->user()->name
                ?? Auth::guard('admin')->user()->email;
        }

        Project::create($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.pages.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('admin.pages.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:pending,in_progress,completed,active',
            'started_at' => 'nullable|date',
            'ended_at' => 'nullable|date',
            'finished_at' => 'nullable|date',
        ]);

        // Optional: Update slug if name changes? Usually acceptable.
        $validated['slug'] = \Illuminate\Support\Str::slug($request->name);

        $project->update($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Project deleted successfully.');
    }

    public function assignTo(Project $project)
    {
        $developers = Developer::all();
        return view('admin.pages.projects.assign-to', compact('project', 'developers'));
    }

    public function assignToStore(Request $request, Project $project)
    {
        $validated = $request->validate([
            'developer_ids' => 'required|array',
            'developer_ids.*' => 'exists:developers,id',
        ]);

        $project->developers()->syncWithPivotValues($validated['developer_ids'], ['assigned_at' => now()]);
        

        $developers = Developer::whereIn('id', $validated['developer_ids'])->get();
        foreach ($developers as $developer) {
            $developer->notify(new ProjectAssignedNotification($project));
        }


        return redirect()->route('admin.projects.index')->with('success', 'Project assigned successfully.');
    }
}
