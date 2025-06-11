document.addEventListener('DOMContentLoaded', function () {
  const loginForm = document.getElementById('loginForm');

  if (loginForm) {
    loginForm.addEventListener('submit', function (e) {
      e.preventDefault();

      // Get form values
      const email = document.getElementById('email').value;
      const password = document.getElementById('password').value;
      const rememberMe = document.getElementById('rememberMe').checked;

      // Basic validation
      if (!email || !password) {
        alert('Please fill in all fields');
        return;
      }

      if (!isValidEmail(email)) {
        alert('Please enter a valid email address');
        return;
      }

      // Here you would typically make an API call to your backend
      // For now, we'll just simulate a successful login
      simulateLogin(email, password, rememberMe);
    });
  }

  // Email validation helper
  function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
  }

  // Simulate login process
  function simulateLogin(email, password, rememberMe) {
    // Show loading state
    const submitButton = loginForm.querySelector('button[type="submit"]');
    const originalText = submitButton.textContent;
    submitButton.disabled = true;
    submitButton.innerHTML =
      '<i class="fas fa-spinner fa-spin"></i> Logging in...';

    // Simulate API call
    setTimeout(() => {
      // Reset button state
      submitButton.disabled = false;
      submitButton.textContent = originalText;

      // Redirect to booking page or dashboard
      // This should be replaced with actual authentication logic
      window.location.href = 'booking.html';
    }, 1500);
  }

  // Password visibility toggle
  const passwordInput = document.getElementById('password');
  if (passwordInput) {
    const togglePassword = document.createElement('span');
    togglePassword.innerHTML = '<i class="fas fa-eye"></i>';
    togglePassword.className = 'password-toggle';
    togglePassword.style.cursor = 'pointer';
    togglePassword.style.position = 'absolute';
    togglePassword.style.right = '10px';
    togglePassword.style.top = '50%';
    togglePassword.style.transform = 'translateY(-50%)';
    togglePassword.style.color = '#666';

    passwordInput.parentElement.style.position = 'relative';
    passwordInput.parentElement.appendChild(togglePassword);

    togglePassword.addEventListener('click', function () {
      const type =
        passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
      passwordInput.setAttribute('type', type);
      togglePassword.innerHTML =
        type === 'password'
          ? '<i class="fas fa-eye"></i>'
          : '<i class="fas fa-eye-slash"></i>';
    });
  }
});
