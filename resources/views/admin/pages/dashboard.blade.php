<x-admin-layout>

    <!-- Page Title -->
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Dashboard</h1>
            <p class="text-slate-500">Welcome back, here's what's happening today.</p>
        </div>
        <button class="hidden sm:flex items-center gap-2 rounded-lg bg-blue-500 px-4 py-2 text-sm font-medium text-white hover:bg-blue-300 shadow-lg shadow-blue-500/30 transition-all">
            <i class="ri-download-cloud-2-line"></i>
            Download Report
        </button>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4 mb-8">
        <!-- Card 1 -->
        <div class="rounded-xl bg-white p-6 shadow-sm border border-slate-100 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-500">Total Developers</p>
                    <p class="text-2xl font-bold text-slate-800 mt-1">{{ $totalDevelopers }}</p>
                </div>
                <div class="rounded-lg bg-green-50 p-3 text-green-600">
                    <i class="ri-money-dollar-circle-line text-xl"></i>
                </div>
            </div>
            <div class="mt-4 flex items-center text-sm">
                <span class="flex items-center text-green-600 font-medium">
                    <i class="ri-arrow-up-line mr-1"></i> 12.5%
                </span>
                <span class="ml-2 text-slate-400">from last month</span>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="rounded-xl bg-white p-6 shadow-sm border border-slate-100 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-500">Total Projects</p>
                    <p class="text-2xl font-bold text-slate-800 mt-1">{{ $totalProjects }}</p>
                </div>
                <div class="rounded-lg bg-purple-50 p-3 text-purple-600">
                    <i class="ri-shopping-basket-line text-xl"></i>
                </div>
            </div>
            <div class="mt-4 flex items-center text-sm">
                <span class="flex items-center text-red-500 font-medium">
                    <i class="ri-arrow-down-line mr-1"></i> 2.1%
                </span>
                <span class="ml-2 text-slate-400">from last month</span>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="rounded-xl bg-white p-6 shadow-sm border border-slate-100 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-500">New Projects</p>
                    <p class="text-2xl font-bold text-slate-800 mt-1">{{ $newProjects }}</p>
                </div>
                <div class="rounded-lg bg-orange-50 p-3 text-orange-600">
                    <i class="ri-error-warning-line text-xl"></i>
                </div>
            </div>
            <div class="mt-4 flex items-center text-sm">
                <span class="flex items-center text-green-600 font-medium">
                    <i class="ri-arrow-up-line mr-1"></i> 4.3%
                </span>
                <span class="ml-2 text-slate-400">from last month</span>
            </div>
        </div>

        <!-- Card 4 -->
        <div class="rounded-xl bg-white p-6 shadow-sm border border-slate-100 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-500">Active Users</p>
                    <p class="text-2xl font-bold text-slate-800 mt-1">{{ $activeUsers }}</p>
                </div>
                <div class="rounded-lg bg-blue-50 p-3 text-blue-600">
                    <i class="ri-user-follow-line text-xl"></i>
                </div>
            </div>
            <div class="mt-4 flex items-center text-sm">
                <span class="flex items-center text-green-600 font-medium">
                    <i class="ri-arrow-up-line mr-1"></i> 8.2%
                </span>
                <span class="ml-2 text-slate-400">from last month</span>
            </div>
        </div>
    </div>

    <!-- Charts & Recent Activity Section -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        <!-- Main Chart Placeholder -->
        <div class="lg:col-span-2 rounded-xl bg-white p-6 shadow-sm border border-slate-100">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-bold text-slate-800">Task Overview</h3>
                <select id="chartPeriodSelect" class="bg-slate-50 border-none text-sm rounded-lg px-3 py-2 text-slate-600 focus:ring-2 focus:ring-primary/50 outline-none">
                    <option value="7days">Last 7 Days</option>
                    <option value="30days">Last 30 Days</option>
                    <option value="year">This Year</option>
                </select>
            </div>
            <!-- Chart Container -->
            <div class="h-80 w-full bg-slate-50 rounded-lg p-2 relative">
                <canvas id="taskOverviewChart"></canvas>
            </div>
        </div>

        <!-- Recent Activity / List -->
        <div class="rounded-xl bg-white p-6 shadow-sm border border-slate-100">

            <div class="flex items-center justify-between">
                <h3 class="text-lg font-bold text-slate-800">Recent Projects</h3>
                <a href="{{ route('admin.projects.index') }}" class="text-sm text-primary hover:underline">
                    View All
                </a>
            </div>

            <div class="space-y-4">

                @foreach ($recentProjects as $project)
                <!-- Item 1 -->
                <div class="flex items-center gap-4 p-3 rounded-lg hover:bg-slate-50 transition-colors">
                    <div class="h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 font-bold text-sm">
                        <i class="ri-user-follow-line text-xl"></i>
                    </div>
                    <div class="">
                        <p class=" font-semibold text-slate-800">{{ $project->name }}</p>

                        <div class="flex-1">
                            <p class="text-xs text-slate-500">
                                {{ $project->developers->pluck('name')->take(2)->implode(', ') }}
                            </p>
                        </div>

                    </div>
                    <div class="text-right">
                        <span class="inline-block px-2 py-0.5 rounded text-xs font-medium bg-green-100 text-green-700">{{ $project->status }}</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        $(document).ready(function() {
            let taskChart = null;

            function initChart(data) {
                const ctx = document.getElementById('taskOverviewChart').getContext('2d');

                if (taskChart) {
                    taskChart.destroy();
                }

                taskChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: data.timelineData.labels,
                        datasets: [{
                            label: 'Tasks Created',
                            data: data.timelineData.data,
                            borderColor: '#4f46e5',
                            backgroundColor: 'rgba(79, 70, 229, 0.1)',
                            borderWidth: 2,
                            fill: true,
                            tension: 0.4
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false
                            },
                            tooltip: {
                                mode: 'index',
                                intersect: false,
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                grid: {
                                    display: true,
                                    color: '#f1f5f9'
                                }
                            },
                            x: {
                                grid: {
                                    display: false
                                }
                            }
                        }
                    }
                });
            }

            function fetchChartData(period = '7days') {
                $.ajax({
                    url: "{{ route('admin.dashboard.chart-data') }}",
                    type: "GET",
                    data: {
                        period: period
                    },
                    success: function(response) {
                        initChart(response);
                    },
                    error: function(xhr) {
                        console.error("Error fetching chart data:", xhr);
                    }
                });
            }

            // Initial load
            fetchChartData();

            // Handle period change
            $('#chartPeriodSelect').on('change', function() {
                const period = $(this).val();
                fetchChartData(period);
            });
        });
    </script>
    @endpush

</x-admin-layout>