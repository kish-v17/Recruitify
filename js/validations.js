function validateForm() {
    let isValid = true;

    // Clear previous error messages
    document.querySelectorAll('.error').forEach(function(element) {
        element.textContent = '';
    });

    // Full Name Validation
    const fullName = document.getElementById('full-name').value;
    if (fullName.trim() === '') {
        document.getElementById('fullNameError').textContent = 'Full Name is required.';
        isValid = false;
    }

    // Email Validation
    const email = document.getElementById('email').value;
    const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if (email.trim() === '') {
        document.getElementById('emailError').textContent = 'Email is required.';
        isValid = false;
    } else if (!emailPattern.test(email)) {
        document.getElementById('emailError').textContent = 'Invalid email format.';
        isValid = false;
    }

    // Date of Birth Validation
    const dob = document.getElementById('dob').value;
    if (dob.trim() === '') {
        document.getElementById('dobError').textContent = 'Date of Birth is required.';
        isValid = false;
    }

    // Gender Validation
    const gender = document.querySelector('input[name="gender"]:checked');
    if (!gender) {
        document.getElementById('genderError').textContent = 'Gender is required.';
        isValid = false;
    }

    // Mobile Validation
    const mobile = document.getElementById('mobile').value;
    const mobilePattern = /^[0-9]{10}$/;
    if (mobile.trim() === '') {
        document.getElementById('mobileError').textContent = 'Mobile number is required.';
        isValid = false;
    } else if (!mobilePattern.test(mobile)) {
        document.getElementById('mobileError').textContent = 'Invalid mobile number.';
        isValid = false;
    }

    // Password Validation
    const password = document.getElementById('password').value;
    if (password.trim() === '') {
        document.getElementById('passwordError').textContent = 'Password is required.';
        isValid = false;
    }

    // Confirm Password Validation
    const confirmPassword = document.getElementById('conpassword').value;
    if (confirmPassword.trim() === '') {
        document.getElementById('confirmPasswordError').textContent = 'Confirm Password is required.';
        isValid = false;
    } else if (confirmPassword !== password) {
        document.getElementById('confirmPasswordError').textContent = 'Passwords do not match.';
        isValid = false;
    }

    return isValid;
}

function validatePasswords() {
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("conpassword").value;
    
    if (password !== confirmPassword) {
        alert("Passwords do not match!");
        return false;
    } else {
        alert("Passwords match!");
        return true;
    }
}
