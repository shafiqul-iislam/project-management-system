<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Modern Admin Dashboard</title>
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

<body class="bg-gradient-to-tr from-slate-50 to-slate-100 font-sans text-slate-800 antialiased flex items-center justify-center min-h-screen">

    <div class="relative w-full max-w-md p-6">
        <div class="bg-white rounded-3xl shadow-2xl p-8 border border-slate-200">
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-12 h-12 rounded-xl bg-primary/10 text-primary mb-4">
                    <i class="ri-user-add-line text-2xl"></i>
                </div>
                <h2 class="text-2xl font-bold text-slate-900">Create Account</h2>
                <p class="text-slate-500 text-sm mt-1">Join us and start managing your projects</p>
            </div>

            <form id="signup-form" class="space-y-5">
                <div>
                    <label for="fullname" class="block text-sm font-medium text-slate-700 mb-1">Full Name</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="ri-user-line text-slate-400"></i>
                        </div>
                        <input type="text" id="fullname" name="fullname" required
                            class="block w-full pl-10 pr-3 py-2.5 border border-slate-300 rounded-xl focus:ring-2 focus:ring-primary/50 focus:border-primary bg-white transition-all outline-none"
                            placeholder="John Doe">
                    </div>
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-slate-700 mb-1">Email Address</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="ri-mail-line text-slate-400"></i>
                        </div>
                        <input type="email" id="email" name="email" required
                            class="block w-full pl-10 pr-3 py-2.5 border border-slate-300 rounded-xl focus:ring-2 focus:ring-primary/50 focus:border-primary bg-white transition-all outline-none"
                            placeholder="name@company.com">
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-slate-700 mb-1">Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="ri-lock-line text-slate-400"></i>
                        </div>
                        <input type="password" id="password" name="password" required
                            class="block w-full pl-10 pr-10 py-2.5 border border-slate-300 rounded-xl focus:ring-2 focus:ring-primary/50 focus:border-primary bg-white transition-all outline-none"
                            placeholder="••••••••">
                    </div>
                </div>

                <div>
                    <label for="confirm-password" class="block text-sm font-medium text-slate-700 mb-1">Confirm Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="ri-lock-check-line text-slate-400"></i>
                        </div>
                        <input type="password" id="confirm-password" name="confirm-password" required
                            class="block w-full pl-10 pr-10 py-2.5 border border-slate-300 rounded-xl focus:ring-2 focus:ring-primary/50 focus:border-primary bg-white transition-all outline-none"
                            placeholder="••••••••">
                    </div>
                </div>

                <div class="flex items-start">
                    <input id="terms" name="terms" type="checkbox" required
                        class="h-4 w-4 mt-1 text-primary focus:ring-primary border-slate-300 rounded cursor-pointer">
                    <label for="terms" class="ml-2 block text-sm text-slate-600">
                        I agree to the <a href="#" class="text-primary hover:underline">Terms of Service</a> and
                        <a href="#" class="text-primary hover:underline">Privacy Policy</a>
                    </label>
                </div>

                <button type="submit"
                    class="w-full flex justify-center py-3 px-4 border border-transparent rounded-xl shadow-lg text-sm font-medium text-white bg-primary hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-all transform hover:-translate-y-0.5">
                    Create Account
                </button>
            </form>

            <p class="mt-8 text-center text-sm text-slate-500">
                Already have an account?
                <a href="login.html" class="font-medium text-primary hover:text-primary/80 transition-colors">Sign in</a>
            </p>
        </div>
    </div>

    <script src="js/auth/auth.js"></script>
</body>


</html>