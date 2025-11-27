$(document).ready(function () {

    // Toggle Password Visibility
    $('#toggle-password').click(function () {
        const input = $('#password');
        const icon = $(this).find('i');

        if (input.attr('type') === 'password') {
            input.attr('type', 'text');
            icon.removeClass('ri-eye-line').addClass('ri-eye-off-line');
        } else {
            input.attr('type', 'password');
            icon.removeClass('ri-eye-off-line').addClass('ri-eye-line');
        }
    });

    // Login Form Submission
    $('#login-form').submit(function (e) {
        e.preventDefault();

        const btn = $(this).find('button[type="submit"]');
        const originalText = btn.text();

        // Disable button and show loading state
        btn.prop('disabled', true).html('<i class="ri-loader-4-line animate-spin mr-2"></i> Signing in...');

        // Simulate API call
        setTimeout(function () {
            // Success
            window.location.href = 'index.html';
        }, 1500);
    });

    // Signup Form Submission
    $('#signup-form').submit(function (e) {
        e.preventDefault();

        const password = $('#password').val();
        const confirmPassword = $('#confirm-password').val();

        if (password !== confirmPassword) {
            alert("Passwords do not match!");
            return;
        }

        const btn = $(this).find('button[type="submit"]');
        const originalText = btn.text();

        // Disable button and show loading state
        btn.prop('disabled', true).html('<i class="ri-loader-4-line animate-spin mr-2"></i> Creating account...');

        // Simulate API call
        setTimeout(function () {
            // Success
            alert("Account created successfully! Redirecting to dashboard...");
            window.location.href = 'index.html';
        }, 1500);
    });
});
