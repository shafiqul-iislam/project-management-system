$(document).ready(function () {
    // Mock Data
    let tasks = [
        { id: 1, name: "Design Homepage", assigned: "Alice Smith", date: "2025-11-30", priority: "High", status: "In Progress" },
        { id: 2, name: "Fix Login Bug", assigned: "John Doe", date: "2025-11-28", priority: "High", status: "To Do" },
        { id: 3, name: "Update Documentation", assigned: "Maria Garcia", date: "2025-12-05", priority: "Low", status: "Done" },
        { id: 4, name: "Optimize Database", assigned: "Robert Johnson", date: "2025-12-10", priority: "Medium", status: "In Progress" },
        { id: 5, name: "Create Marketing Banner", assigned: "Alice Smith", date: "2025-12-01", priority: "Medium", status: "Review" },
        { id: 6, name: "Client Meeting Prep", assigned: "John Doe", date: "2025-11-29", priority: "High", status: "To Do" },
        { id: 7, name: "Review Pull Requests", assigned: "Robert Johnson", date: "2025-11-27", priority: "High", status: "Done" },
        { id: 8, name: "Update Dependencies", assigned: "Maria Garcia", date: "2025-12-15", priority: "Low", status: "To Do" },
        { id: 9, name: "Write Unit Tests", assigned: "John Doe", date: "2025-12-03", priority: "Medium", status: "In Progress" },
        { id: 10, name: "Deploy to Staging", assigned: "Robert Johnson", date: "2025-12-08", priority: "High", status: "To Do" },
        { id: 11, name: "Research Competitors", assigned: "Alice Smith", date: "2025-12-20", priority: "Low", status: "In Progress" },
        { id: 12, name: "Fix CSS Issues", assigned: "Maria Garcia", date: "2025-11-26", priority: "Medium", status: "Done" }
    ];

    const itemsPerPage = 7;
    let currentPage = 1;
    let filteredTasks = [...tasks];

    // Helper to get status colors
    function getStatusColor(status) {
        switch (status) {
            case 'Done': return 'bg-green-100 text-green-700';
            case 'In Progress': return 'bg-blue-100 text-blue-700';
            case 'Review': return 'bg-purple-100 text-purple-700';
            case 'To Do': return 'bg-slate-100 text-slate-700';
            default: return 'bg-slate-100 text-slate-700';
        }
    }

    // Helper to get priority colors
    function getPriorityColor(priority) {
        switch (priority) {
            case 'High': return 'text-red-600 bg-red-50';
            case 'Medium': return 'text-orange-600 bg-orange-50';
            case 'Low': return 'text-green-600 bg-green-50';
            default: return 'text-slate-600 bg-slate-50';
        }
    }

    function renderTable() {
        const startIndex = (currentPage - 1) * itemsPerPage;
        const endIndex = startIndex + itemsPerPage;
        const pageData = filteredTasks.slice(startIndex, endIndex);

        const tbody = $('#tasks-table-body');
        tbody.empty();

        if (pageData.length === 0) {
            tbody.append(`
                <tr>
                    <td colspan="6" class="px-6 py-8 text-center text-slate-500">
                        No tasks found matching your search.
                    </td>
                </tr>
            `);
        } else {
            pageData.forEach(task => {
                const statusClass = getStatusColor(task.status);
                const priorityClass = getPriorityColor(task.priority);

                const row = `
                    <tr class="hover:bg-slate-50 transition-colors">
                        <td class="px-6 py-4 font-medium text-slate-800">${task.name}</td>
                        <td class="px-6 py-4">${task.assigned}</td>
                        <td class="px-6 py-4">${task.date}</td>
                        <td class="px-6 py-4">
                            <span class="inline-block px-2 py-1 rounded text-xs font-medium ${priorityClass}">
                                ${task.priority}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-block px-2 py-1 rounded text-xs font-medium ${statusClass}">
                                ${task.status}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <button class="p-2 text-slate-500 hover:text-primary hover:bg-primary/10 rounded-lg transition-colors edit-task" data-id="${task.id}" title="Edit">
                                    <i class="ri-edit-line text-lg"></i>
                                </button>
                                <button class="p-2 text-slate-500 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors delete-task" data-id="${task.id}" title="Delete">
                                    <i class="ri-delete-bin-line text-lg"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                `;
                tbody.append(row);
            });
        }

        // Update Pagination Info
        $('#start-index').text(filteredTasks.length > 0 ? startIndex + 1 : 0);
        $('#end-index').text(Math.min(endIndex, filteredTasks.length));
        $('#total-items').text(filteredTasks.length);

        // Update Buttons
        $('#prev-page').prop('disabled', currentPage === 1);
        $('#next-page').prop('disabled', endIndex >= filteredTasks.length);
    }

    // Initial Render
    renderTable();

    // Pagination Handlers
    $('#prev-page').click(function () {
        if (currentPage > 1) {
            currentPage--;
            renderTable();
        }
    });

    $('#next-page').click(function () {
        if ((currentPage * itemsPerPage) < filteredTasks.length) {
            currentPage++;
            renderTable();
        }
    });

    // Search Handler
    $('#task-search').on('input', function () {
        const searchTerm = $(this).val().toLowerCase();
        filteredTasks = tasks.filter(task =>
            task.name.toLowerCase().includes(searchTerm) ||
            task.assigned.toLowerCase().includes(searchTerm)
        );
        currentPage = 1;
        renderTable();
    });

    // Modal Logic
    const modal = $('#task-modal');
    const modalTitle = $('#modal-title');
    const taskIdInput = $('#task-id');
    const taskNameInput = $('#task-name');
    const taskAssignedInput = $('#task-assigned');
    const taskDateInput = $('#task-date');
    const taskPriorityInput = $('#task-priority');
    const taskStatusInput = $('#task-status');

    function openModal(isEdit = false, data = null) {
        if (isEdit && data) {
            modalTitle.text('Edit Task');
            taskIdInput.val(data.id);
            taskNameInput.val(data.name);
            taskAssignedInput.val(data.assigned);
            taskDateInput.val(data.date);
            taskPriorityInput.val(data.priority);
            taskStatusInput.val(data.status);
        } else {
            modalTitle.text('Add New Task');
            taskIdInput.val('');
            taskNameInput.val('');
            taskAssignedInput.val('');
            taskDateInput.val('');
            taskPriorityInput.val('Low');
            taskStatusInput.val('To Do');
        }
        modal.removeClass('hidden');
    }

    function closeModal() {
        modal.addClass('hidden');
    }

    $('#create-task-btn').click(function () {
        openModal(false);
    });

    $('#cancel-modal-btn, #modal-overlay').click(function () {
        closeModal();
    });

    // Edit Task
    $(document).on('click', '.edit-task', function () {
        const id = $(this).data('id');
        const task = tasks.find(t => t.id === id);
        if (task) {
            openModal(true, task);
        }
    });

    // Save Task (Create/Update)
    $('#save-task-btn').click(function () {
        const id = taskIdInput.val();
        const name = taskNameInput.val();
        const assigned = taskAssignedInput.val();
        const date = taskDateInput.val();
        const priority = taskPriorityInput.val();
        const status = taskStatusInput.val();

        if (!name || !assigned || !date) {
            alert('Please fill in all required fields');
            return;
        }

        if (id) {
            // Update existing
            const index = tasks.findIndex(t => t.id == id);
            if (index > -1) {
                tasks[index] = { ...tasks[index], name, assigned, date, priority, status };
            }
        } else {
            // Create new
            const newId = tasks.length > 0 ? Math.max(...tasks.map(t => t.id)) + 1 : 1;
            tasks.unshift({ id: newId, name, assigned, date, priority, status });
        }

        // Refresh table
        filteredTasks = [...tasks]; // Reset filter
        $('#task-search').val(''); // Clear search
        renderTable();
        closeModal();
    });

    // Delete Task
    $(document).on('click', '.delete-task', function () {
        if (confirm('Are you sure you want to delete this task?')) {
            const id = $(this).data('id');
            const index = tasks.findIndex(t => t.id === id);
            if (index > -1) {
                tasks.splice(index, 1);
                filteredTasks = tasks;
                renderTable();
            }
        }
    });
});
