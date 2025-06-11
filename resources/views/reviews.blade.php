<x-app-layout>
    @section('content')
    <!-- Reviews Header -->
    <section class="reviews-header">
        <div class="container text-center">
            <h1>Customer Reviews & Testimonials</h1>
            <div class="overall-rating">
                <div class="rating-number">
                    <span class="number">4.8</span>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <p>Based on 256 reviews</p>
                </div>
                <div class="rating-breakdown">
                    <div class="rating-bar">
                        <span>5 Stars</span>
                        <div class="progress">
                            <div class="progress-bar" style="width: 75%"></div>
                        </div>
                        <span>192</span>
                    </div>
                    <div class="rating-bar">
                        <span>4 Stars</span>
                        <div class="progress">
                            <div class="progress-bar" style="width: 15%"></div>
                        </div>
                        <span>38</span>
                    </div>
                    <div class="rating-bar">
                        <span>3 Stars</span>
                        <div class="progress">
                            <div class="progress-bar" style="width: 7%"></div>
                        </div>
                        <span>18</span>
                    </div>
                    <div class="rating-bar">
                        <span>2 Stars</span>
                        <div class="progress">
                            <div class="progress-bar" style="width: 2%"></div>
                        </div>
                        <span>5</span>
                    </div>
                    <div class="rating-bar">
                        <span>1 Star</span>
                        <div class="progress">
                            <div class="progress-bar" style="width: 1%"></div>
                        </div>
                        <span>3</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Reviews Filter -->
    <section class="reviews-filter">
        <div class="container">
            <div class="filter-options">
                <button class="btn btn-filter active" data-category="all">
                    All Reviews
                </button>
                <button class="btn btn-filter" data-category="bridal">
                    Bridal Services
                </button>
                <button class="btn btn-filter" data-category="beauty">
                    Beauty Treatments
                </button>
                <button class="btn btn-filter" data-category="hair">
                    Hair Services
                </button>
                <button class="btn btn-filter" data-category="makeup">Makeup</button>
            </div>
            <div class="sort-options">
                <select class="form-select" id="reviewSort">
                    <option value="newest">Newest First</option>
                    <option value="highest">Highest Rated</option>
                    <option value="lowest">Lowest Rated</option>
                </select>
            </div>
        </div>
    </section>

    <!-- Reviews List -->
    <section class="reviews-list">
        <div class="container">
            <div class="row g-4" id="reviewsContainer">
                <!-- Review Items will be dynamically loaded here -->
            </div>
            <div class="text-center mt-4">
                <button class="btn btn-load-more" id="loadMoreReviews">
                    Load More Reviews
                </button>
            </div>
        </div>
    </section>

    <!-- Leave a Review Section -->
    <section class="leave-review">
        <div class="container">
            <div class="review-form-wrapper">
                <h2>Share Your Experience</h2>
                <p>
                    Your feedback helps us improve and helps others make informed
                    decisions.
                </p>
                <div id="loginPrompt" class="d-none">
                    <p>Please <a href="login.html">login</a> to leave a review.</p>
                </div>
                <form id="reviewForm" class="review-form">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="serviceType">Service Type</label>
                            <select class="form-select" id="serviceType" required>
                                <option value="">Select a service</option>
                                <option value="bridal">Bridal Services</option>
                                <option value="beauty">Beauty Treatments</option>
                                <option value="hair">Hair Services</option>
                                <option value="makeup">Makeup Services</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Rating</label>
                            <div class="rating-input">
                                <i class="far fa-star" data-rating="1"></i>
                                <i class="far fa-star" data-rating="2"></i>
                                <i class="far fa-star" data-rating="3"></i>
                                <i class="far fa-star" data-rating="4"></i>
                                <i class="far fa-star" data-rating="5"></i>
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="reviewText">Your Review</label>
                            <textarea
                                class="form-control"
                                id="reviewText"
                                rows="4"
                                required></textarea>
                        </div>
                        <div class="col-12">
                            <label for="photoUpload">Add Photos (Optional)</label>
                            <input
                                type="file"
                                class="form-control"
                                id="photoUpload"
                                multiple
                                accept="image/*" />
                            <div id="imagePreview" class="image-preview mt-2"></div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-submit-review">
                                Submit Review
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    @endsection
</x-app-layout>