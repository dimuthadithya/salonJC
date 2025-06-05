document.addEventListener('DOMContentLoaded', function () {
  const registrationForm = document.getElementById('registrationForm');
  const passwordInputs = document.querySelectorAll('.password-input input');
  const togglePasswordButtons = document.querySelectorAll('.toggle-password');

  // Password visibility toggle
  togglePasswordButtons.forEach((button) => {
    button.addEventListener('click', function () {
      const input = this.previousElementSibling;
      const type =
        input.getAttribute('type') === 'password' ? 'text' : 'password';
      input.setAttribute('type', type);
      this.classList.toggle('fa-eye');
      this.classList.toggle('fa-eye-slash');
    });
  });

  // Form validation
  registrationForm.addEventListener('submit', function (e) {
    e.preventDefault();

    // Get form values
    const firstName = document.getElementById('firstName').value.trim();
    const lastName = document.getElementById('lastName').value.trim();
    const email = document.getElementById('email').value.trim();
    const phone = document.getElementById('phone').value.trim();
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirmPassword').value;
    const termsCheck = document.getElementById('termsCheck').checked;

    // Validation
    let isValid = true;
    let errorMessage = '';

    // Name validation
    if (firstName.length < 2) {
      errorMessage += 'First name must be at least 2 characters long\\n';
      isValid = false;
    }

    if (lastName.length < 2) {
      errorMessage += 'Last name must be at least 2 characters long\\n';
      isValid = false;
    }

    // Email validation
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
      errorMessage += 'Please enter a valid email address\\n';
      isValid = false;
    }

    // Phone validation
    const phoneRegex = /^[0-9]{10}$/;
    if (!phoneRegex.test(phone.replace(/[^0-9]/g, ''))) {
      errorMessage += 'Please enter a valid 10-digit phone number\\n';
      isValid = false;
    }

    // Password validation
    if (password.length < 8) {
      errorMessage += 'Password must be at least 8 characters long\\n';
      isValid = false;
    }

    if (password !== confirmPassword) {
      errorMessage += 'Passwords do not match\\n';
      isValid = false;
    }

    // Terms check
    if (!termsCheck) {
      errorMessage += 'Please agree to the Terms & Conditions\\n';
      isValid = false;
    }

    if (!isValid) {
      alert(errorMessage);
      return;
    }

    // If validation passes, you can submit the form
    // For now, we'll just show a success message
    alert(
      'Registration successful! Please check your email to verify your account.'
    );
    registrationForm.reset();
  });

  // Phone number formatting
  const phoneInput = document.getElementById('phone');
  phoneInput.addEventListener('input', function (e) {
    let x = e.target.value
      .replace(/\D/g, '')
      .match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
    e.target.value = !x[2]
      ? x[1]
      : !x[3]
      ? x[1] + '-' + x[2]
      : x[1] + '-' + x[2] + '-' + x[3];
  });

  // Password strength indicator (can be enhanced)
  passwordInputs[0].addEventListener('input', function () {
    const password = this.value;
    const strength = calculatePasswordStrength(password);
    // Add visual feedback based on password strength
  });

  function calculatePasswordStrength(password) {
    let strength = 0;
    if (password.length >= 8) strength++;
    if (password.match(/[a-z]+/)) strength++;
    if (password.match(/[A-Z]+/)) strength++;
    if (password.match(/[0-9]+/)) strength++;
    if (password.match(/[!@#$%^&*(),.?":{}|<>]+/)) strength++;
    return strength;
  }
});
