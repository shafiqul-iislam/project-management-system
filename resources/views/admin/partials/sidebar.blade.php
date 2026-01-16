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

        <a href="/" class="flex items-center gap-3 rounded-lg bg-primary/10 px-4 py-3 text-primary transition-colors">
            <i class="ri-home-5-line text-xl"></i>
            <span class="font-medium">Dashboard</span>
        </a>

        <a href="#" class="flex items-center gap-3 rounded-lg px-4 py-3 text-slate-600 hover:bg-slate-50 hover:text-primary transition-colors">
            <i class="ri-user-3-line text-xl"></i>
            <span class="font-medium">Manage Users</span>
        </a>

        <a href="#" class="flex items-center gap-3 rounded-lg px-4 py-3 text-slate-600 hover:bg-slate-50 hover:text-primary transition-colors">
            <i class="ri-user-3-line text-xl"></i>
            <span class="font-medium">Manage Roles</span>
        </a>

        <a href="{{ route('admin.projects.index') }}" class="flex items-center gap-3 rounded-lg px-4 py-3 text-slate-600 hover:bg-slate-50 hover:text-primary transition-colors">
            <i class="ri-shopping-bag-3-line text-xl"></i>
            <span class="font-medium">Manage Projects</span>
        </a>

        <a href="#" class="flex items-center gap-3 rounded-lg px-4 py-3 text-slate-600 hover:bg-slate-50 hover:text-primary transition-colors">
            <i class="ri-bar-chart-box-line text-xl"></i>
            <span class="font-medium">Manage Tasks</span>
        </a>

        <a href="{{ route('admin.developers.index') }}" class="flex items-center gap-3 rounded-lg px-4 py-3 text-slate-600 hover:bg-slate-50 hover:text-primary transition-colors">
            <i class="ri-bar-chart-box-line text-xl"></i>
            <span class="font-medium">Developers</span>
        </a>

        <a href="#" class="flex items-center gap-3 rounded-lg px-4 py-3 text-slate-600 hover:bg-slate-50 hover:text-primary transition-colors">
            <i class="ri-bar-chart-box-line text-xl"></i>
            <span class="font-medium">Reports</span>
        </a>

        <p class="px-4 text-xs font-semibold text-slate-400 uppercase tracking-wider mt-8 mb-2">Settings</p>

        <a href="{{ route('admin.settings') }}" class="flex items-center gap-3 rounded-lg px-4 py-3 text-slate-600 hover:bg-slate-50 hover:text-primary transition-colors">
            <i class="ri-settings-4-line text-xl"></i>
            <span class="font-medium">Settings</span>
        </a>
    </nav>
</aside>