 <x-admin-layout>

     <!-- Page Title -->
     <div class="mb-8 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
         <div>
             <h1 class="text-2xl font-bold text-slate-800">Roles & Permissions</h1>
             <p class="text-slate-500">Manage user roles and assign access rights.</p>
         </div>
         <button id="add-role-btn"
             class="inline-flex items-center justify-center gap-2 rounded-lg bg-primary px-4 py-2 text-sm font-medium text-white hover:bg-primary/90 shadow-lg shadow-primary/30 transition-all">
             <i class="ri-add-line text-lg"></i>
             Add New Role
         </button>
     </div>

     <!-- Roles Grid -->
     <div id="roles-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
         <!-- Roles will be populated by JS -->
     </div>


     <!-- Permissions Modal -->
     <div id="permissions-modal" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title"
         role="dialog" aria-modal="true">
         <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
             <!-- Background overlay -->
             <div class="fixed inset-0 bg-slate-900/75 transition-opacity" aria-hidden="true" id="modal-overlay"></div>

             <!-- This element is to trick the browser into centering the modal contents. -->
             <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

             <!-- Modal panel -->
             <div
                 class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl w-full">
                 <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                     <div class="sm:flex sm:items-start">
                         <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                             <h3 class="text-lg leading-6 font-medium text-slate-900" id="modal-title">
                                 Manage Permissions - <span id="role-name-display" class="font-bold text-primary"></span>
                             </h3>
                             <p class="text-sm text-slate-500 mt-1">Select the permissions you want to assign to this
                                 role.</p>

                             <input type="hidden" id="role-id">

                             <div class="mt-6 max-h-[60vh] overflow-y-auto pr-2" id="permissions-container">
                                 <!-- Permissions will be populated by JS -->
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="bg-slate-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                     <button type="button" id="save-permissions-btn"
                         class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-primary text-base font-medium text-white hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary sm:ml-3 sm:w-auto sm:text-sm">
                         Save Permissions
                     </button>
                     <button type="button" id="cancel-modal-btn"
                         class="mt-3 w-full inline-flex justify-center rounded-md border border-slate-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-slate-700 hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                         Cancel
                     </button>
                 </div>
             </div>
         </div>
     </div>

     <script src="js/roles.js"></script>
 </x-admin-layout>