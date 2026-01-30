<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Task;
use App\Models\User;
use App\Models\Project;
use App\Models\Developer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $now = Carbon::now();
        $startOfMonth = $now->copy()->startOfMonth();
        $startOfLastMonth = $now->copy()->subMonth()->startOfMonth();
        $endOfLastMonth = $now->copy()->subMonth()->endOfMonth();

        // Total Developers
        $totalDevelopers = Developer::count();
        $developersLastMonth = Developer::whereBetween('created_at', [$startOfLastMonth, $endOfLastMonth])->count();
        $developersThisMonth = Developer::where('created_at', '>=', $startOfMonth)->count();
        $developersChange = $developersLastMonth > 0
            ? round((($developersThisMonth - $developersLastMonth) / $developersLastMonth) * 100, 1)
            : ($developersThisMonth > 0 ? 100 : 0);

        // Total Projects
        $totalProjects = Project::count();
        $projectsLastMonth = Project::whereBetween('created_at', [$startOfLastMonth, $endOfLastMonth])->count();
        $projectsThisMonth = Project::where('created_at', '>=', $startOfMonth)->count();
        $projectsChange = $projectsLastMonth > 0
            ? round((($projectsThisMonth - $projectsLastMonth) / $projectsLastMonth) * 100, 1)
            : ($projectsThisMonth > 0 ? 100 : 0);

        // New Projects (this month)
        $newProjects = Project::where('created_at', '>=', $startOfMonth)->count();
        $newProjectsLastMonth = Project::whereBetween('created_at', [$startOfLastMonth, $endOfLastMonth])->count();
        $newProjectsChange = $newProjectsLastMonth > 0
            ? round((($newProjects - $newProjectsLastMonth) / $newProjectsLastMonth) * 100, 1)
            : ($newProjects > 0 ? 100 : 0);

        // Active Users
        $activeUsers = User::where('status', 'active')->count();
        $activeUsersLastMonth = User::where('status', 'active')
            ->whereBetween('created_at', [$startOfLastMonth, $endOfLastMonth])->count();
        $activeUsersThisMonth = User::where('status', 'active')
            ->where('created_at', '>=', $startOfMonth)->count();
        $activeUsersChange = $activeUsersLastMonth > 0
            ? round((($activeUsersThisMonth - $activeUsersLastMonth) / $activeUsersLastMonth) * 100, 1)
            : ($activeUsersThisMonth > 0 ? 100 : 0);

        // Recent Projects
        $recentProjects = Project::with('developers')
            ->latest()
            ->take(5)
            ->get();

        return view('admin.pages.dashboard', compact(
            'totalDevelopers',
            'developersChange',
            'totalProjects',
            'projectsChange',
            'newProjects',
            'newProjectsChange',
            'activeUsers',
            'activeUsersChange',
            'recentProjects'
        ));
    }

    /**
     * Get chart data for task overview via AJAX
     */
    public function chartData(Request $request)
    {
        $period = $request->get('period', '7days');

        switch ($period) {
            case '30days':
                $startDate = Carbon::now()->subDays(30);
                $groupFormat = '%Y-%m-%d';
                $labelFormat = 'M d';
                break;
            case 'year':
                $startDate = Carbon::now()->startOfYear();
                $groupFormat = '%Y-%m';
                $labelFormat = 'M Y';
                break;
            default: // 7days
                $startDate = Carbon::now()->subDays(7);
                $groupFormat = '%Y-%m-%d';
                $labelFormat = 'D';
                break;
        }

        // Get task counts by status
        $pending = Task::where('status', 'pending')
            ->where('created_at', '>=', $startDate)
            ->count();

        $inProgress = Task::where('status', 'in_progress')
            ->where('created_at', '>=', $startDate)
            ->count();

        $completed = Task::where('status', 'completed')
            ->where('created_at', '>=', $startDate)
            ->count();

        // Get tasks over time for line chart
        $tasksOverTime = Task::selectRaw("DATE_FORMAT(created_at, '{$groupFormat}') as date, COUNT(*) as count")
            ->where('created_at', '>=', $startDate)
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $labels = [];
        $data = [];

        foreach ($tasksOverTime as $task) {
            $labels[] = Carbon::parse($task->date)->format($labelFormat);
            $data[] = $task->count;
        }

        return response()->json([
            'statusData' => [
                'labels' => ['Pending', 'In Progress', 'Completed'],
                'data' => [$pending, $inProgress, $completed],
                'colors' => ['#f59e0b', '#3b82f6', '#10b981']
            ],
            'timelineData' => [
                'labels' => $labels,
                'data' => $data
            ]
        ]);
    }
}
