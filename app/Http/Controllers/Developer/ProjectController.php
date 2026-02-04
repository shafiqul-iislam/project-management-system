<?php

namespace App\Http\Controllers\Developer;

use App\Models\Project;
use App\Models\ProjectUser;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = ProjectUser::with(['project', 'developer'])->where('developer_id', auth('developer')->id())->get();

        return view('developer.pages.projects.index', compact('projects'));
    }

    public function tasks(Project $project)
    {
        return view('developer.pages.projects.tasks', compact('project'));
    }

    public function storeTask(\Illuminate\Http\Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required',
            'status' => 'required',
            'priority' => 'required',
        ]);

        $project->tasks()->create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'priority' => $request->priority,
            'developer_id' => auth('developer')->id(),
        ]);

        return back()->with('success', 'Task created successfully');
    }

    public function updateTask(\Illuminate\Http\Request $request, Project $project, \App\Models\Task $task)
    {
        $request->validate([
            'title' => 'required',
            'status' => 'required',
            'priority' => 'required',
        ]);

        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'priority' => $request->priority,
        ]);

        return back()->with('success', 'Task updated successfully');
    }
}
