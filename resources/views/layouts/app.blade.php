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
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">Salon<span>JC</span></a>
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('services') }}">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-user"></i> Login</a>
                    </li>
                    <li class="nav-item ms-lg-2">
                        <a href="{{ route('booking') }}" class="nav-link book-now-nav">Book Now</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

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