<x-app-layout>
    @push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
    <style>
        .profile-image {
            position: relative;
            width: 120px;
            height: 120px;
            margin: 0 auto;
            border-radius: 50%;
            overflow: hidden;
        }

        .profile-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .upload-btn {
            position: absolute;
            bottom: 0;
            right: 0;
            width: 35px;
            height: 35px;
            background: #D4AF37;
            border: none;
            border-radius: 50%;
            color: #fff;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .upload-btn:hover {
            background: #E6B800;
            transform: scale(1.1);
        }

        /* Dark theme input styles */
        .form-control {
            background-color: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: #fff;
            padding: 0.75rem 1rem;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            background-color: rgba(255, 255, 255, 0.12);
            border-color: #D4AF37;
            box-shadow: 0 0 0 0.2rem rgba(212, 175, 55, 0.25);
            color: #fff;
        }

        .form-control:disabled {
            background-color: rgba(255, 255, 255, 0.04);
            border-color: rgba(255, 255, 255, 0.1);
            color: rgba(255, 255, 255, 0.6);
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }

        .form-group label {
            color: #fff;
            margin-bottom: 0.5rem;
            font-weight: 500;
        }

        /* Stats cards styling */
        .action-card {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 15px;
            padding: 1.5rem;
            height: 100%;
            min-height: 160px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            transition: all 0.3s ease;
        }

        .action-card:hover {
            transform: translateY(-5px);
            background: rgba(255, 255, 255, 0.08);
        }

        .action-icon {
            width: 50px;
            height: 50px;
            background: #D4AF37;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
        }

        .action-icon i {
            font-size: 1.5rem;
            color: #fff;
        }

        .action-card h4 {
            font-size: 1.5rem;
            color: #fff;
            margin: 0.5rem 0;
            font-weight: 600;
        }

        .action-card p {
            color: rgba(255, 255, 255, 0.7);
            margin: 0;
            font-size: 0.9rem;
        }
    </style>
    @endpush

    @push('scripts')
    <!-- No JavaScript needed for profile photo upload -->
    @endpush
    @section('content')
    <!-- Dashboard Section -->
    <section class="dashboard-section">
        <div class="container">
            <div class="row">
                <!-- Sidebar -->
                <div class="col-lg-3">
                    <div class="dashboard-sidebar">
                        <div class="user-profile text-center">
                            <form id="profile-photo-form" action="{{ route('profile.photo.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <div class="profile-image">
                                    <img
                                        src="{{ $user->profile_photo ? Storage::url($user->profile_photo) : asset('assets/img/default-avatar.jpg') }}"
                                        alt="Profile"
                                        class="img-fluid rounded-circle" />
                                    <input type="file" name="profile_photo" id="profile_photo" class="d-none" accept="image/*" onchange="this.form.submit()">
                                    <button type="button" class="upload-btn" title="Change Photo" onclick="document.getElementById('profile_photo').click();">
                                        <i class="fas fa-camera"></i>
                                    </button>
                                </div>
                            </form>
                            @if(session('success'))
                            <div class="alert alert-success mt-2">
                                {{ session('success') }}
                            </div>
                            @endif
                            @if($errors->any())
                            <div class="alert alert-danger mt-2">
                                {{ $errors->first() }}
                            </div>
                            @endif
                            <h4 class="mt-3">{{ $user->name }}</h4>
                            <p class="member-since">Member since {{ $user->created_at->format('F Y') }}</p>
                        </div>
                        <nav class="dashboard-nav">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a
                                        class="nav-link active"
                                        href="#overview"
                                        data-bs-toggle="tab">
                                        <i class="fas fa-th-large"></i> Dashboard Overview
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a
                                        class="nav-link"
                                        href="#appointments"
                                        data-bs-toggle="tab">
                                        <i class="fas fa-calendar-alt"></i> My Appointments
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#profile" data-bs-toggle="tab">
                                        <i class="fas fa-user-edit"></i> Profile Settings
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="col-lg-9">
                    <div class="tab-content">
                        <!-- Overview Tab -->
                        <div class="tab-pane fade show active" id="overview">
                            <div class="dashboard-header">
                                <h2>My Dashboard</h2>
                                <a href="booking.html" class="btn btn-book-appointment">
                                    <i class="fas fa-plus"></i> Book New Appointment
                                </a>
                            </div>

                            <!-- Quick Actions -->
                            <div class="quick-actions">
                                <div class="row g-4">
                                    <div class="col-md-6 col-lg-3">
                                        <div class="action-card">
                                            <div class="action-icon">
                                                <i class="fas fa-calendar-check"></i>
                                            </div>
                                            <h4>{{ $upcomingAppointments->count() }}</h4>
                                            <p>Upcoming Appointments</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="action-card">
                                            <div class="action-icon">
                                                <i class="fas fa-history"></i>
                                            </div>
                                            <h4>{{ $pastAppointments->count() }}</h4>
                                            <p>Past Appointments</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="action-card">
                                            <div class="action-icon">
                                                <i class="fas fa-check-circle"></i>
                                            </div>
                                            <h4>{{ $pastAppointments->where('status', 'completed')->count() }}</h4>
                                            <p>Completed Sessions</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="action-card">
                                            <div class="action-icon">
                                                <i class="fas fa-coins"></i>
                                            </div>
                                            <h4>{{ number_format($pastAppointments->sum('total_price'), 2) }} LKR</h4>
                                            <p>Total Spent</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Upcoming Appointments -->
                            <div class="section-card mt-4">
                                <div class="card-header">
                                    <h3>Upcoming Appointments</h3>
                                    <a
                                        href="#appointments"
                                        class="view-all"
                                        data-bs-toggle="tab">View All</a>
                                </div>
                                <div class="appointment-list">
                                    @forelse($upcomingAppointments as $appointment)
                                    <div class="appointment-item">
                                        <div class="appointment-date">
                                            <span class="date">{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('d') }}</span>
                                            <span class="month">{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('M') }}</span>
                                        </div>
                                        <div class="appointment-info">
                                            <h4>{{ $appointment->service->name }}</h4>
                                            <p><i class="fas fa-clock"></i> {{ \Carbon\Carbon::parse($appointment->appointment_time)->format('g:i A') }}</p>
                                            <p><i class="fas fa-money-bill"></i> {{ number_format($appointment->total_price, 2) }} LKR</p>
                                        </div>
                                        <div class="appointment-actions">
                                            <button class="btn btn-{{ $appointment->status === 'confirmed' ? 'reschedule' : 'cancel' }}">
                                                {{ $appointment->status === 'confirmed' ? 'Reschedule' : 'Cancel' }}
                                            </button>
                                        </div>
                                    </div>
                                    @empty
                                    <div class="text-center py-4">
                                        <p>No upcoming appointments</p>
                                        <a href="{{ route('booking') }}" class="btn btn-primary mt-2">Book Now</a>
                                    </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>

                        <!-- Appointments Tab -->
                        <div class="tab-pane fade" id="appointments">
                            <div class="dashboard-header">
                                <h2>My Appointments</h2>
                                <div class="appointment-filters">
                                    <button class="btn btn-filter active">All</button>
                                    <button class="btn btn-filter">Upcoming</button>
                                    <button class="btn btn-filter">Past</button>
                                    <button class="btn btn-filter">Cancelled</button>
                                </div>
                            </div>
                            <div class="appointments-timeline">
                                <!-- Upcoming Appointments -->
                                <div class="timeline-section mb-4">
                                    <h3>Upcoming Appointments</h3>
                                    @forelse($upcomingAppointments as $appointment)
                                    <div class="appointment-item">
                                        <div class="appointment-date">
                                            <span class="date">{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('d') }}</span>
                                            <span class="month">{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('M') }}</span>
                                        </div>
                                        <div class="appointment-info">
                                            <h4>{{ $appointment->service->name }}</h4>
                                            <p><i class="fas fa-clock"></i> {{ \Carbon\Carbon::parse($appointment->appointment_time)->format('g:i A') }}</p>
                                            <p><i class="fas fa-money-bill"></i> {{ number_format($appointment->total_price, 2) }} LKR</p>
                                            <span class="status {{ $appointment->status }}">{{ ucfirst($appointment->status) }}</span>
                                        </div>
                                        <div class="appointment-actions">
                                            @if($appointment->status === 'confirmed')
                                            <button class="btn btn-reschedule">Reschedule</button>
                                            @endif
                                            @if($appointment->status === 'pending')
                                            <button class="btn btn-cancel">Cancel</button>
                                            @endif
                                        </div>
                                    </div>
                                    @empty
                                    <div class="text-center py-4">
                                        <p>No upcoming appointments</p>
                                        <a href="{{ route('booking') }}" class="btn btn-primary mt-2">Book Now</a>
                                    </div>
                                    @endforelse
                                </div>

                                <!-- Past Appointments -->
                                <div class="timeline-section">
                                    <h3>Past Appointments</h3>
                                    @forelse($pastAppointments as $appointment)
                                    <div class="appointment-item {{ $appointment->status }}">
                                        <div class="appointment-date">
                                            <span class="date">{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('d') }}</span>
                                            <span class="month">{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('M') }}</span>
                                        </div>
                                        <div class="appointment-info">
                                            <h4>{{ $appointment->service->name }}</h4>
                                            <p><i class="fas fa-clock"></i> {{ \Carbon\Carbon::parse($appointment->appointment_time)->format('g:i A') }}</p>
                                            <p><i class="fas fa-money-bill"></i> {{ number_format($appointment->total_price, 2) }} LKR</p>
                                            <span class="status {{ $appointment->status }}">{{ ucfirst($appointment->status) }}</span>
                                        </div>
                                        <div class="appointment-actions">
                                            @if($appointment->status === 'completed')
                                            <button class="btn btn-review">Write Review</button>
                                            <button class="btn btn-rebook">Book Again</button>
                                            @endif
                                        </div>
                                    </div>
                                    @empty
                                    <div class="text-center py-4">
                                        <p>No past appointments</p>
                                    </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>

                        <!-- Profile Tab -->
                        <div class="tab-pane fade" id="profile">
                            <div class="dashboard-header">
                                <h2>Profile Settings</h2>
                            </div>
                            <div class="section-card">
                                <form id="profileForm" class="profile-form">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="firstName">Name</label>
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    id="firstName"
                                                    value="{{ $user->name }}"
                                                    disabled />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="lastName">Last Name</label>
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    id="lastName"
                                                    value="Johnson" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">Email Address</label>
                                                <input
                                                    type="email"
                                                    class="form-control"
                                                    id="email"
                                                    value="{{ $user->email }}"
                                                    disabled />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="phone">Phone Number</label>
                                                <input
                                                    type="tel"
                                                    class="form-control"
                                                    id="phone"
                                                    value="076-555-0123" />
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-save">
                                                Save Changes
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <!-- Password Change Section -->
                            <div class="section-card mt-4">
                                <h3>Change Password</h3>
                                <form id="passwordForm" class="password-form">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="currentPassword">Current Password</label>
                                                <input
                                                    type="password"
                                                    class="form-control"
                                                    id="currentPassword" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="newPassword">New Password</label>
                                                <input
                                                    type="password"
                                                    class="form-control"
                                                    id="newPassword" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="confirmNewPassword">Confirm New Password</label>
                                                <input
                                                    type="password"
                                                    class="form-control"
                                                    id="confirmNewPassword" />
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-save">
                                                Update Password
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection
</x-app-layout>