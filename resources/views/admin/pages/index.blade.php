<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#4f46e5',
                        secondary: '#64748b',
                        dark: '#0f172a',
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
    </style>
</head>
<body class="bg-slate-50 font-sans text-slate-800 antialiased">

    <!-- Mobile Sidebar Overlay -->
    <div id="sidebar-overlay" class="fixed inset-0 z-40 bg-slate-900/50 hidden lg:hidden transition-opacity"></div>

    <!-- Sidebar -->
    <aside id="sidebar" class="fixed top-0 left-0 z-50 h-screen w-64 transform bg-white transition-transform duration-300 ease-in-out -translate-x-full lg:translate-x-0 border-r border-slate-200 shadow-sm">
        <div class="flex h-16 items-center justify-center border-b border-slate-200 px-6">
            <div class="flex items-center gap-2 font-bold text-xl text-primary">
                <i class="ri-dashboard-3-line text-2xl"></i>
                <span>AdminPanel</span>
            </div>
        </div>
        
        <nav class="px-4 py-6 space-y-1 overflow-y-auto h-[calc(100vh-4rem)]">
            <p class="px-4 text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Menu</p>
            
            <a href="#" class="flex items-center gap-3 rounded-lg bg-primary/10 px-4 py-3 text-primary transition-colors">
                <i class="ri-home-5-line text-xl"></i>
                <span class="font-medium">Dashboard</span>
            </a>
            
            <a href="#" class="flex items-center gap-3 rounded-lg px-4 py-3 text-slate-600 hover:bg-slate-50 hover:text-primary transition-colors">
                <i class="ri-shopping-bag-3-line text-xl"></i>
                <span class="font-medium">Orders</span>
            </a>
            
            <a href="#" class="flex items-center gap-3 rounded-lg px-4 py-3 text-slate-600 hover:bg-slate-50 hover:text-primary transition-colors">
                <i class="ri-user-3-line text-xl"></i>
                <span class="font-medium">Customers</span>
            </a>
            
            <a href="#" class="flex items-center gap-3 rounded-lg px-4 py-3 text-slate-600 hover:bg-slate-50 hover:text-primary transition-colors">
                <i class="ri-bar-chart-box-line text-xl"></i>
                <span class="font-medium">Analytics</span>
            </a>

            <p class="px-4 text-xs font-semibold text-slate-400 uppercase tracking-wider mt-8 mb-2">Settings</p>

            <a href="#" class="flex items-center gap-3 rounded-lg px-4 py-3 text-slate-600 hover:bg-slate-50 hover:text-primary transition-colors">
                <i class="ri-settings-4-line text-xl"></i>
                <span class="font-medium">General</span>
            </a>
            
            <a href="#" class="flex items-center gap-3 rounded-lg px-4 py-3 text-slate-600 hover:bg-slate-50 hover:text-primary transition-colors">
                <i class="ri-shield-key-line text-xl"></i>
                <span class="font-medium">Security</span>
            </a>
        </nav>
    </aside>

    <!-- Main Content Wrapper -->
    <div class="flex min-h-screen flex-col lg:pl-64 transition-all duration-300">
        
        <!-- Header -->
        <header class="sticky top-0 z-30 flex h-16 items-center justify-between bg-white/80 px-4 backdrop-blur-md border-b border-slate-200 sm:px-6 lg:px-8">
            <div class="flex items-center gap-4">
                <button id="sidebar-toggle" class="text-slate-500 hover:text-primary lg:hidden focus:outline-none">
                    <i class="ri-menu-2-line text-2xl"></i>
                </button>
                
                <!-- Search -->
                <div class="hidden md:flex items-center relative">
                    <i class="ri-search-line absolute left-3 text-slate-400"></i>
                    <input type="text" placeholder="Search..." class="h-10 w-64 rounded-full border-none bg-slate-100 pl-10 pr-4 text-sm focus:ring-2 focus:ring-primary/50 outline-none transition-all">
                </div>
            </div>

            <div class="flex items-center gap-4">
                <!-- Notifications -->
                <button class="relative rounded-full p-2 text-slate-500 hover:bg-slate-100 hover:text-primary transition-colors">
                    <i class="ri-notification-3-line text-xl"></i>
                    <span class="absolute top-2 right-2 h-2 w-2 rounded-full bg-red-500 ring-2 ring-white"></span>
                </button>

                <!-- User Profile -->
                <div class="relative">
                    <button id="user-menu-button" class="flex items-center gap-3 focus:outline-none">
                        <img class="h-9 w-9 rounded-full object-cover border-2 border-white shadow-sm" src="https://ui-avatars.com/api/?name=Admin+User&background=4f46e5&color=fff" alt="User avatar">
                        <div class="hidden md:block text-left">
                            <p class="text-sm font-semibold text-slate-700">Admin User</p>
                            <p class="text-xs text-slate-500">Administrator</p>
                        </div>
                        <i class="ri-arrow-down-s-line text-slate-400 hidden md:block"></i>
                    </button>

                    <!-- Dropdown -->
                    <div id="user-dropdown" class="absolute right-0 mt-2 w-48 origin-top-right rounded-lg bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none hidden transition-all">
                        <a href="#" class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50">Your Profile</a>
                        <a href="#" class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50">Settings</a>
                        <div class="border-t border-slate-100 my-1"></div>
                        <a href="#" class="block px-4 py-2 text-sm text-red-600 hover:bg-red-50">Sign out</a>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="flex-1 p-4 sm:p-6 lg:p-8">
            
            <!-- Page Title -->
            <div class="mb-8 flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-slate-800">Dashboard</h1>
                    <p class="text-slate-500">Welcome back, here's what's happening today.</p>
                </div>
                <button class="hidden sm:flex items-center gap-2 rounded-lg bg-primary px-4 py-2 text-sm font-medium text-white hover:bg-primary/90 shadow-lg shadow-primary/30 transition-all">
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
            
            <!-- Footer -->
            <footer class="mt-12 border-t border-slate-200 pt-6 text-center text-sm text-slate-500">
                <p>&copy; 2025 AdminPanel. All rights reserved.</p>
            </footer>

        </main>
    </div>
    
    <script src="js/script.js"></script>
</body>
</html>
