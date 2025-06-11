document.addEventListener('DOMContentLoaded', function () {
  // Profile Image Upload
  const uploadBtn = document.querySelector('.upload-btn');
  const profileImage = document.querySelector('.profile-image img');

  if (uploadBtn) {
    uploadBtn.addEventListener('click', function () {
      const input = document.createElement('input');
      input.type = 'file';
      input.accept = 'image/*';
      input.onchange = function (e) {
        const file = e.target.files[0];
        if (file) {
          const reader = new FileReader();
          reader.onload = function (e) {
            profileImage.src = e.target.result;
          };
          reader.readAsDataURL(file);
        }
      };
      input.click();
    });
  }

  // Appointment Actions
  const rescheduleButtons = document.querySelectorAll('.btn-reschedule');
  const cancelButtons = document.querySelectorAll('.btn-cancel');

  rescheduleButtons.forEach((button) => {
    button.addEventListener('click', function () {
      const appointmentItem = this.closest('.appointment-item');
      const appointmentInfo = appointmentItem.querySelector(
        '.appointment-info h4'
      ).textContent;
      // Here you would typically open a modal for rescheduling
      alert(`Reschedule appointment: ${appointmentInfo}`);
    });
  });

  cancelButtons.forEach((button) => {
    button.addEventListener('click', function () {
      const appointmentItem = this.closest('.appointment-item');
      const appointmentInfo = appointmentItem.querySelector(
        '.appointment-info h4'
      ).textContent;
      if (
        confirm(
          `Are you sure you want to cancel this appointment?\n${appointmentInfo}`
        )
      ) {
        appointmentItem.style.opacity = '0.5';
        // Here you would typically make an API call to cancel the appointment
      }
    });
  });

  // Profile Form Submission
  const profileForm = document.getElementById('profileForm');
  if (profileForm) {
    profileForm.addEventListener('submit', function (e) {
      e.preventDefault();
      // Here you would typically make an API call to update profile info
      alert('Profile updated successfully!');
    });
  }

  // Password Form Submission
  const passwordForm = document.getElementById('passwordForm');
  if (passwordForm) {
    passwordForm.addEventListener('submit', function (e) {
      e.preventDefault();
      const currentPassword = document.getElementById('currentPassword').value;
      const newPassword = document.getElementById('newPassword').value;
      const confirmNewPassword =
        document.getElementById('confirmNewPassword').value;

      if (newPassword !== confirmNewPassword) {
        alert('New passwords do not match!');
        return;
      }

      // Here you would typically make an API call to update the password
      alert('Password updated successfully!');
      this.reset();
    });
  }

  // Favorite Stylist Toggle
  const favoriteButtons = document.querySelectorAll('.btn-favorite');
  favoriteButtons.forEach((button) => {
    button.addEventListener('click', function () {
      this.classList.toggle('active');
      const icon = this.querySelector('i');
      icon.classList.toggle('fas');
      icon.classList.toggle('far');
    });
  });

  // Save Preferences
  const preferencesForm = document.querySelector('.preferences-list');
  if (preferencesForm) {
    const checkboxes = preferencesForm.querySelectorAll(
      'input[type="checkbox"]'
    );
    checkboxes.forEach((checkbox) => {
      checkbox.addEventListener('change', function () {
        // Here you would typically make an API call to save preferences
        const preference = this.nextElementSibling.textContent;
        const status = this.checked ? 'enabled' : 'disabled';
        console.log(`${preference} ${status}`);
      });
    });
  }

  // Special Requirements Save
  const requirementsTextarea = document.querySelector('.section-card textarea');
  const saveRequirementsBtn = document.querySelector('.section-card .btn-save');
  if (saveRequirementsBtn) {
    saveRequirementsBtn.addEventListener('click', function () {
      const requirements = requirementsTextarea.value;
      // Here you would typically make an API call to save requirements
      alert('Special requirements saved successfully!');
    });
  }

  // Logout Handler
  const logoutBtn = document.getElementById('logoutBtn');
  if (logoutBtn) {
    logoutBtn.addEventListener('click', function (e) {
      e.preventDefault();
      if (confirm('Are you sure you want to logout?')) {
        // Here you would typically handle the logout process
        window.location.href = 'login.html';
      }
    });
  }

  // Tab Navigation
  const tabs = document.querySelectorAll('.dashboard-nav .nav-link');
  tabs.forEach((tab) => {
    tab.addEventListener('click', function () {
      tabs.forEach((t) => t.classList.remove('active'));
      this.classList.add('active');
    });
  });

  // Appointment Filters
  const filterButtons = document.querySelectorAll(
    '.appointment-filters .btn-filter'
  );
  filterButtons.forEach((button) => {
    button.addEventListener('click', function () {
      filterButtons.forEach((btn) => btn.classList.remove('active'));
      this.classList.add('active');
      // Here you would typically filter the appointments based on the selected filter
    });
  });
});
