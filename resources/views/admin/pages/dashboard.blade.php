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
                    <p class="text-sm font-medium text-slate-500">Total Revenue</p>
                    <p class="text-2xl font-bold text-slate-800 mt-1">$54,230</p>
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
                    <p class="text-sm font-medium text-slate-500">Active Users</p>
                    <p class="text-2xl font-bold text-slate-800 mt-1">2,450</p>
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

        <!-- Card 3 -->
        <div class="rounded-xl bg-white p-6 shadow-sm border border-slate-100 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-500">New Orders</p>
                    <p class="text-2xl font-bold text-slate-800 mt-1">345</p>
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

        <!-- Card 4 -->
        <div class="rounded-xl bg-white p-6 shadow-sm border border-slate-100 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-500">Pending Issues</p>
                    <p class="text-2xl font-bold text-slate-800 mt-1">12</p>
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
    </div>

    <!-- Charts & Recent Activity Section -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        <!-- Main Chart Placeholder -->
        <div class="lg:col-span-2 rounded-xl bg-white p-6 shadow-sm border border-slate-100">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-bold text-slate-800">Revenue Overview</h3>
                <select class="bg-slate-50 border-none text-sm rounded-lg px-3 py-2 text-slate-600 focus:ring-2 focus:ring-primary/50 outline-none">
                    <option>Last 7 Days</option>
                    <option>Last 30 Days</option>
                    <option>This Year</option>
                </select>
            </div>
            <!-- Placeholder for Chart -->
            <div class="h-80 w-full bg-slate-50 rounded-lg flex items-center justify-center border border-dashed border-slate-200">
                <div class="text-center">
                    <i class="ri-bar-chart-grouped-line text-4xl text-slate-300 mb-2"></i>
                    <p class="text-slate-400 text-sm">Chart Visualization Placeholder</p>
                </div>
            </div>
        </div>

        <!-- Recent Activity / List -->
        <div class="rounded-xl bg-white p-6 shadow-sm border border-slate-100">
            <h3 class="text-lg font-bold text-slate-800 mb-6">Recent Orders</h3>
            <div class="space-y-4">
                <!-- Item 1 -->
                <div class="flex items-center gap-4 p-3 rounded-lg hover:bg-slate-50 transition-colors">
                    <div class="h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 font-bold text-sm">
                        JD
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-semibold text-slate-800">John Doe</p>
                        <p class="text-xs text-slate-500">iPhone 15 Pro Max</p>
                    </div>
                    <div class="text-right">
                        <p class="text-sm font-bold text-slate-800">$1,299</p>
                        <span class="inline-block px-2 py-0.5 rounded text-xs font-medium bg-green-100 text-green-700">Paid</span>
                    </div>
                </div>

                <!-- Item 2 -->
                <div class="flex items-center gap-4 p-3 rounded-lg hover:bg-slate-50 transition-colors">
                    <div class="h-10 w-10 rounded-full bg-pink-100 flex items-center justify-center text-pink-600 font-bold text-sm">
                        AS
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-semibold text-slate-800">Alice Smith</p>
                        <p class="text-xs text-slate-500">MacBook Air M2</p>
                    </div>
                    <div class="text-right">
                        <p class="text-sm font-bold text-slate-800">$1,099</p>
                        <span class="inline-block px-2 py-0.5 rounded text-xs font-medium bg-yellow-100 text-yellow-700">Pending</span>
                    </div>
                </div>

                <!-- Item 3 -->
                <div class="flex items-center gap-4 p-3 rounded-lg hover:bg-slate-50 transition-colors">
                    <div class="h-10 w-10 rounded-full bg-cyan-100 flex items-center justify-center text-cyan-600 font-bold text-sm">
                        RJ
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-semibold text-slate-800">Robert Johnson</p>
                        <p class="text-xs text-slate-500">Sony WH-1000XM5</p>
                    </div>
                    <div class="text-right">
                        <p class="text-sm font-bold text-slate-800">$348</p>
                        <span class="inline-block px-2 py-0.5 rounded text-xs font-medium bg-green-100 text-green-700">Paid</span>
                    </div>
                </div>

                <!-- Item 4 -->
                <div class="flex items-center gap-4 p-3 rounded-lg hover:bg-slate-50 transition-colors">
                    <div class="h-10 w-10 rounded-full bg-orange-100 flex items-center justify-center text-orange-600 font-bold text-sm">
                        MK
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-semibold text-slate-800">Maria Garcia</p>
                        <p class="text-xs text-slate-500">Samsung S24 Ultra</p>
                    </div>
                    <div class="text-right">
                        <p class="text-sm font-bold text-slate-800">$1,199</p>
                        <span class="inline-block px-2 py-0.5 rounded text-xs font-medium bg-red-100 text-red-700">Failed</span>
                    </div>
                </div>
            </div>
            <button class="w-full mt-6 py-2 text-sm font-medium text-primary border border-primary/20 rounded-lg hover:bg-primary/5 transition-colors">
                View All Orders
            </button>
        </div>
    </div>

</x-admin-layout>