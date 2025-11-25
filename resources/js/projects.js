$(document).ready(function () {
    // Mock Data
    const projects = [
        { id: 1, name: "Website Redesign", client: "Acme Corp", deadline: "2025-03-30", budget: "$15,000", status: "Active" },
        { id: 2, name: "Mobile App Development", client: "TechStart Inc", deadline: "2025-05-15", budget: "$45,000", status: "Pending" },
        { id: 3, name: "SEO Optimization", client: "Global Reach", deadline: "2025-02-28", budget: "$5,000", status: "Completed" },
        { id: 4, name: "CRM Integration", client: "SalesForce Plus", deadline: "2025-04-10", budget: "$12,500", status: "Active" },
        { id: 5, name: "E-commerce Platform", client: "Shopify Experts", deadline: "2025-06-20", budget: "$60,000", status: "On Hold" },
        { id: 6, name: "Data Migration", client: "BigData Co", deadline: "2025-03-05", budget: "$8,000", status: "Completed" },
        { id: 7, name: "Marketing Campaign", client: "BrandBuilders", deadline: "2025-04-01", budget: "$20,000", status: "Active" },
        { id: 8, name: "Security Audit", client: "SecureNet", deadline: "2025-02-15", budget: "$10,000", status: "Completed" },
        { id: 9, name: "Cloud Migration", client: "Cloudify", deadline: "2025-07-01", budget: "$35,000", status: "Pending" },
        { id: 10, name: "API Development", client: "ConnectAll", deadline: "2025-03-20", budget: "$18,000", status: "Active" },
        { id: 11, name: "Logo Design", client: "Creative Minds", deadline: "2025-02-10", budget: "$2,000", status: "Completed" },
        { id: 12, name: "User Testing", client: "UX Labs", deadline: "2025-03-15", budget: "$6,000", status: "Active" },
        { id: 13, name: "Content Strategy", client: "WriteNow", deadline: "2025-04-05", budget: "$4,000", status: "Pending" },
        { id: 14, name: "Social Media Mgmt", client: "SocialBoost", deadline: "2025-05-01", budget: "$3,000/mo", status: "Active" },
        { id: 15, name: "Inventory System", client: "WareHouse Pro", deadline: "2025-08-15", budget: "$25,000", status: "On Hold" },
        { id: 16, name: "Payment Gateway", client: "PayFast", deadline: "2025-04-25", budget: "$14,000", status: "Active" },
        { id: 17, name: "Analytics Dashboard", client: "DataView", deadline: "2025-03-10", budget: "$9,000", status: "Completed" },
        { id: 18, name: "Email Marketing", client: "MailMaster", deadline: "2025-02-20", budget: "$1,500", status: "Completed" },
        { id: 19, name: "Video Production", client: "Visionary", deadline: "2025-05-10", budget: "$11,000", status: "Pending" },
        { id: 20, name: "IT Support", client: "TechHelp", deadline: "2025-12-31", budget: "$5,000/mo", status: "Active" }
    ];

    const itemsPerPage = 7;
    let currentPage = 1;
    let filteredProjects = [...projects];

    function getStatusColor(status) {
        switch (status) {
            case 'Active': return 'bg-green-100 text-green-700';
            case 'Pending': return 'bg-yellow-100 text-yellow-700';
            case 'Completed': return 'bg-blue-100 text-blue-700';
            case 'On Hold': return 'bg-red-100 text-red-700';
            default: return 'bg-slate-100 text-slate-700';
        }
    }

    function renderTable() {
        const startIndex = (currentPage - 1) * itemsPerPage;
        const endIndex = startIndex + itemsPerPage;
        const pageData = filteredProjects.slice(startIndex, endIndex);

        const tbody = $('#projects-table-body');
        tbody.empty();

        if (pageData.length === 0) {
            tbody.append(`
                <tr>
                    <td colspan="6" class="px-6 py-8 text-center text-slate-500">
                        No projects found matching your search.
                    </td>
                </tr>
            `);
        } else {
            pageData.forEach(project => {
                const statusClass = getStatusColor(project.status);
                const row = `
                    <tr class="hover:bg-slate-50 transition-colors">
                        <td class="px-6 py-4 font-medium text-slate-800">${project.name}</td>
                        <td class="px-6 py-4">${project.client}</td>
                        <td class="px-6 py-4">${project.deadline}</td>
                        <td class="px-6 py-4">${project.budget}</td>
                        <td class="px-6 py-4">
                            <span class="inline-block px-2 py-1 rounded text-xs font-medium ${statusClass}">
                                ${project.status}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="project-edit.html?id=${project.id}" class="p-2 text-slate-500 hover:text-primary hover:bg-primary/10 rounded-lg transition-colors" title="Edit">
                                    <i class="ri-edit-line text-lg"></i>
                                </a>
                                <button class="p-2 text-slate-500 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors delete-project" data-id="${project.id}" title="Delete">
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
        $('#start-index').text(filteredProjects.length > 0 ? startIndex + 1 : 0);
        $('#end-index').text(Math.min(endIndex, filteredProjects.length));
        $('#total-items').text(filteredProjects.length);

        // Update Buttons
        $('#prev-page').prop('disabled', currentPage === 1);
        $('#next-page').prop('disabled', endIndex >= filteredProjects.length);
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
        if ((currentPage * itemsPerPage) < filteredProjects.length) {
            currentPage++;
            renderTable();
        }
    });

    // Search Handler
    $('#project-search').on('input', function () {
        const searchTerm = $(this).val().toLowerCase();
        filteredProjects = projects.filter(project =>
            project.name.toLowerCase().includes(searchTerm) ||
            project.client.toLowerCase().includes(searchTerm)
        );
        currentPage = 1; // Reset to first page on search
        renderTable();
    });

    // Delete Handler (Mock)
    $(document).on('click', '.delete-project', function () {
        if (confirm('Are you sure you want to delete this project?')) {
            const id = $(this).data('id');
            // In a real app, you'd make an API call here
            alert(`Project ${id} deleted (Mock Action)`);
            // Remove from local array for demo
            const index = projects.findIndex(p => p.id === id);
            if (index > -1) {
                projects.splice(index, 1);
                filteredProjects = projects; // Reset filter to reflect deletion
                renderTable();
            }
        }
    });
});
