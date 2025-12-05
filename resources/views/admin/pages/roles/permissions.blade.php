 <x-admin-layout>

     <div class="max-w-7xl mx-auto px-6 py-10">

         <!-- Title -->
         <div class="mb-8">
             <h1 class="text-2xl font-bold text-slate-800">Manage Permissions</h1>
             <p class="text-sm text-slate-500 mt-1">Select permissions for this role.</p>
         </div>

         <!-- Permission Block -->
         <section class="bg-white rounded-xl shadow-sm border border-slate-200">

             <header class="flex items-center justify-between px-6 py-4 border-b border-slate-200">
                 <div>
                     <h2 class="text-lg font-semibold text-slate-800">
                         Permissions For: <span class="text-primary font-bold">Admin</span>
                     </h2>
                 </div>

                 <button
                     class="inline-flex items-center gap-2 px-4 py-2 bg-primary text-white rounded-lg text-sm font-medium hover:bg-primary/90 focus:ring-2 focus:ring-primary transition">
                     Save Changes
                 </button>
             </header>

             <!-- Permissions -->
             <div class="p-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">

                 <!-- Users -->
                 <div class="border border-slate-200 rounded-lg p-4">
                     <h3 class="text-sm font-semibold text-slate-700 mb-3">Users</h3>
                     <ul class="space-y-2">
                         <li class="flex items-center gap-3">
                             <input type="checkbox" class="w-4 h-4 text-primary rounded">
                             <span class="text-sm text-slate-600">Create User</span>
                         </li>
                         <li class="flex items-center gap-3">
                             <input type="checkbox" class="w-4 h-4 text-primary rounded">
                             <span class="text-sm text-slate-600">Edit User</span>
                         </li>
                         <li class="flex items-center gap-3">
                             <input type="checkbox" class="w-4 h-4 text-primary rounded">
                             <span class="text-sm text-slate-600">Delete User</span>
                         </li>
                     </ul>
                 </div>

                 <!-- Products -->
                 <div class="border border-slate-200 rounded-lg p-4">
                     <h3 class="text-sm font-semibold text-slate-700 mb-3">Products</h3>
                     <ul class="space-y-2">
                         <li class="flex items-center gap-3">
                             <input type="checkbox" class="w-4 h-4 text-primary rounded">
                             <span class="text-sm text-slate-600">Add Product</span>
                         </li>
                         <li class="flex items-center gap-3">
                             <input type="checkbox" class="w-4 h-4 text-primary rounded">
                             <span class="text-sm text-slate-600">Edit Product</span>
                         </li>
                         <li class="flex items-center gap-3">
                             <input type="checkbox" class="w-4 h-4 text-primary rounded">
                             <span class="text-sm text-slate-600">Delete Product</span>
                         </li>
                     </ul>
                 </div>

                 <!-- Orders -->
                 <div class="border border-slate-200 rounded-lg p-4">
                     <h3 class="text-sm font-semibold text-slate-700 mb-3">Orders</h3>
                     <ul class="space-y-2">
                         <li class="flex items-center gap-3">
                             <input type="checkbox" class="w-4 h-4 text-primary rounded">
                             <span class="text-sm text-slate-600">Manage Orders</span>
                         </li>
                         <li class="flex items-center gap-3">
                             <input type="checkbox" class="w-4 h-4 text-primary rounded">
                             <span class="text-sm text-slate-600">Refund Orders</span>
                         </li>
                     </ul>
                 </div>

                 <!-- Invoices -->
                 <div class="border border-slate-200 rounded-lg p-4">
                     <h3 class="text-sm font-semibold text-slate-700 mb-3">Invoices</h3>
                     <ul class="space-y-2">
                         <li class="flex items-center gap-3">
                             <input type="checkbox" class="w-4 h-4 text-primary rounded">
                             <span class="text-sm text-slate-600">Create Invoice</span>
                         </li>
                         <li class="flex items-center gap-3">
                             <input type="checkbox" class="w-4 h-4 text-primary rounded">
                             <span class="text-sm text-slate-600">Send Invoice</span>
                         </li>
                     </ul>
                 </div>

                 <!-- Posts -->
                 <div class="border border-slate-200 rounded-lg p-4">
                     <h3 class="text-sm font-semibold text-slate-700 mb-3">Posts</h3>
                     <ul class="space-y-2">
                         <li class="flex items-center gap-3">
                             <input type="checkbox" class="w-4 h-4 text-primary rounded">
                             <span class="text-sm text-slate-600">Create Post</span>
                         </li>
                         <li class="flex items-center gap-3">
                             <input type="checkbox" class="w-4 h-4 text-primary rounded">
                             <span class="text-sm text-slate-600">Edit Post</span>
                         </li>
                         <li class="flex items-center gap-3">
                             <input type="checkbox" class="w-4 h-4 text-primary rounded">
                             <span class="text-sm text-slate-600">Delete Post</span>
                         </li>
                     </ul>
                 </div>

                 <!-- Comments -->
                 <div class="border border-slate-200 rounded-lg p-4">
                     <h3 class="text-sm font-semibold text-slate-700 mb-3">Comments</h3>
                     <ul class="space-y-2">
                         <li class="flex items-center gap-3">
                             <input type="checkbox" class="w-4 h-4 text-primary rounded">
                             <span class="text-sm text-slate-600">Approve Comments</span>
                         </li>
                         <li class="flex items-center gap-3">
                             <input type="checkbox" class="w-4 h-4 text-primary rounded">
                             <span class="text-sm text-slate-600">Delete Comments</span>
                         </li>
                     </ul>
                 </div>

             </div>
         </section>
     </div>

 </x-admin-layout>