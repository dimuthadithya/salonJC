<x-app-layout>
    @section('content')
    <!-- Hero Section -->
    <section id="home" class="hero-section">
        <div class="overlay"></div>
        <div class="container h-100">
            <div
                class="row h-100 align-items-center justify-content-center">
                <div class="col-lg-10 text-center text-white hero-content">
                    <h1 class="mb-3">Welcome to Salon JC</h1>
                    <h2 class="mb-4"><span id="typed-tagline"></span></h2>
                    <p class="lead mb-4">
                        <span id="typed-description"></span>
                    </p>
                    <div class="hero-features mb-5">
                        <div class="d-flex justify-content-center gap-4">
                            <span><i class="fas fa-star me-2"></i> Expert
                                Beauticians</span>
                            <span><i class="fas fa-certificate me-2"></i>
                                Premium Products</span>
                            <span><i class="fas fa-heart me-2"></i>
                                Personalized Care</span>
                        </div>
                    </div>
                    <div
                        class="hero-cta mb-5 d-flex justify-content-center align-items-center gap-4">
                        <a href="#appointment" class="book-now-btn">Book Your Appointment Now</a>
                        <a href="#services" class="services-btn">View Our Services</a>
                    </div>
                    <div class="hero-badges">
                        <div
                            class="d-flex justify-content-center gap-4 flex-wrap">
                            <div class="badge-item">
                                <i class="fas fa-users mb-3"></i>
                                <h4>
                                    <span id="experienceCounter">10</span>+
                                </h4>
                                <p>Years Experience</p>
                            </div>
                            <div class="badge-item">
                                <i class="fas fa-smile mb-3"></i>
                                <h4>
                                    <span id="clientsCounter">1000</span>+
                                </h4>
                                <p>Happy Clients</p>
                            </div>
                            <div class="badge-item">
                                <i class="fas fa-award mb-3"></i>
                                <h4>
                                    <span id="satisfactionCounter">100</span>%
                                </h4>
                                <p>Satisfaction</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="services-section">
        <div class="container">
            <div class="section-title">
                <span class="subtitle">Our Services</span>
                <h2>Luxury Beauty Services</h2>
                <p class="text-light">
                    Experience the Art of Beauty with Our Premium Services
                </p>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-crown"></i>
                        </div>
                        <h3>Bridal Package</h3>
                        <p class="mb-4 text-white-50">
                            Complete bridal makeup, hair styling, and
                            dressing service. Make your special day even
                            more beautiful.
                        </p>
                        <div class="service-price mb-3">
                            <span class="price">Rs. 25,000</span>
                            <span class="duration">3-4 hours</span>
                        </div>
                        <a href="#appointment" class="service-btn">Book Appointment</a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="service-card featured">
                        <div class="featured-label">Popular</div>
                        <div class="service-icon">
                            <i class="fas fa-spa"></i>
                        </div>
                        <h3>Luxury Facial</h3>
                        <p class="mb-4 text-white-50">
                            Premium facial treatment with gold-infused
                            products. Includes deep cleansing, massage, and
                            mask.
                        </p>
                        <div class="service-price mb-3">
                            <span class="price">Rs. 5,000</span>
                            <span class="duration">90 min</span>
                        </div>
                        <a href="#appointment" class="service-btn">Book Appointment</a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-cut"></i>
                        </div>
                        <h3>Hair Styling</h3>
                        <p class="mb-4 text-white-50">
                            Professional haircut, styling, and treatment by
                            our expert stylists. Includes consultation.
                        </p>
                        <div class="service-price mb-3">
                            <span class="price">Rs. 2,500</span>
                            <span class="duration">60 min</span>
                        </div>
                        <a href="#appointment" class="service-btn">Book Appointment</a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-paint-brush"></i>
                        </div>
                        <h3>Makeup Service</h3>
                        <p class="mb-4 text-white-50">
                            Professional makeup application for any
                            occasion. Using premium beauty products.
                        </p>
                        <div class="service-price mb-3">
                            <span class="price">Rs. 3,500</span>
                            <span class="duration">45 min</span>
                        </div>
                        <a href="#appointment" class="service-btn">Book Appointment</a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-magic"></i>
                        </div>
                        <h3>Hair Coloring</h3>
                        <p class="mb-4 text-white-50">
                            Premium hair coloring service with ammonia-free
                            products. Includes styling.
                        </p>
                        <div class="service-price mb-3">
                            <span class="price">From Rs. 4,500</span>
                            <span class="duration">120 min</span>
                        </div>
                        <a href="#appointment" class="service-btn">Book Appointment</a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-gem"></i>
                        </div>
                        <h3>Body Treatment</h3>
                        <p class="mb-4 text-white-50">
                            Luxurious body treatment with premium oils and
                            creams. Includes massage.
                        </p>
                        <div class="service-price mb-3">
                            <span class="price">Rs. 6,000</span>
                            <span class="duration">90 min</span>
                        </div>
                        <a href="#appointment" class="service-btn">Book Appointment</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section id="gallery" class="gallery-section py-5 bg-dark text-white">
        <div class="container">
            <div class="section-title">
                <span class="subtitle">Our Gallery</span>
                <h2>Our Beautiful Transformations</h2>
                <p class="text-light-50">
                    Witness the artistry of our expert beauticians
                </p>
            </div>

            <!-- Gallery Categories -->
            <div class="gallery-filter mb-5 justify-content-center d-flex">
                <ul
                    class="nav nav-pills justify-content-center"
                    id="gallery-tabs"
                    role="tablist">
                    <li class="nav-item" role="presentation">
                        <button
                            class="nav-link active"
                            id="all-tab"
                            data-bs-toggle="pill"
                            data-bs-target="#all"
                            type="button"
                            role="tab">
                            <i class="fas fa-border-all me-2"></i>All Work
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button
                            class="nav-link"
                            id="bridal-tab"
                            data-bs-toggle="pill"
                            data-bs-target="#bridal"
                            type="button"
                            role="tab">
                            <i class="fas fa-crown me-2"></i>Bridal
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button
                            class="nav-link"
                            id="hair-tab"
                            data-bs-toggle="pill"
                            data-bs-target="#hair"
                            type="button"
                            role="tab">
                            <i class="fas fa-cut me-2"></i>Hair Styling
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button
                            class="nav-link"
                            id="makeup-tab"
                            data-bs-toggle="pill"
                            data-bs-target="#makeup"
                            type="button"
                            role="tab">
                            <i class="fas fa-magic me-2"></i>Makeup
                        </button>
                    </li>
                </ul>
            </div>

            <!-- Gallery Images -->
            <div class="tab-content" id="gallery-content">
                <!-- All Images Tab -->
                <div
                    class="tab-pane fade show active"
                    id="all"
                    role="tabpanel">
                    <div class="row g-4">
                        <div class="col-lg-4 col-md-6">
                            <div class="gallery-item">
                                <img
                                    src="{{ asset('assets/img/gallery/all-1.jpg') }}"
                                    alt="Gallery Image"
                                    class="img-fluid" />
                                <div class="gallery-overlay">
                                    <div class="overlay-content">
                                        <h4>Bridal Makeup</h4>
                                        <p>Complete Bridal Look</p>
                                        <a
                                            href="img/gallery/all-1.jpg"
                                            class="view-btn"
                                            data-lightbox="gallery">
                                            <i
                                                class="fas fa-search-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="gallery-item">
                                <img
                                    src="{{ asset('assets/img/gallery/all-2.jpg') }}"
                                    alt="Gallery Image"
                                    class="img-fluid" />
                                <div class="gallery-overlay">
                                    <div class="overlay-content">
                                        <h4>Hair Styling</h4>
                                        <p>Modern and Trendy</p>
                                        <a
                                            href="{{ asset("assets/img/gallery/all-2.jpg") }}"
                                            class="view-btn"
                                            data-lightbox="gallery">
                                            <i
                                                class="fas fa-search-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="gallery-item">
                                <img
                                    src="{{ asset('assets/img/gallery/all-3.jpg') }}"
                                    alt="Gallery Image"
                                    class="img-fluid" />
                                <div class="gallery-overlay">
                                    <div class="overlay-content">
                                        <h4>Makeup Artistry</h4>
                                        <p>Creative and Elegant</p>
                                        <a
                                            href="img/gallery/all-3.jpg"
                                            class="view-btn"
                                            data-lightbox="gallery">
                                            <i
                                                class="fas fa-search-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Bridal Tab -->
                <div class="tab-pane fade" id="bridal" role="tabpanel">
                    <div class="row g-4">
                        <div class="col-lg-4 col-md-6">
                            <div class="gallery-item">
                                <img
                                    src="{{ asset('assets/img/gallery/bridal-1.jpg') }}"
                                    alt="Bridal Image"
                                    class="img-fluid" />
                                <div class="gallery-overlay">
                                    <div class="overlay-content">
                                        <h4>Traditional Bridal</h4>
                                        <p>Complete Bridal Package</p>
                                        <a
                                            href="img/gallery/bridal-1.jpg"
                                            class="view-btn"
                                            data-lightbox="bridal">
                                            <i
                                                class="fas fa-search-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="gallery-item">
                                <img
                                    src="{{ asset('assets/img/gallery/bridal-2.jpg') }}"
                                    alt="Bridal Image"
                                    class="img-fluid" />
                                <div class="gallery-overlay">
                                    <div class="overlay-content">
                                        <h4>Modern Bridal</h4>
                                        <p>Elegant and Stylish</p>
                                        <a
                                            href="img/gallery/bridal-2.jpg"
                                            class="view-btn"
                                            data-lightbox="bridal">
                                            <i
                                                class="fas fa-search-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="gallery-item">
                                <img
                                    src="{{ asset('assets/img/gallery/bridal-3.jpg') }}"
                                    alt="Bridal Image"
                                    class="img-fluid" />
                                <div class="gallery-overlay">
                                    <div class="overlay-content">
                                        <h4>Bridal Portrait</h4>
                                        <p>Captivating and Beautiful</p>
                                        <a
                                            href="img/gallery/bridal-3.jpg"
                                            class="view-btn"
                                            data-lightbox="bridal">
                                            <i
                                                class="fas fa-search-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Hair Styling Tab -->
                <div class="tab-pane fade" id="hair" role="tabpanel">
                    <div class="row g-4">
                        <div class="col-lg-4 col-md-6">
                            <div class="gallery-item">
                                <img
                                    src="{{ asset('assets/img/gallery/hair-1.jpg') }}"
                                    alt="Hair Styling Image"
                                    class="img-fluid" />
                                <div class="gallery-overlay">
                                    <div class="overlay-content">
                                        <h4>Classic Haircut</h4>
                                        <p>Timeless and Elegant</p>
                                        <a
                                            href="img/gallery/hair-1.jpg"
                                            class="view-btn"
                                            data-lightbox="hair">
                                            <i
                                                class="fas fa-search-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="gallery-item">
                                <img
                                    src="{{ asset('assets/img/gallery/hair-2.jpg') }}"
                                    alt="Hair Styling Image"
                                    class="img-fluid" />
                                <div class="gallery-overlay">
                                    <div class="overlay-content">
                                        <h4>Modern Haircut</h4>
                                        <p>Trendy and Stylish</p>
                                        <a
                                            href="img/gallery/hair-2.jpg"
                                            class="view-btn"
                                            data-lightbox="hair">
                                            <i
                                                class="fas fa-search-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="gallery-item">
                                <img
                                    src="{{ asset('assets/img/gallery/hair-3.jpg') }}"
                                    alt="Hair Styling Image"
                                    class="img-fluid" />
                                <div class="gallery-overlay">
                                    <div class="overlay-content">
                                        <h4>Hair Coloring</h4>
                                        <p>Vibrant and Beautiful</p>
                                        <a
                                            href="img/gallery/hair-3.jpg"
                                            class="view-btn"
                                            data-lightbox="hair">
                                            <i
                                                class="fas fa-search-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Makeup Tab -->
                <div class="tab-pane fade" id="makeup" role="tabpanel">
                    <div class="row g-4">
                        <div class="col-lg-4 col-md-6">
                            <div class="gallery-item">
                                <img
                                    src="{{ asset('assets/img/gallery/makeup-1.jpg') }}"
                                    alt="Makeup Image"
                                    class="img-fluid" />
                                <div class="gallery-overlay">
                                    <div class="overlay-content">
                                        <h4>Natural Makeup</h4>
                                        <p>Fresh and Radiant</p>
                                        <a
                                            href="img/gallery/makeup-1.jpg"
                                            class="view-btn"
                                            data-lightbox="makeup">
                                            <i
                                                class="fas fa-search-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="gallery-item">
                                <img
                                    src="{{ asset('assets/img/gallery/makeup-2.jpg') }}"
                                    alt="Makeup Image"
                                    class="img-fluid" />
                                <div class="gallery-overlay">
                                    <div class="overlay-content">
                                        <h4>Bridal Makeup</h4>
                                        <p>Elegant and Timeless</p>
                                        <a
                                            href="img/gallery/makeup-2.jpg"
                                            class="view-btn"
                                            data-lightbox="makeup">
                                            <i
                                                class="fas fa-search-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="gallery-item">
                                <img
                                    src="{{ asset('assets/img/gallery/makeup-3.jpg') }}"
                                    alt="Makeup Image"
                                    class="img-fluid" />
                                <div class="gallery-overlay">
                                    <div class="overlay-content">
                                        <h4>Party Makeup</h4>
                                        <p>Bold and Beautiful</p>
                                        <a
                                            href="img/gallery/makeup-3.jpg"
                                            class="view-btn"
                                            data-lightbox="makeup">
                                            <i
                                                class="fas fa-search-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-5 bg-dark text-white">
        <div class="container">
            <!-- Main About Content -->
            <div class="section-title mb-5">
                <span class="subtitle">About Us</span>
                <h2>Welcome to SalonJC</h2>
                <p class="text-light-50">
                    Your Premier Beauty Destination in Pallawela
                </p>
            </div>

            <div class="row align-items-center mb-5">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="about-content">
                        <h3>Your Journey to Beauty</h3>
                        <p class="lead text-gold mb-4">
                            Dedicated to elevating your natural beauty since
                            2025.
                        </p>
                        <p>
                            We are committed to providing exceptional beauty
                            services in a luxurious and welcoming
                            environment. Our team of skilled professionals
                            uses premium products and advanced techniques to
                            help you achieve your desired look.
                        </p>
                        <div class="mt-4 d-flex gap-4">
                            <div class="achievement-box">
                                <i class="fas fa-award"></i>
                                <h4>10+</h4>
                                <p>Years Experience</p>
                            </div>
                            <div class="achievement-box">
                                <i class="fas fa-users"></i>
                                <h4>1000+</h4>
                                <p>Happy Clients</p>
                            </div>
                            <div class="achievement-box">
                                <i class="fas fa-certificate"></i>
                                <h4>100%</h4>
                                <p>Satisfaction</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-image">
                        <img
                            src="{{ asset('assets/img/about/salon-interior.jpg') }}"
                            alt="Salon Interior"
                            class="img-fluid rounded-3 main-image" />
                        <div class="image-grid mt-4">
                            <img
                                src="{{ asset('assets/img/about/service-1.jpg') }}"
                                alt="Beauty Service"
                                class="img-fluid rounded-3" />
                            <img
                                src="{{ asset('assets/img/about/service-2.jpg') }}"
                                alt="Beauty Service"
                                class="img-fluid rounded-3" />
                        </div>
                    </div>
                </div>
            </div>

            <!-- Team Section -->
            <div class="section-title mt-5 mb-4">
                <span class="subtitle">Our Team</span>
                <h2>Meet Our Experts</h2>
                <p class="text-light-50">
                    Dedicated professionals ready to transform your look
                </p>
            </div>

            <div class="row team-section g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="team-member">
                        <div class="member-img">
                            <img
                                src="{{ asset('assets/img/team/stylist-1.jpg') }}"
                                alt="Team Member"
                                class="img-fluid" />
                            <div class="social-links">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-tiktok"></i></a>
                            </div>
                        </div>
                        <div class="member-info">
                            <h4>Jessica Chen</h4>
                            <p>Master Stylist</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="team-member">
                        <div class="member-img">
                            <img
                                src="{{ asset('assets/img/team/stylist-2.jpg') }}"
                                alt="Team Member"
                                class="img-fluid" />
                            <div class="social-links">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-tiktok"></i></a>
                            </div>
                        </div>
                        <div class="member-info">
                            <h4>Sarah Johnson</h4>
                            <p>Bridal Specialist</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="team-member">
                        <div class="member-img">
                            <img
                                src="{{ asset('assets/img/team/stylist-3.jpg') }}"
                                alt="Team Member"
                                class="img-fluid" />
                            <div class="social-links">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-tiktok"></i></a>
                            </div>
                        </div>
                        <div class="member-info">
                            <h4>Maria Garcia</h4>
                            <p>Makeup Artist</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="team-member">
                        <div class="member-img">
                            <img
                                src="{{ asset('assets/img/team/stylist-4.jpg') }}"
                                alt="Team Member"
                                class="img-fluid" />
                            <div class="social-links">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-tiktok"></i></a>
                            </div>
                        </div>
                        <div class="member-info">
                            <h4>Emily Taylor</h4>
                            <p>Color Specialist</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Testimonials Section -->
            <div class="section-title mt-5 mb-4">
                <span class="subtitle">Testimonials</span>
                <h2>What Our Clients Say</h2>
                <p class="text-light-50">
                    Real experiences from our valued customers
                </p>
            </div>

            <div class="testimonials-slider">
                <div class="row g-4">
                    <div class="col-lg-4">
                        <div class="testimonial-card">
                            <div class="testimonial-img">
                                <img
                                    src="{{ asset('assets/img/testimonials/client-1.jpg') }}"
                                    alt="Client"
                                    class="img-fluid rounded-circle" />
                            </div>
                            <div class="testimonial-content">
                                <div class="rating mb-2">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <p>
                                    "Amazing bridal makeup service! They
                                    made me look and feel absolutely
                                    stunning on my special day. Highly
                                    recommended!"
                                </p>
                                <h5>Amanda White</h5>
                                <span>Bridal Client</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="testimonial-card">
                            <div class="testimonial-img">
                                <img
                                    src="{{ asset('assets/img/testimonials/client-2.jpg') }}"
                                    alt="Client"
                                    class="img-fluid rounded-circle" />
                            </div>
                            <div class="testimonial-content">
                                <div class="rating mb-2">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <p>
                                    "The team at SalonJC are true
                                    professionals. The hair coloring service
                                    was perfect, exactly what I wanted!"
                                </p>
                                <h5>Sophie Chen</h5>
                                <span>Regular Client</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="testimonial-card">
                            <div class="testimonial-img">
                                <img
                                    src="{{ asset('assets/img/testimonials/client-3.jpg') }}"
                                    alt="Client"
                                    class="img-fluid rounded-circle" />
                            </div>
                            <div class="testimonial-content">
                                <div class="rating mb-2">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <p>
                                    "Exceptional service every time! The
                                    facial treatments are amazing and the
                                    staff is always friendly and
                                    professional."
                                </p>
                                <h5>Rachel Kim</h5>
                                <span>Loyal Client</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-5 bg-dark text-white">
        <div class="container">
            <div class="section-title mb-5">
                <span class="subtitle">Contact Us</span>
                <h2>Get In Touch</h2>
                <p class="text-light-50">We'd Love to Hear From You</p>
            </div>

            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="contact-info-card">
                        <div class="icon-box">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <h4>Visit Us</h4>
                        <p>Kaloliya Rd, Pallawela<br />Sri Lanka</p>
                        <a
                            href="https://maps.google.com"
                            target="_blank"
                            class="direction-link">
                            <i class="fas fa-directions me-2"></i>Get
                            Directions
                        </a>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="contact-info-card">
                        <div class="icon-box">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <h4>Call Us</h4>
                        <p>071 414 7628</p>
                        <div class="business-hours">
                            <p class="mb-1">Mon - Sat: 9:00 AM - 8:00 PM</p>
                            <p>Sunday: 10:00 AM - 6:00 PM</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="contact-info-card">
                        <div class="icon-box">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <h4>Email Us</h4>
                        <p>salonjc2092@gmail.com</p>
                        <div class="social-links mt-3">
                            <a href="#" class="me-3"><i class="fab fa-facebook"></i></a>
                            <a href="#" class="me-3"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="me-3"><i class="fab fa-tiktok"></i></a>
                            <a href="#"><i class="fab fa-whatsapp"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-12 mt-5">
                    <div class="contact-form-card">
                        <form id="contact-form" class="row g-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input
                                        type="text"
                                        class="form-control"
                                        placeholder="Your Name *"
                                        required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input
                                        type="email"
                                        class="form-control"
                                        placeholder="Your Email *"
                                        required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input
                                        type="tel"
                                        class="form-control"
                                        placeholder="Your Phone" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select class="form-control" required>
                                        <option value="">
                                            Select Service *
                                        </option>
                                        <option value="Bridal Package">
                                            Bridal Package
                                        </option>
                                        <option value="Luxury Facial">
                                            Luxury Facial
                                        </option>
                                        <option value="Hair Styling">
                                            Hair Styling
                                        </option>
                                        <option value="Makeup Service">
                                            Makeup Service
                                        </option>
                                        <option value="Hair Coloring">
                                            Hair Coloring
                                        </option>
                                        <option value="Body Treatment">
                                            Body Treatment
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea
                                        class="form-control"
                                        rows="5"
                                        placeholder="Your Message *"
                                        required></textarea>
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <button
                                    type="submit"
                                    class="btn btn-primary btn-lg">
                                    <i class="fas fa-paper-plane me-2"></i>Send Message
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection
</x-app-layout>