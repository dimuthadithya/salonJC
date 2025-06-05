// Sample review data (replace with actual database/API calls)
const sampleReviews = [
  {
    id: 1,
    name: 'Sarah Thompson',
    avatar: 'img/avatars/avatar1.jpg',
    date: '2023-08-15',
    rating: 5,
    service: 'bridal',
    title: 'Perfect Bridal Experience!',
    text: "I couldn't have asked for a better experience for my wedding day. The team at SalonJC was absolutely amazing. They made me feel so beautiful and confident.",
    photos: ['img/reviews/bridal1.jpg', 'img/reviews/bridal2.jpg'],
    verified: true
  }
  // Add more sample reviews here
];

let currentFilter = 'all';
let currentSort = 'newest';
let currentPage = 1;
const reviewsPerPage = 6;

// DOM Elements
const reviewsContainer = document.getElementById('reviewsContainer');
const loadMoreBtn = document.getElementById('loadMoreReviews');
const filterBtns = document.querySelectorAll('.btn-filter');
const sortSelect = document.getElementById('review-sort');
const reviewForm = document.getElementById('reviewForm');
const loginPrompt = document.getElementById('loginPrompt');
const starRating = document.querySelector('.star-rating');
const photoUpload = document.getElementById('photoUpload');
const photoPreview = document.getElementById('photoPreview');

// Check if user is logged in (replace with actual auth check)
const isLoggedIn = false; // Set this based on your authentication status

// Show/hide review form based on login status
document.addEventListener('DOMContentLoaded', () => {
  if (isLoggedIn) {
    reviewForm.style.display = 'block';
    loginPrompt.style.display = 'none';
  } else {
    reviewForm.style.display = 'none';
    loginPrompt.style.display = 'block';
  }

  loadReviews();
});

// Filter reviews
filterBtns.forEach((btn) => {
  btn.addEventListener('click', () => {
    filterBtns.forEach((b) => b.classList.remove('active'));
    btn.classList.add('active');
    currentFilter = btn.dataset.filter;
    currentPage = 1;
    loadReviews();
  });
});

// Sort reviews
sortSelect.addEventListener('change', () => {
  currentSort = sortSelect.value;
  currentPage = 1;
  loadReviews();
});

// Star rating interaction
starRating.addEventListener('mouseover', (e) => {
  if (e.target.tagName === 'I') {
    const rating = parseInt(e.target.dataset.rating);
    updateStars(rating);
  }
});

starRating.addEventListener('mouseleave', () => {
  const selectedRating = getSelectedRating();
  updateStars(selectedRating);
});

starRating.addEventListener('click', (e) => {
  if (e.target.tagName === 'I') {
    const rating = parseInt(e.target.dataset.rating);
    setSelectedRating(rating);
  }
});

function updateStars(rating) {
  const stars = starRating.children;
  for (let i = 0; i < stars.length; i++) {
    stars[i].className = i < rating ? 'fas fa-star' : 'far fa-star';
  }
}

function getSelectedRating() {
  const filledStars = starRating.querySelectorAll('.fas').length;
  return filledStars;
}

function setSelectedRating(rating) {
  updateStars(rating);
  // You can store the rating in a hidden input or variable for form submission
}

// Photo upload preview
photoUpload.addEventListener('change', handlePhotoUpload);

function handlePhotoUpload(e) {
  const files = Array.from(e.target.files);
  photoPreview.innerHTML = '';

  files.forEach((file) => {
    if (file.type.startsWith('image/')) {
      const reader = new FileReader();
      reader.onload = function (e) {
        const div = document.createElement('div');
        div.className = 'position-relative';
        div.innerHTML = `
                    <img src="${e.target.result}" class="preview-image">
                    <span class="remove-image">×</span>
                `;

        div
          .querySelector('.remove-image')
          .addEventListener('click', function () {
            div.remove();
            // Update the FileList - you'll need to handle this based on your needs
          });

        photoPreview.appendChild(div);
      };
      reader.readAsDataURL(file);
    }
  });
}

