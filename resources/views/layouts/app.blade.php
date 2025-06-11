<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SalonJC - Beauty Salon</title>

    <!-- favicon -->
    <link
        rel="apple-touch-icon"
        sizes="180x180"
        href="{{ asset('assets/img/favicon_io/apple-touch-icon.png') }}" />
    <link
        rel="icon"
        type="image/png"
        sizes="32x32"
        href="{{ asset('assets/img/favicon_io/favicon-32x32.png') }}" />
    <link
        rel="icon"
        type="image/png"
        sizes="16x16"
        href="./img/favicon_io/favicon-16x16.png" />
    <link rel="manifest" href="{{ asset('assets/img/favicon_io/site.webmanifest') }}" />
    <!-- Bootstrap 5 CSS -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        rel="stylesheet" />
    <!-- Font Awesome for icons -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/nav.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/footer.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/gallery.css') }}" />
    <!-- jQuery UI CSS -->
    <link
        rel="stylesheet"
        href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css" />
    <!-- Lightbox2 CSS -->
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css"
        rel="stylesheet" />

    @stack('styles')
</head>

<body>
    @include('layouts.navigation')

    @yield('content')

    <!-- Footer -->
    <footer class="footer-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <div class="footer-info">
                        <h5>Salon<span>JC</span></h5>
                        <p class="mt-3">
                            Your premier beauty destination in Pallawela,
                            offering professional services and exceptional
                            care since 2025.
                        </p>
                        <div class="social-links mt-4">
                            <a href="#" class="me-3"><i class="fab fa-facebook"></i></a>
                            <a href="#" class="me-3"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="me-3"><i class="fab fa-tiktok"></i></a>
                            <a href="#"><i class="fab fa-whatsapp"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <div class="footer-links">
                        <h5>Quick Links</h5>
                        <ul class="list-unstyled mt-3">
                            <li><a href="#home">Home</a></li>
                            <li><a href="#about">About Us</a></li>
                            <li><a href="#services">Services</a></li>
                            <li><a href="#gallery">Gallery</a></li>
                            <li><a href="#contact">Contact</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <div class="footer-services">
                        <h5>Our Services</h5>
                        <ul class="list-unstyled mt-3">
                            <li><a href="#bridal">Bridal Dressing</a></li>
                            <li><a href="#facial">Facial Treatments</a></li>
                            <li><a href="#hair">Hair Styling</a></li>
                            <li><a href="#makeup">Makeup Services</a></li>
                            <li>
                                <a href="#special">Special Occasions</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="footer-contact">
                        <h5>Contact Info</h5>
                        <ul class="list-unstyled contact-info mt-3">
                            <li>
                                <i class="fas fa-map-marker-alt"></i>
                                <span>Kaloliya Rd, Pallawela, Sri Lanka</span>
                            </li>
                            <li>
                                <i class="fas fa-phone"></i>
                                <span>071 414 7628</span>
                            </li>
                            <li>
                                <i class="fas fa-envelope"></i>
                                <span>salonjc2092@gmail.com</span>
                            </li>
                        </ul>
                        <div class="business-hours mt-4">
                            <h5>Business Hours</h5>
                            <ul class="list-unstyled hours-list mt-3">
                                <li>
                                    Monday - Saturday: 9:00 AM - 8:00 PM
                                </li>
                                <li>Sunday: 10:00 AM - 6:00 PM</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12">
                    <div class="footer-bottom text-center">
                        <hr class="footer-divider" />
                        <p class="mb-0">
                            &copy; 2025 SalonJC. All rights reserved.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Scroll to Top Button -->
    <button
        id="scrollToTop"
        class="scroll-to-top"
        aria-label="Scroll to top">
        <i class="fas fa-chevron-up"></i>
    </button>


    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js"></script>
    <!-- Typed.js -->
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <!-- Custom JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    @stack('scripts')
</body>

</html>