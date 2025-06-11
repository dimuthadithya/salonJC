<x-app-layout>
    @section('content')
    <main>
        <!-- Page Header -->
        <header class="service-header">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center" data-aos="fade-up">
                        <h1>Our Beauty Services</h1>
                        <p class="lead">
                            Experience luxury beauty treatments tailored just for you
                        </p>
                    </div>
                </div>
            </div>
        </header>

        <!-- Bridal Services Section -->
        <section class="service-section" id="bridal-services">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title text-center" data-aos="fade-up">
                            <span class="subtitle">Bridal Services</span>
                            <h2>Make Your Special Day Perfect</h2>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Complete Bridal Package -->
                    <div class="col-lg-6 mb-4" data-aos="fade-up">
                        <div class="service-package-card">
                            <div class="package-header">
                                <h3>Complete Bridal Package</h3>
                                <span class="price">Starting from LKR 75,000</span>
                                <span class="duration">Duration: 6-8 hours</span>
                            </div>
                            <div class="package-content">
                                <ul>
                                    <li>
                                        <i class="fas fa-check"></i> Pre-bridal facial treatment
                                    </li>
                                    <li><i class="fas fa-check"></i> Hair spa and treatment</li>
                                    <li>
                                        <i class="fas fa-check"></i> Wedding day makeup and
                                        hairstyling
                                    </li>
                                    <li>
                                        <i class="fas fa-check"></i> Dress fitting assistance
                                    </li>
                                    <li>
                                        <i class="fas fa-check"></i> Photography session support
                                    </li>
                                    <li>
                                        <i class="fas fa-check"></i> Touch-up kit for the ceremony
                                    </li>
                                </ul>
                                <button class="btn btn-book" data-package="complete-bridal">
                                    Book Package
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Engagement Package -->
                    <div class="col-lg-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-package-card">
                            <div class="package-header">
                                <h3>Engagement Package</h3>
                                <span class="price">Starting from LKR 35,000</span>
                                <span class="duration">Duration: 3-4 hours</span>
                            </div>
                            <div class="package-content">
                                <ul>
                                    <li>
                                        <i class="fas fa-check"></i> Professional makeup
                                        application
                                    </li>
                                    <li>
                                        <i class="fas fa-check"></i> Hairstyling and setting
                                    </li>
                                    <li>
                                        <i class="fas fa-check"></i> Dress coordination assistance
                                    </li>
                                    <li>
                                        <i class="fas fa-check"></i> Touch-up service during event
                                    </li>
                                    <li><i class="fas fa-check"></i> Basic facial treatment</li>
                                </ul>
                                <button class="btn btn-book" data-package="engagement">
                                    Book Package
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Beauty Treatments Section -->
        <section class="service-section bg-light" id="beauty-treatments">
            <div class="container">
                <!-- Facial Services -->
                <div class="row mb-5">
                    <div class="col-12">
                        <div class="section-title text-center" data-aos="fade-up">
                            <span class="subtitle">Facial Services</span>
                            <h2>Advanced Facial Treatments</h2>
                        </div>
                    </div>

                    <!-- Facial Service Cards -->
                    <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up">
                        <div class="service-card">
                            <div class="service-icon">
                                <i class="fas fa-spa"></i>
                            </div>
                            <h4>Deep Cleansing Facial</h4>
                            <p class="text-white-50">Complete pore cleansing and purification treatment</p>
                            <div class="service-price">
                                <span>LKR 4,500</span>
                                <small>60 mins</small>
                            </div>
                            <button class="btn btn-book">Book Now</button>
                        </div>
                    </div>

                    <div
                        class="col-lg-3 col-md-6 mb-4"
                        data-aos="fade-up"
                        data-aos-delay="100">
                        <div class="service-card">
                            <div class="service-icon">
                                <i class="fas fa-clock-rotate-left"></i>
                            </div>
                            <h4>Anti-aging Treatment</h4>
                            <p class="text-white-50">Advanced treatment to reduce fine lines and wrinkles</p>
                            <div class="service-price">
                                <span>LKR 6,500</span>
                                <small>90 mins</small>
                            </div>
                            <button class="btn btn-book">Book Now</button>
                        </div>
                    </div>

                    <div
                        class="col-lg-3 col-md-6 mb-4"
                        data-aos="fade-up"
                        data-aos-delay="200">
                        <div class="service-card">
                            <div class="service-icon">
                                <i class="fas fa-sun"></i>
                            </div>
                            <h4>Whitening Facial</h4>
                            <p class="text-white-50">Specialized treatment for skin brightening</p>
                            <div class="service-price">
                                <span>LKR 5,500</span>
                                <small>75 mins</small>
                            </div>
                            <button class="btn btn-book">Book Now</button>
                        </div>
                    </div>

                    <div
                        class="col-lg-3 col-md-6 mb-4"
                        data-aos="fade-up"
                        data-aos-delay="300">
                        <div class="service-card">
                            <div class="service-icon">
                                <i class="fas fa-flask"></i>
                            </div>
                            <h4>Acne Treatment</h4>
                            <p class="text-white-50">Specialized care for acne-prone skin</p>
                            <div class="service-price">
                                <span>LKR 4,000</span>
                                <small>60 mins</small>
                            </div>
                            <button class="btn btn-book">Book Now</button>
                        </div>
                    </div>
                </div>

                <!-- Hair Services -->
                <div class="row mb-5">
                    <div class="col-12">
                        <div class="section-title text-center" data-aos="fade-up">
                            <span class="subtitle">Hair Services</span>
                            <h2>Professional Hair Care</h2>
                        </div>
                    </div>

                    <!-- Hair Service Cards -->
                    <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up">
                        <div class="service-card">
                            <div class="service-icon">
                                <i class="fas fa-cut"></i>
                            </div>
                            <h4>Haircut & Styling</h4>
                            <p class="text-white-50">Professional cut and style by expert stylists</p>
                            <div class="service-price">
                                <span>From LKR 2,500</span>
                                <small>45-60 mins</small>
                            </div>
                            <button class="btn btn-book">Book Now</button>
                        </div>
                    </div>

                    <div
                        class="col-lg-3 col-md-6 mb-4"
                        data-aos="fade-up"
                        data-aos-delay="100">
                        <div class="service-card">
                            <div class="service-icon">
                                <i class="fas fa-paint-brush"></i>
                            </div>
                            <h4>Hair Coloring</h4>
                            <p class="text-white-50">Full color, highlights, or balayage</p>
                            <div class="service-price">
                                <span>From LKR 8,500</span>
                                <small>2-4 hours</small>
                            </div>
                            <button class="btn btn-book">Book Now</button>
                        </div>
                    </div>

                    <div
                        class="col-lg-3 col-md-6 mb-4"
                        data-aos="fade-up"
                        data-aos-delay="200">
                        <div class="service-card">
                            <div class="service-icon">
                                <i class="fas fa-wind"></i>
                            </div>
                            <h4>Hair Treatments</h4>
                            <p class="text-white-50">Rebonding, perming, and keratin treatments</p>
                            <div class="service-price">
                                <span>From LKR 12,000</span>
                                <small>3-5 hours</small>
                            </div>
                            <button class="btn btn-book">Book Now</button>
                        </div>
                    </div>

                    <div
                        class="col-lg-3 col-md-6 mb-4"
                        data-aos="fade-up"
                        data-aos-delay="300">
                        <div class="service-card">
                            <div class="service-icon">
                                <i class="fas fa-spa"></i>
                            </div>
                            <h4>Hair Spa</h4>
                            <p class="text-white-50">Luxury hair spa and conditioning treatments</p>
                            <div class="service-price">
                                <span>LKR 4,500</span>
                                <small>90 mins</small>
                            </div>
                            <button class="btn btn-book">Book Now</button>
                        </div>
                    </div>
                </div>

                <!-- Makeup Services -->
                <div class="row mb-5">
                    <div class="col-12">
                        <div class="section-title text-center" data-aos="fade-up">
                            <span class="subtitle">Makeup Services</span>
                            <h2>Professional Makeup</h2>
                        </div>
                    </div>

                    <!-- Makeup Service Cards -->
                    <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up">
                        <div class="service-card">
                            <div class="service-icon">
                                <i class="fas fa-magic"></i>
                            </div>
                            <h4>Party Makeup</h4>
                            <p class="text-white-50">Perfect look for any special occasion</p>
                            <div class="service-price">
                                <span>LKR 5,000</span>
                                <small>60 mins</small>
                            </div>
                            <button class="btn btn-book">Book Now</button>
                        </div>
                    </div>

                    <div
                        class="col-lg-3 col-md-6 mb-4"
                        data-aos="fade-up"
                        data-aos-delay="100">
                        <div class="service-card">
                            <div class="service-icon">
                                <i class="fas fa-camera"></i>
                            </div>
                            <h4>Photoshoot Makeup</h4>
                            <p class="text-white-50">Camera-ready makeup for perfect photos</p>
                            <div class="service-price">
                                <span>LKR 7,500</span>
                                <small>90 mins</small>
                            </div>
                            <button class="btn btn-book">Book Now</button>
                        </div>
                    </div>

                    <div
                        class="col-lg-3 col-md-6 mb-4"
                        data-aos="fade-up"
                        data-aos-delay="200">
                        <div class="service-card">
                            <div class="service-icon">
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                            <h4>Makeup Lessons</h4>
                            <p class="text-white-50">Learn professional makeup techniques</p>
                            <div class="service-price">
                                <span>LKR 8,500</span>
                                <small>2 hours</small>
                            </div>
                            <button class="btn btn-book">Book Now</button>
                        </div>
                    </div>

                    <div
                        class="col-lg-3 col-md-6 mb-4"
                        data-aos="fade-up"
                        data-aos-delay="300">
                        <div class="service-card">
                            <div class="service-icon">
                                <i class="fas fa-star"></i>
                            </div>
                            <h4>Professional Makeup</h4>
                            <p class="text-white-50">Full professional makeup service</p>
                            <div class="service-price">
                                <span>LKR 6,500</span>
                                <small>75 mins</small>
                            </div>
                            <button class="btn btn-book">Book Now</button>
                        </div>
                    </div>
                </div>

                <!-- Additional Services -->
                <div class="row">
                    <div class="col-12">
                        <div class="section-title text-center" data-aos="fade-up">
                            <span class="subtitle">Additional Services</span>
                            <h2>Beauty Extras</h2>
                        </div>
                    </div>

                    <!-- Additional Service Cards -->
                    <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up">
                        <div class="service-card">
                            <div class="service-icon">
                                <i class="fas fa-eye"></i>
                            </div>
                            <h4>Eyebrow Shaping</h4>
                            <p class="text-white-50">Threading and eyebrow design</p>
                            <div class="service-price">
                                <span>LKR 1,000</span>
                                <small>20 mins</small>
                            </div>
                            <button class="btn btn-book">Book Now</button>
                        </div>
                    </div>

                    <div
                        class="col-lg-3 col-md-6 mb-4"
                        data-aos="fade-up"
                        data-aos-delay="100">
                        <div class="service-card">
                            <div class="service-icon">
                                <i class="fas fa-hand-sparkles"></i>
                            </div>
                            <h4>Manicure & Pedicure</h4>
                            <p class="text-white-50">Complete nail care treatment</p>
                            <div class="service-price">
                                <span>LKR 3,500</span>
                                <small>90 mins</small>
                            </div>
                            <button class="btn btn-book">Book Now</button>
                        </div>
                    </div>

                    <div
                        class="col-lg-3 col-md-6 mb-4"
                        data-aos="fade-up"
                        data-aos-delay="200">
                        <div class="service-card">
                            <div class="service-icon">
                                <i class="fas fa-spa"></i>
                            </div>
                            <h4>Body Treatments</h4>
                            <p class="text-white-50">Relaxing body spa treatments</p>
                            <div class="service-price">
                                <span>From LKR 5,500</span>
                                <small>90 mins</small>
                            </div>
                            <button class="btn btn-book">Book Now</button>
                        </div>
                    </div>

                    <div
                        class="col-lg-3 col-md-6 mb-4"
                        data-aos="fade-up"
                        data-aos-delay="300">
                        <div class="service-card">
                            <div class="service-icon">
                                <i class="fas fa-comments"></i>
                            </div>
                            <h4>Beauty Consultation</h4>
                            <p class="text-white-50">Professional beauty advice and planning</p>
                            <div class="service-price">
                                <span>LKR 2,500</span>
                                <small>45 mins</small>
                            </div>
                            <button class="btn btn-book">Book Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Consultation CTA -->
        <section class="consultation-cta">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center" data-aos="fade-up">
                        <h2>Not Sure Which Service to Choose?</h2>
                        <p class="text-white-50">Book a free consultation with our beauty experts</p>
                        <button class="btn btn-consultation">
                            Book Free Consultation
                        </button>
                    </div>
                </div>
            </div>
        </section>
    </main>
    @endsection
</x-app-layout>