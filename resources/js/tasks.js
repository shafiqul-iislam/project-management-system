import $ from 'jquery';

$(function () {
    // Open Modal
    $('#createTaskBtn').click(function () {
        $('#createTaskModal').removeClass('hidden');
    });

    // Close Modal (Button)
    $('#closeModal').click(function () {
        $('#createTaskModal').addClass('hidden');
    });

    // Close Modal (Overlay)
    $('#modalOverlay').click(function () {
        $('#createTaskModal').addClass('hidden');
    });

    // Edit Modal Open
    $('.editTaskBtn').click(function () {
        let id = $(this).data('id');
        let title = $(this).data('title');
        let description = $(this).data('description');
        let status = $(this).data('status');
        let priority = $(this).data('priority');

        // Populate Inputs
        $('#edit_id').val(id);
        $('#edit_title').val(title);
        $('#edit_description').val(description);
        $('#edit_status').val(status);
        $('#edit_priority').val(priority);

        $('#editTaskModal').removeClass('hidden');
    });

    // Close Edit Modal
    $('#closeEditModal, #editModalOverlay').click(function () {
        $('#editTaskModal').addClass('hidden');
    });
});