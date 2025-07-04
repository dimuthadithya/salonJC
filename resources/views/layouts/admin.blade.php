<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Admin</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon_io/favicon.ico') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Alert Styles */
        .alert {
            border-radius: 8px;
            border: 1px solid transparent;
            margin-bottom: 1rem;
        }

        .alert-success {
            background-color: #28A745;
            color: white;
            border-color: #1e7e34;
        }

        .alert-danger {
            background-color: #DC3545;
            color: white;
            border-color: #bd2130;
        }

        .btn-link {
            color: #D4AF37;
        }

        .btn-link:hover {
            color: #E6B800;
        }

        /* Sidebar Styles */
        .sidenav {
            width: 250px;
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            background: #2C2C2C;
            transition: 0.3s;
            z-index: 1000;
        }

        .sidenav-header {
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidenav-brand {
            color: white;
            font-size: 1.5rem;
            font-weight: 600;
            text-decoration: none;
        }

        .nav-item {
            position: relative;
        }

        .nav-link {
            padding: 15px 20px;
            color: rgba(255, 255, 255, 0.7);
            display: flex;
            align-items: center;
            text-decoration: none;
            transition: 0.3s;
        }

        .nav-link:hover {
            color: #D4AF37;
            background: rgba(255, 255, 255, 0.05);
        }

        .nav-link.active {
            color: #D4AF37;
            background: rgba(212, 175, 55, 0.1);
            border-left: 4px solid #D4AF37;
        }

        .nav-link i {
            width: 20px;
            margin-right: 10px;
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
            min-height: 100vh;
            background: #F8F6F0;
            transition: 0.3s;
        }

        .top-bar {
            background: white;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
            border-radius: 8px;
        }

        @media (max-width: 768px) {
            .sidenav {
                transform: translateX(-100%);
            }

            .sidenav.active {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .main-content.pushed {
                margin-left: 250px;
            }
        }
    </style>
    @stack('styles')
</head>

<body>
    <nav class="sidenav">
        <div class="sidenav-header">
            <a href="{{ route('admin.dashboard') }}" class="sidenav-brand"> <i class="fas fa-spa me-2" style="color: #D4AF37;"></i>
                <span style="color: #D4AF37;">SalonJC</span> Admin
            </a>
        </div>
        <ul class="mt-4 nav flex-column">
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-home"></i>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.services') }}" class="nav-link {{ request()->routeIs('admin.services*') ? 'active' : '' }}">
                    <i class="fas fa-cut"></i>
                    Services
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.bookings') }}" class="nav-link {{ request()->routeIs('admin.bookings*') ? 'active' : '' }}">
                    <i class="fas fa-calendar-check"></i>
                    Bookings
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.categories') }}" class="nav-link {{ request()->routeIs('admin.categories*') ? 'active' : '' }}">
                    <i class="fas fa-th-list"></i>
                    Categories
                </a>
            </li>
            <li class="{{ request()->is('admin/users*') ? 'active' : '' }}">
                <a href="{{ route('admin.users.index') }}" class="nav-link">
                    <i class="fas fa-users"></i> Users
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.feedback.index') }}" class="nav-link {{ request()->routeIs('admin.feedback*') ? 'active' : '' }}">
                    <i class="fas fa-comments"></i>
                    Feedbacks
                    @php
                    $pendingCount = \App\Models\Feedback::where('is_published', false)->count();
                    @endphp
                    @if($pendingCount > 0)
                    <span class="badge bg-warning text-dark ms-2">{{ $pendingCount }}</span>
                    @endif
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link" target="_blank">
                    <i class="fas fa-globe"></i>
                    Visit Website
                </a>
            </li>
            <li class="mt-4 nav-item">
                <form method="POST" action="{{ route('logout') }}" class="nav-link" style="cursor: pointer;"
                    onclick="event.preventDefault(); this.closest('form').submit();">
                    @csrf
                    <i class="fas fa-sign-out-alt"></i>
                    Logout
                </form>
            </li>
        </ul>
    </nav>

    <div class="main-content">
        <div class="top-bar">
            <button class="btn btn-link d-md-none" id="sidenavToggle">
                <i class="fas fa-bars"></i>
            </button>
            <div class="user-info">
                {{ Auth::user()->name }}
            </div>
        </div>

        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @yield('content')
    </div>



    @stack('scripts')
    <script>
        document.getElementById('sidenavToggle')?.addEventListener('click', function() {
            document.querySelector('.sidenav').classList.toggle('active');
            document.querySelector('.main-content').classList.toggle('pushed');
        });
    </script>
</body>

</html>