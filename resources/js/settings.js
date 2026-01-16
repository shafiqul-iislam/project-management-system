import $ from 'jquery';

$(function () {
    // Tab Switching Logic
    function switchTab(tabId) {
        // Update Tab Buttons
        $('.tab-btn').removeClass('active border-primary text-primary').addClass('border-transparent text-slate-500 hover:text-slate-700 hover:border-slate-300');
        $(`.tab-btn[data-tab="${tabId}"]`).removeClass('border-transparent text-slate-500 hover:text-slate-700 hover:border-slate-300').addClass('active border-primary text-primary');

        // Update Tab Content
        $('.tab-content').addClass('hidden');
        $(`#${tabId}-tab`).removeClass('hidden');
    }

    $('.tab-btn').click(function () {
        const tabId = $(this).data('tab');
        switchTab(tabId);

        // Update URL without reloading
        const url = new URL(window.location);
        url.searchParams.set('tab', tabId);
        window.history.pushState({}, '', url);
    });

    // Handle URL Parameters for Tab Selection
    const urlParams = new URLSearchParams(window.location.search);
    const tabParam = urlParams.get('tab');
    if (tabParam) {
        switchTab(tabParam);
    }


});