// Load reviews
function loadReviews() {
  // In a real application, this would be an API call
  let filteredReviews = sampleReviews;

  // Apply filter
  if (currentFilter !== 'all') {
    filteredReviews = filteredReviews.filter(
      (review) => review.service === currentFilter
    );
  }

  // Apply sort
  filteredReviews.sort((a, b) => {
    switch (currentSort) {
      case 'newest':
        return new Date(b.date) - new Date(a.date);
      case 'oldest':
        return new Date(a.date) - new Date(b.date);
      case 'highest':
        return b.rating - a.rating;
      case 'lowest':
        return a.rating - b.rating;
      default:
        return 0;
    }
  });

  // Pagination
  const start = (currentPage - 1) * reviewsPerPage;
  const paginatedReviews = filteredReviews.slice(start, start + reviewsPerPage);

  // Show/hide load more button
  loadMoreBtn.style.display =
    start + reviewsPerPage < filteredReviews.length ? 'block' : 'none';

  // Render reviews
  if (currentPage === 1) {
    reviewsContainer.innerHTML = '';
  }

  paginatedReviews.forEach((review) => {
    const reviewElement = createReviewElement(review);
    reviewsContainer.appendChild(reviewElement);
  });
}

// Create review element
function createReviewElement(review) {
  const col = document.createElement('div');
  col.className = 'col-md-6 col-lg-4';

  col.innerHTML = `
        <div class="review-card">
            <div class="review-header">
                <img src="${review.avatar}" alt="${
    review.name
  }" class="reviewer-avatar">
                <div class="reviewer-info">
                    <h4>${review.name}</h4>
                    <div class="stars">
                        ${createStars(review.rating)}
                    </div>
                    <span class="review-date">${formatDate(review.date)}</span>
                </div>
            </div>
            <div class="review-content">
                <h5>${review.title}</h5>
                <p>${review.text}</p>
                ${review.photos ? createPhotoGrid(review.photos) : ''}
            </div>
            ${
              review.verified
                ? '<div class="verified-badge"><i class="fas fa-check-circle"></i> Verified Visit</div>'
                : ''
            }
        </div>
    `;

  return col;
}

// Create star rating HTML
function createStars(rating) {
  return Array(5)
    .fill(0)
    .map((_, i) => `<i class="fa${i < rating ? 's' : 'r'} fa-star"></i>`)
    .join('');
}

// Format date
function formatDate(dateString) {
  const options = { year: 'numeric', month: 'long', day: 'numeric' };
  return new Date(dateString).toLocaleDateString(undefined, options);
}

// Create photo grid HTML
function createPhotoGrid(photos) {
  if (!photos || !photos.length) return '';

  return `
        <div class="review-photos">
            ${photos
              .map(
                (photo) => `
                <img src="${photo}" alt="Review photo" class="review-photo">
            `
              )
              .join('')}
        </div>
    `;
}

// Load more reviews
loadMoreBtn.addEventListener('click', () => {
  currentPage++;
  loadReviews();
});

// Form submission
reviewForm.addEventListener('submit', async (e) => {
  e.preventDefault();

  // Get form data
  const formData = new FormData();
  formData.append('rating', getSelectedRating());
  formData.append('serviceType', document.getElementById('serviceType').value);
  formData.append('title', document.getElementById('reviewTitle').value);
  formData.append('text', document.getElementById('reviewText').value);

  // Add photos
  const photoFiles = photoUpload.files;
  for (let i = 0; i < photoFiles.length; i++) {
    formData.append('photos', photoFiles[i]);
  }

  try {
    // Replace with your actual API endpoint
    const response = await fetch('/api/reviews', {
      method: 'POST',
      body: formData
    });

    if (response.ok) {
      // Show success message
      alert('Thank you for your review!');
      reviewForm.reset();
      photoPreview.innerHTML = '';
      updateStars(0);

      // Reload reviews
      currentPage = 1;
      loadReviews();
    } else {
      throw new Error('Failed to submit review');
    }
  } catch (error) {
    console.error('Error:', error);
    alert('Failed to submit review. Please try again.');
  }
});

// Image modal for review photos
document.addEventListener('click', (e) => {
  if (e.target.classList.contains('review-photo')) {
    const modal = document.createElement('div');
    modal.className = 'review-photo-modal';
    modal.innerHTML = `
            <div class="modal-content">
                <span class="close">&times;</span>
                <img src="${e.target.src}" alt="Review photo">
            </div>
        `;

    document.body.appendChild(modal);

    modal.querySelector('.close').addEventListener('click', () => {
      modal.remove();
    });

    modal.addEventListener('click', (e) => {
      if (e.target === modal) {
        modal.remove();
      }
    });
  }
});
