// Booking Page JavaScript

document.addEventListener('DOMContentLoaded', function () {
  // Initialize AOS
  AOS.init();

  // Initialize Flatpickr for date selection
  const datePickr = flatpickr('#appointmentDate', {
    minDate: 'today',
    disable: [
      function (date) {
        // Disable Sundays (0) and past dates
        return date.getDay() === 0 || date < new Date();
      }
    ],
    locale: {
      firstDayOfWeek: 1 // Start week on Monday
    }
  });

  // Service category and specific service mapping
  const serviceMap = {
    bridal: [
      { name: 'Complete Bridal Package', price: 25000, duration: '3-4 hours' },
      { name: 'Engagement Makeup', price: 15000, duration: '2 hours' },
      { name: 'Pre-Wedding Consultation', price: 5000, duration: '1 hour' }
    ],
    hair: [
      { name: 'Haircut & Styling', price: 2500, duration: '60 min' },
      { name: 'Hair Coloring', price: 4500, duration: '120 min' },
      { name: 'Hair Treatment', price: 3500, duration: '90 min' }
    ],
    makeup: [
      { name: 'Party Makeup', price: 3500, duration: '45 min' },
      { name: 'Professional Makeup', price: 4000, duration: '60 min' },
      { name: 'Fashion Makeup', price: 5000, duration: '90 min' }
    ],
    facial: [
      { name: 'Luxury Gold Facial', price: 5000, duration: '90 min' },
      { name: 'Deep Cleansing Facial', price: 3500, duration: '60 min' },
      { name: 'Anti-Aging Facial', price: 4500, duration: '75 min' }
    ]
  };

  // Handle service category change
  const categorySelect = document.getElementById('serviceCategory');
  const serviceSelect = document.getElementById('specificService');

  categorySelect.addEventListener('change', function () {
    const category = this.value;
    serviceSelect.innerHTML = '<option value="">Select a service</option>';

    if (category) {
      serviceSelect.disabled = false;
      serviceMap[category].forEach((service) => {
        const option = document.createElement('option');
        option.value = service.name;
        option.textContent = `${service.name} - Rs. ${service.price} (${service.duration})`;
        serviceSelect.appendChild(option);
      });
    } else {
      serviceSelect.disabled = true;
    }
  });

  // Multi-step form handling
  let currentStep = 1;
  const totalSteps = 4;
  const form = document.getElementById('bookingForm');
  const nextBtn = document.querySelector('.next-step');
  const prevBtn = document.querySelector('.prev-step');
  const submitBtn = document.querySelector('.submit-booking');

  function updateButtons() {
    prevBtn.style.display = currentStep === 1 ? 'none' : 'block';
    nextBtn.style.display = currentStep === totalSteps ? 'none' : 'block';
    submitBtn.style.display = currentStep === totalSteps ? 'block' : 'none';
  }

  function updateProgressBar() {
    document.querySelectorAll('.progress-step').forEach((step, index) => {
      if (index + 1 === currentStep) {
        step.classList.add('active');
      } else if (index + 1 < currentStep) {
        step.classList.add('completed');
      } else {
        step.classList.remove('active', 'completed');
      }
    });
  }

  function showStep(step) {
    document
      .querySelectorAll('.form-step')
      .forEach((s) => s.classList.remove('active'));
    document.getElementById(`step${step}`).classList.add('active');
    currentStep = step;
    updateButtons();
    updateProgressBar();
  }

  nextBtn.addEventListener('click', function () {
    if (validateStep(currentStep)) {
      if (currentStep < totalSteps) {
        showStep(currentStep + 1);
      }
    }
  });

  prevBtn.addEventListener('click', function () {
    if (currentStep > 1) {
      showStep(currentStep - 1);
    }
  });

  function validateStep(step) {
    const currentStepElement = document.getElementById(`step${step}`);
    const requiredFields = currentStepElement.querySelectorAll('[required]');
    let valid = true;

    requiredFields.forEach((field) => {
      if (!field.value) {
        valid = false;
        field.classList.add('is-invalid');
      } else {
        field.classList.remove('is-invalid');
      }
    });

    return valid;
  }

  // Handle form submission
  form.addEventListener('submit', function (e) {
    e.preventDefault();
    if (validateStep(currentStep)) {
      // Generate booking reference
      const bookingRef = 'BK' + Date.now().toString().slice(-6);

      // Here you would normally send the data to a server
      // For now, we'll just show a success message
      alert(`Booking successful! Your reference number is: ${bookingRef}`);

      // Reset form
      form.reset();
      showStep(1);
    }
  });

  // Initialize available time slots based on date selection
  document
    .getElementById('appointmentDate')
    .addEventListener('change', function () {
      const timeSelect = document.getElementById('appointmentTime');
      timeSelect.disabled = false;

      // Clear existing options
      timeSelect.innerHTML = '<option value="">Select a time slot</option>';

      // Add time slots (9 AM to 8 PM)
      for (let i = 9; i <= 20; i++) {
        const hour = i < 10 ? '0' + i : i;
        const option = document.createElement('option');
        option.value = `${hour}:00`;
        option.textContent = `${hour}:00`;
        timeSelect.appendChild(option);

        if (i < 20) {
          const halfHour = document.createElement('option');
          halfHour.value = `${hour}:30`;
          halfHour.textContent = `${hour}:30`;
          timeSelect.appendChild(halfHour);
        }
      }
    });

  // Price calculation
  function updatePrice() {
    const serviceSelect = document.getElementById('specificService');
    const selectedService = serviceSelect.options[serviceSelect.selectedIndex];

    if (selectedService && selectedService.value) {
      const basePrice = serviceMap[categorySelect.value].find(
        (service) => service.name === selectedService.value
      ).price;

      document.querySelector(
        '.base-price .amount'
      ).textContent = `Rs. ${basePrice.toLocaleString()}`;
      const total = basePrice; // Add addon prices here when implemented
      document.querySelector(
        '.total-price .amount'
      ).textContent = `Rs. ${total.toLocaleString()}`;
    }
  }

  serviceSelect.addEventListener('change', updatePrice);
});
