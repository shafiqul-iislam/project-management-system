<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Modern Admin Dashboard</title>
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

<body
    class="bg-gradient-to-tr from-slate-50 to-slate-100 font-sans text-slate-800 antialiased flex items-center justify-center min-h-screen">

    <div class="relative w-full max-w-md p-6">
        <div class="bg-white rounded-3xl shadow-2xl p-8 border border-slate-200">
            <div class="text-center mb-8">
                <div
                    class="inline-flex items-center justify-center w-12 h-12 rounded-xl bg-primary/10 text-primary mb-4">
                    <i class="ri-dashboard-3-line text-2xl"></i>
                </div>
                <h2 class="text-2xl font-bold text-slate-900">Welcome Back</h2>
                <p class="text-slate-500 text-sm mt-1">Sign in to access your dashboard</p>
            </div>

            <form action="{{ url('admin/login') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label for="email" class="block text-sm font-medium text-slate-700 mb-1">Email Address</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="ri-mail-line text-slate-400"></i>
                        </div>
                        <input type="email" name="email" required
                            class="block w-full pl-10 pr-3 py-2.5 border border-slate-300 rounded-xl focus:ring-2 focus:ring-primary/50 focus:border-primary bg-white transition-all outline-none"
                            placeholder="name@company.com">
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between mb-1">
                        <label for="password" class="block text-sm font-medium text-slate-700">Password</label>
                        <a href="#"
                            class="text-xs font-medium text-primary hover:text-primary/80 transition-colors">Forgot password?</a>
                    </div>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="ri-lock-line text-slate-400"></i>
                        </div>
                        <input type="password" name="password" required
                            class="block w-full pl-10 pr-10 py-2.5 border border-slate-300 rounded-xl focus:ring-2 focus:ring-primary/50 focus:border-primary bg-white transition-all outline-none"
                            placeholder="••••••••">
                        <button type="button"
                            class="absolute inset-y-0 right-0 pr-3 flex items-center text-slate-400 hover:text-slate-600 cursor-pointer"
                            id="toggle-password">
                            <i class="ri-eye-line"></i>
                        </button>
                    </div>
                </div>

                <div class="flex items-center">
                    <input id="remember-me" name="remember-me" type="checkbox"
                        class="h-4 w-4 text-primary focus:ring-primary border-slate-300 rounded cursor-pointer">
                    <label for="remember-me" class="ml-2 block text-sm text-slate-600 cursor-pointer">Remember me</label>
                </div>

                <button type="submit"
                    class="w-full flex justify-center py-3 px-4 border border-transparent rounded-xl shadow-lg text-sm font-medium text-white bg-primary hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-all transform hover:-translate-y-0.5">
                    Sign in
                </button>
            </form>

            <div class="mt-8">
                <div class="relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-slate-200"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-2 bg-white text-slate-500">Or continue with</span>
                    </div>
                </div>

                <div class="mt-6 grid grid-cols-2 gap-3">
                    <button type="button"
                        class="w-full inline-flex justify-center py-2.5 px-4 border border-slate-200 rounded-xl shadow-sm bg-white text-sm font-medium text-slate-500 hover:bg-slate-50 transition-colors">
                        <i class="ri-google-fill text-xl text-red-500 mr-2"></i>
                        <span class="sr-only">Sign in with Google</span> Google
                    </button>
                    <button type="button"
                        class="w-full inline-flex justify-center py-2.5 px-4 border border-slate-200 rounded-xl shadow-sm bg-white text-sm font-medium text-slate-500 hover:bg-slate-50 transition-colors">
                        <i class="ri-github-fill text-xl text-slate-900 mr-2"></i>
                        <span class="sr-only">Sign in with GitHub</span> GitHub
                    </button>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    @vite('resources/js/auth.js')
    @endpush
</body>

</html>