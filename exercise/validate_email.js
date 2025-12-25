function isValidGmail(email) {
    if (!email) return false;
    return email.trim().endsWith('@gmail.com');
}

document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    if (form) {
        form.addEventListener('submit', function(e) {
            const emailInput = form.querySelector('input[name="email"]');
            if (emailInput && !isValidGmail(emailInput.value)) {
                e.preventDefault();
                alert('Email must end with @gmail.com');
                return false;
            }
        });
    }
});

