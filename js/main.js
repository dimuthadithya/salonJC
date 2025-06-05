$(document).ready(function () {
  // Initialize AOS
  AOS.init({
    duration: 1000,
    once: true
  });

  // Initialize Typed.js for tagline
  new Typed('#typed-tagline', {
    strings: [
      'Your Beauty Destination',
      'Expert Beauty Care',
      'Professional Styling',
      'Transform Your Look'
    ],
    typeSpeed: 50,
    backSpeed: 30,
    backDelay: 2000,
    loop: true,
    smartBackspace: true
  });

  // Initialize Typed.js for description
  new Typed('#typed-description', {
    strings: [
      'Professional Beauty Services & Bridal Packages in Pallawela',
      'Experience the Art of Beauty with Our Expert Team',
      'Premium Services Tailored to Your Style',
      'Where Beauty Meets Excellence'
    ],
    typeSpeed: 40,
    backSpeed: 20,
    backDelay: 3000,
    loop: true,
    smartBackspace: true,
    startDelay: 1000 // Delay start to let tagline begin first
  });

  // Smooth scrolling for navigation links
  $('a.nav-link, .scroll-down a').on('click', function (event) {
    if (this.hash !== '') {
      event.preventDefault();
      var hash = this.hash;
      $('html, body').animate(
        {
          scrollTop: $(hash).offset().top - 70
        },
        800,
        'easeInOutQuad'
      );
    }
  }); // Navbar background change on scroll
  $(window).scroll(function () {
    if ($(window).scrollTop() > 50) {
      $('.navbar').addClass('scrolled');
    } else {
      $('.navbar').removeClass('scrolled');
    }
  });

  // Parallax effect for hero section
  $(window).scroll(function () {
    var scrolled = $(window).scrollTop();
    $('.hero-section').css(
      'background-position',
      'center ' + -(scrolled * 0.2) + 'px'
    );
  });

  // Form submission handler
  $('#contact-form').on('submit', function (event) {
    event.preventDefault();
    // Add your form submission logic here
    alert('Thank you for your message! We will get back to you soon.');
    this.reset();
  });

  // Animation for service cards on scroll
  $(window).scroll(function () {
    $('.service-card').each(function () {
      var bottom_of_object = $(this).offset().top + $(this).outerHeight();
      var bottom_of_window = $(window).scrollTop() + $(window).height();

      if (bottom_of_window > bottom_of_object) {
        $(this).animate({ opacity: '1' }, 500);
      }
    });
  });

  // Initialize Lightbox
  lightbox.option({
    resizeDuration: 200,
    wrapAround: true,
    fadeDuration: 300,
    imageFadeDuration: 300,
    albumLabel: 'Image %1 of %2'
  });

  // Gallery tab functionality
  document.addEventListener('DOMContentLoaded', function () {
    const pills = document.querySelectorAll('.nav-pills .nav-link');
    pills.forEach((pill) => {
      pill.addEventListener('click', function (e) {
        e.preventDefault();
        // Remove active class from all pills
        pills.forEach((p) => p.classList.remove('active'));
        // Add active class to clicked pill
        this.classList.add('active');

        // Show corresponding tab content
        const target = this.getAttribute('data-bs-target').replace('#', '');
        document.querySelectorAll('.tab-pane').forEach((pane) => {
          pane.classList.remove('show', 'active');
          if (pane.id === target) {
            pane.classList.add('show', 'active');
          }
        });
      });
    });
  });

  // Counter animation for achievement boxes
  function animateCounter(element, target) {
    let current = 0;
    const increment = target / 100;
    const timer = setInterval(() => {
      current += increment;
      if (current >= target) {
        clearInterval(timer);
        current = target;
      }
      element.textContent = Math.round(current);
    }, 10);
  }

  // Initialize achievement counters when in viewport
  function initCounters() {
    const counterElements = document.querySelectorAll('.achievement-box h4');
    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            const target = parseInt(entry.target.textContent);
            animateCounter(entry.target, target);
            observer.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.5 }
    );

    counterElements.forEach((counter) => observer.observe(counter));
  }

  // Team member hover effects
  function initTeamHover() {
    const teamMembers = document.querySelectorAll('.team-member');
    teamMembers.forEach((member) => {
      member.addEventListener('mouseenter', () => {
        member.querySelector('.social-links').style.bottom = '0';
      });
      member.addEventListener('mouseleave', () => {
        member.querySelector('.social-links').style.bottom = '-50px';
      });
    });
  }

  // Testimonial cards hover effect
  function initTestimonialHover() {
    const testimonials = document.querySelectorAll('.testimonial-card');
    testimonials.forEach((card) => {
      card.addEventListener('mouseenter', () => {
        card.style.transform = 'translateY(-10px)';
      });
      card.addEventListener('mouseleave', () => {
        card.style.transform = 'translateY(0)';
      });
    });
  }

  // Contact form handling with validation and animation
  function initContactForm() {
    const form = document.getElementById('contact-form');
    if (!form) return;

    // Add animation to form elements
    const formElements = form.querySelectorAll('.form-control');
    formElements.forEach((element) => {
      element.addEventListener('focus', function () {
        this.parentElement.classList.add('focused');
      });

      element.addEventListener('blur', function () {
        if (!this.value) {
          this.parentElement.classList.remove('focused');
        }
      });
    });

    // Form submission handler
    form.addEventListener('submit', function (e) {
      e.preventDefault();

      // Basic validation
      let isValid = true;
      const requiredFields = form.querySelectorAll('[required]');

      requiredFields.forEach((field) => {
        if (!field.value.trim()) {
          isValid = false;
          field.classList.add('is-invalid');
        } else {
          field.classList.remove('is-invalid');
        }

        // Email validation
        if (field.type === 'email') {
          const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
          if (!emailPattern.test(field.value)) {
            isValid = false;
            field.classList.add('is-invalid');
          }
        }
      });

      if (isValid) {
        // Show success message
        const submitBtn = form.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;

        submitBtn.disabled = true;
        submitBtn.innerHTML =
          '<i class="fas fa-spinner fa-spin me-2"></i>Sending...';

        // Simulate form submission (replace with actual form submission)
        setTimeout(() => {
          submitBtn.innerHTML =
            '<i class="fas fa-check me-2"></i>Sent Successfully!';
          submitBtn.classList.add('btn-success');

          // Reset form after delay
          setTimeout(() => {
            form.reset();
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalText;
            submitBtn.classList.remove('btn-success');
          }, 3000);
        }, 1500);
      }
    });
  }

  // Initialize about section features
  initCounters();
  initTeamHover();
  initTestimonialHover();
  initContactForm();

  // Animate elements on scroll
  $(window).scroll(function () {
    $('.achievement-box, .team-member, .testimonial-card').each(function () {
      const position = $(this).offset().top;
      const scroll = $(window).scrollTop();
      const windowHeight = $(window).height();

      if (scroll > position - windowHeight + 100) {
        $(this).addClass('aos-animate');
      }
    });
  });

  // Add hover effects for contact info cards
  $('.contact-info-card').hover(
    function () {
      $(this).find('.icon-box').css('transform', 'rotateY(360deg)');
    },
    function () {
      $(this).find('.icon-box').css('transform', 'rotateY(0)');
    }
  );
});
