<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Modern Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
    </style>
</head>

<body class="bg-slate-50 font-sans text-slate-800 antialiased">

    <!-- Mobile Sidebar Overlay -->
    <div id="sidebar-overlay" class="fixed inset-0 z-40 bg-slate-900/50 hidden lg:hidden transition-opacity"></div>

    <!-- sidebar -->
    @include('admin.partials.sidebar')

    <!-- Main Content Wrapper -->
    <div class="flex min-h-screen flex-col lg:pl-64 transition-all duration-300">

        <!-- sidebar -->
        @include('admin.partials.header')

        <!-- Main Content -->
        <main class="flex-1 p-4 sm:p-6 lg:p-8">

            {{ $slot }}

        </main>

        <!-- footer -->
        @include('admin.partials.footer')
    </div>
    @stack('scripts')
</body>

</html>