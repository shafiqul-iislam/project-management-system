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
         @php
         $notifications = auth()->user()->unreadNotifications;
         @endphp

         <div class="relative">
             <button id="notification-button" class="relative rounded-full p-2 text-slate-500 hover:bg-slate-100 hover:text-primary transition-colors focus:outline-none">
                 <i class="ri-notification-3-line text-xl"></i>
                 @if($notifications->count())
                 <span class="absolute top-1 right-1 h-2 w-2 rounded-full bg-red-500 ring-2 ring-white"></span>
                 @endif
             </button>

             <!-- Notification Dropdown -->
             <div id="notification-dropdown" class="absolute right-0 mt-2 w-80 origin-top-right rounded-lg bg-white py-2 shadow-xl ring-1 ring-black ring-opacity-5 focus:outline-none hidden z-50">
                 <div class="px-4 py-2 border-b border-slate-100 flex justify-between items-center">
                     <h3 class="font-semibold text-slate-700">Notifications</h3>
                     @if($notifications->count())
                     <span class="bg-primary/10 text-primary text-xs font-medium px-2 py-0.5 rounded-full">{{ $notifications->count() }} New</span>
                     @endif
                 </div>

                 <div class="max-h-64 overflow-y-auto">
                     @forelse($notifications as $notification)
                     <a href="#" class="block px-4 py-3 hover:bg-slate-50 transition-colors border-b border-slate-50 last:border-none">
                         <div class="flex items-start gap-3">
                             <div class="flex-shrink-0 bg-blue-100 text-blue-600 rounded-full p-1 mt-0.5">
                                 <i class="ri-information-line text-sm"></i>
                             </div>
                             <div>
                                 <p class="text-sm text-slate-700">{{ $notification->data['message'] ?? 'New Notification' }}</p>
                                 <p class="text-xs text-slate-400 mt-1">{{ $notification->created_at->diffForHumans() }}</p>
                             </div>
                         </div>
                     </a>
                     @empty
                     <div class="px-4 py-6 text-center text-slate-500">
                         <p class="text-sm">No new notifications</p>
                     </div>
                     @endforelse
                 </div>

                 @if($notifications->count())
                 <div class="border-t border-slate-100 mt-1 pt-1">
                     <a href="#" class="block px-4 py-2 text-xs font-medium text-center text-primary hover:text-primary-dark">
                         View all notifications
                     </a>
                 </div>
                 @endif
             </div>
         </div>

         <!-- User Profile -->
         <div class="relative">
             <button id="user-menu-button" class="flex items-center gap-3 focus:outline-none">
                 <img class="h-9 w-9 rounded-full object-cover border-2 border-white shadow-sm" src="https://ui-avatars.com/api/?name=Admin+User&background=4f46e5&color=fff" alt="User avatar">
                 <div class="hidden md:block text-left">
                     <p class="text-sm font-semibold text-slate-700">{{ Auth::user()->name }}</p>
                     <p class="text-xs text-slate-500">Developer</p>
                 </div>
                 <i class="ri-arrow-down-s-line text-slate-400 hidden md:block"></i>
             </button>

             <!-- Dropdown -->
             <div id="user-dropdown" class="absolute right-0 mt-2 w-48 origin-top-right rounded-lg bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none hidden transition-all">
                 <a href="{{ route('profile') }}" class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50">Your Profile</a>
                 <div class="border-t border-slate-100 my-1"></div>
                 <form action="{{ route('logout') }}" class="w-full" method="post">
                     @csrf
                     <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50">Sign out</button>
                 </form>
             </div>
         </div>
     </div>
 </header>

 @push('scripts')
 <script>
     $(document).ready(function() {
         // Notification Dropdown
         const notificationBtn = $('#notification-button');
         const notificationDropdown = $('#notification-dropdown');

         notificationBtn.on('click', function(e) {
             e.stopPropagation();
             notificationDropdown.toggleClass('hidden');
             // Close user dropdown if open
             $('#user-dropdown').addClass('hidden');
         });

         // User Dropdown (existing logic usually handles this, but ensuring they don't overlap)
         const userBtn = $('#user-menu-button');
         const userDropdown = $('#user-dropdown');

         userBtn.on('click', function(e) {
             e.stopPropagation();
             userDropdown.toggleClass('hidden');
             // Close notification dropdown if open
             notificationDropdown.addClass('hidden');
         });

         // Close dropdowns when clicking outside
         $(document).on('click', function(e) {
             if (!notificationBtn.is(e.target) && notificationBtn.has(e.target).length === 0 &&
                 !notificationDropdown.is(e.target) && notificationDropdown.has(e.target).length === 0) {
                 notificationDropdown.addClass('hidden');
             }

             if (!userBtn.is(e.target) && userBtn.has(e.target).length === 0 &&
                 !userDropdown.is(e.target) && userDropdown.has(e.target).length === 0) {
                 userDropdown.addClass('hidden');
             }
         });
     });
 </script>
 @endpush