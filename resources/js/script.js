$(document).ready(function() {
    // Sidebar Toggle for Mobile
    $('#sidebar-toggle').click(function() {
        $('#sidebar').toggleClass('-translate-x-full');
        $('#sidebar-overlay').toggleClass('hidden');
    });

    // Close sidebar when clicking overlay
    $('#sidebar-overlay').click(function() {
        $('#sidebar').addClass('-translate-x-full');
        $('#sidebar-overlay').addClass('hidden');
    });

    // User Dropdown Toggle
    $('#user-menu-button').click(function(e) {
        e.stopPropagation();
        $('#user-dropdown').toggleClass('hidden');
    });

    // Close dropdown when clicking outside
    $(document).click(function() {
        $('#user-dropdown').addClass('hidden');
    });
});
