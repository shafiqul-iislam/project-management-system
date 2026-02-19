<?php

namespace App\Http\Controllers\Developer;

use App\Models\Task;
use App\Models\User;
use App\Models\Project;
use App\Models\ProjectUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Notifications\TaskAddedNotification;

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

    public function storeTask(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required',
            'status' => 'required',
            'priority' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $task = $project->tasks()->create([
                'title' => $request->title,
                'description' => $request->description,
                'status' => $request->status,
                'priority' => $request->priority,
                'developer_id' => auth('developer')->id(),
            ]);

            $admin = User::first(); // Assuming the admin is the first user
            $admin->notify(new TaskAddedNotification($task));

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Failed to create task: ' . $e->getMessage());
        }

        return back()->with('success', 'Task created successfully');
    }

    public function updateTask(Request $request)
    {
        $request->validate([
            'task_id' => 'required',
            'title' => 'required',
            'status' => 'required',
            'priority' => 'required',
        ]);

        $task = Task::find($request->task_id);

        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'priority' => $request->priority,
        ]);

        return back()->with('success', 'Task updated successfully');
    }
}
