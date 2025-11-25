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