<x-app-layout>
    @section('content')
    <main class="bg-dark">
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
                    <x-service-card></x-service-card>


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
                    <x-service-card></x-service-card>

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
                    <x-service-card></x-service-card>

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
                    <x-service-card></x-service-card>

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