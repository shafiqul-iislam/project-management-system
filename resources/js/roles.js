$(document).ready(function () {
    // Mock Data
    const permissions = {
        'Dashboard': ['View Dashboard', 'View Analytics'],
        'Projects': ['View Projects', 'Create Project', 'Edit Project', 'Delete Project'],
        'Tasks': ['View Tasks', 'Create Task', 'Edit Task', 'Delete Task'],
        'Users': ['View Users', 'Create User', 'Edit User', 'Delete User'],
        'Settings': ['View Settings', 'Edit General Settings', 'Edit Security Settings']
    };

    let roles = [
        {
            id: 1,
            name: 'Administrator',
            description: 'Full access to all system features.',
            usersCount: 2,
            permissions: ['all'] // Special keyword for full access
        },
        {
            id: 2,
            name: 'Manager',
            description: 'Can manage projects and tasks, but cannot change system settings.',
            usersCount: 5,
            permissions: ['View Dashboard', 'View Analytics', 'View Projects', 'Create Project', 'Edit Project', 'View Tasks', 'Create Task', 'Edit Task', 'Delete Task', 'View Users']
        },
        {
            id: 3,
            name: 'User',
            description: 'Standard user access. Can view assigned tasks and projects.',
            usersCount: 12,
            permissions: ['View Dashboard', 'View Projects', 'View Tasks', 'Edit Task']
        }
    ];

    // DOM Elements
    const rolesGrid = $('#roles-grid');
    const modal = $('#permissions-modal');
    const modalOverlay = $('#modal-overlay');
    const permissionsContainer = $('#permissions-container');
    const roleNameDisplay = $('#role-name-display');
    const roleIdInput = $('#role-id');

    // Render Roles
    function renderRoles() {
        rolesGrid.empty();
        roles.forEach(role => {
            const card = `
                <div class="bg-white rounded-xl shadow-sm border border-slate-100 p-6 hover:shadow-md transition-shadow">
                    <div class="flex items-start justify-between mb-4">
                        <div class="p-3 rounded-lg bg-primary/10 text-primary">
                            <i class="ri-shield-user-line text-2xl"></i>
                        </div>
                        <div class="flex gap-2">
                            <button class="text-slate-400 hover:text-primary transition-colors edit-role-btn" data-id="${role.id}" title="Edit Role Details">
                                <i class="ri-edit-line text-lg"></i>
                            </button>
                            <button class="text-slate-400 hover:text-red-500 transition-colors delete-role-btn" data-id="${role.id}" title="Delete Role">
                                <i class="ri-delete-bin-line text-lg"></i>
                            </button>
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-slate-800 mb-2">${role.name}</h3>
                    <p class="text-slate-500 text-sm mb-4 min-h-[40px]">${role.description}</p>
                    
                    <div class="flex items-center justify-between pt-4 border-t border-slate-100">
                        <div class="flex -space-x-2">
                            ${generateAvatarStack(role.usersCount)}
                        </div>
                        <button class="manage-permissions-btn text-sm font-medium text-primary hover:text-primary/80 transition-colors" data-id="${role.id}">
                            Manage Permissions
                        </button>
                    </div>
                </div>
            `;
            rolesGrid.append(card);
        });

        // Add "Add New Role" Card
        rolesGrid.append(`
            <div class="bg-slate-50 rounded-xl border-2 border-dashed border-slate-200 p-6 flex flex-col items-center justify-center text-center hover:border-primary/50 hover:bg-primary/5 transition-all cursor-pointer group" id="add-role-card">
                <div class="p-4 rounded-full bg-white shadow-sm mb-4 group-hover:scale-110 transition-transform">
                    <i class="ri-add-line text-2xl text-primary"></i>
                </div>
                <h3 class="text-lg font-bold text-slate-800 mb-1">Add New Role</h3>
                <p class="text-slate-500 text-sm">Create a new role with custom permissions</p>
            </div>
        `);
    }

    function generateAvatarStack(count) {
        let html = '';
        const maxAvatars = 3;
        for (let i = 0; i < Math.min(count, maxAvatars); i++) {
            html += `<img class="inline-block h-8 w-8 rounded-full ring-2 ring-white" src="https://ui-avatars.com/api/?name=User+${i}&background=random" alt=""/>`;
        }
        if (count > maxAvatars) {
            html += `<span class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-slate-100 ring-2 ring-white text-xs font-medium text-slate-500">+${count - maxAvatars}</span>`;
        }
        return html;
    }

    // Render Permissions Modal Content
    function renderPermissions(roleId) {
        const role = roles.find(r => r.id == roleId);
        if (!role) return;

        permissionsContainer.empty();

        Object.keys(permissions).forEach(category => {
            const categoryPerms = permissions[category];
            let categoryHtml = `
                <div class="mb-6">
                    <div class="flex items-center justify-between mb-3">
                        <h4 class="text-sm font-bold text-slate-900 uppercase tracking-wider">${category}</h4>
                        <button class="text-xs text-primary hover:underline select-all-btn" data-category="${category}">Select All</button>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
            `;

            categoryPerms.forEach(perm => {
                const isChecked = role.permissions.includes('all') || role.permissions.includes(perm) ? 'checked' : '';
                const isDisabled = role.permissions.includes('all') ? 'disabled' : ''; // Admins usually have all perms locked

                categoryHtml += `
                    <div class="flex items-center p-3 border border-slate-200 rounded-lg hover:bg-slate-50 transition-colors">
                        <input id="perm-${perm.replace(/\s+/g, '-')}" name="permissions" type="checkbox" value="${perm}" class="h-4 w-4 rounded border-slate-300 text-primary focus:ring-primary" ${isChecked} ${isDisabled}>
                        <label for="perm-${perm.replace(/\s+/g, '-')}" class="ml-3 block text-sm font-medium text-slate-700 cursor-pointer w-full">${perm}</label>
                    </div>
                `;
            });

            categoryHtml += `
                    </div>
                </div>
            `;
            permissionsContainer.append(categoryHtml);
        });
    }

    // Event Listeners
    renderRoles();

    // Open Modal
    $(document).on('click', '.manage-permissions-btn', function () {
        const roleId = $(this).data('id');
        const role = roles.find(r => r.id == roleId);

        roleIdInput.val(roleId);
        roleNameDisplay.text(role.name);
        renderPermissions(roleId);

        modal.removeClass('hidden');
    });

    // Close Modal
    function closeModal() {
        modal.addClass('hidden');
    }

    $('#cancel-modal-btn, #modal-overlay').click(closeModal);

    // Select All in Category
    $(document).on('click', '.select-all-btn', function () {
        const category = $(this).data('category');
        const categoryPerms = permissions[category];
        const inputs = $(this).closest('.mb-6').find('input[type="checkbox"]');

        // Check if all are currently checked
        const allChecked = inputs.length === inputs.filter(':checked').length;

        inputs.prop('checked', !allChecked);
    });

    // Save Permissions
    $('#save-permissions-btn').click(function () {
        const roleId = roleIdInput.val();
        const roleIndex = roles.findIndex(r => r.id == roleId);

        if (roleIndex > -1) {
            // If it's admin (id 1), don't actually change anything in this demo as they have 'all'
            if (roles[roleIndex].permissions.includes('all')) {
                alert('Administrator permissions cannot be modified in this demo.');
                closeModal();
                return;
            }

            const selectedPerms = [];
            $('input[name="permissions"]:checked').each(function () {
                selectedPerms.push($(this).val());
            });

            roles[roleIndex].permissions = selectedPerms;

            // Show success
            const btn = $(this);
            const originalText = btn.text();
            btn.prop('disabled', true).html('<i class="ri-loader-4-line animate-spin"></i> Saving...');

            setTimeout(function () {
                btn.prop('disabled', false).text(originalText);
                alert(`Permissions for ${roles[roleIndex].name} updated successfully!`);
                closeModal();
            }, 800);
        }
    });

    // Add Role (Mock)
    $(document).on('click', '#add-role-card', function () {
        const name = prompt("Enter new role name:");
        if (name) {
            const newId = Math.max(...roles.map(r => r.id)) + 1;
            roles.push({
                id: newId,
                name: name,
                description: 'Custom role created by admin.',
                usersCount: 0,
                permissions: []
            });
            renderRoles();
        }
    });

    // Delete Role (Mock)
    $(document).on('click', '.delete-role-btn', function () {
        if (confirm('Are you sure you want to delete this role?')) {
            const id = $(this).data('id');
            roles = roles.filter(r => r.id != id);
            renderRoles();
        }
    });
});
