<x-app-layout>
    @push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
    <!-- Add Bootstrap CSS if not already included in the layout -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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

        /* Status badges */
        .status {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 0.8rem;
            font-weight: 500;
            margin-top: 8px;
        }

        .status.pending {
            background: #fff3e0;
            color: #e65100;
        }

        .status.confirmed {
            background: #e8f5e9;
            color: #2e7d32;
        }

        .status.cancelled {
            background: #ffebee;
            color: #c62828;
        }

        .status.completed {
            background: #e3f2fd;
            color: #1565c0;
        }

        /* Action buttons */
        .btn-cancel {
            background: #ffebee;
            color: #c62828;
            border: none;
            padding: 8px 16px;
            border-radius: 20px;
            transition: all 0.3s ease;
        }

        .btn-cancel:hover {
            background: #ef5350;
            color: white;
        }

        .btn-reschedule {
            background: #e3f2fd;
            color: #1565c0;
            border: none;
            padding: 8px 16px;
            border-radius: 20px;
            transition: all 0.3s ease;
        }

        .btn-reschedule:hover {
            background: #1e88e5;
            color: white;
        }

        .btn-review {
            background: #e8f5e9;
            color: #2e7d32;
            border: none;
            padding: 8px 16px;
            border-radius: 20px;
            transition: all 0.3s ease;
        }

        .btn-review:hover {
            background: #43a047;
            color: white;
        }

        /* Modal styles */
        .modal-content {
            background: #fff;
            border-radius: 15px;
        }

        .modal-header {
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
            padding: 1rem 1.5rem;
        }

        .modal-body {
            padding: 1.5rem;
        }

        .modal-title {
            color: #333;
            font-weight: 600;
        }

        #rescheduleForm .form-control {
            background: #fff;
            border: 1px solid rgba(0, 0, 0, 0.1);
            color: #333;
        }

        #rescheduleForm .form-control:focus {
            border-color: #1e88e5;
            box-shadow: 0 0 0 0.2rem rgba(30, 136, 229, 0.25);
        }
    </style>
    @endpush

    @push('scripts')
    <!-- Add jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            // Initialize Bootstrap modal
            const rescheduleModal = new bootstrap.Modal(document.getElementById('rescheduleModal'));

            // Handle booking cancellation
            $('.btn-cancel').click(function() {
                if (confirm('Are you sure you want to cancel this booking?')) {
                    const appointmentItem = $(this).closest('.appointment-item');
                    const bookingId = appointmentItem.data('booking-id');

                    $.ajax({
                        url: `/bookings/${bookingId}/cancel`,
                        type: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            window.location.reload();
                        },
                        error: function(error) {
                            alert('Failed to cancel booking. Please try again.');
                        }
                    });
                }
            });

            // Handle reschedule button clicks
            $('.btn-reschedule').on('click', function(e) {
                e.preventDefault();
                const appointmentItem = $(this).closest('.appointment-item');
                const bookingId = appointmentItem.data('booking-id');
                $('#rescheduleBookingId').val(bookingId);
                rescheduleModal.show();
            });

            // Handle reschedule form submission
            $('#rescheduleForm').submit(function(e) {
                e.preventDefault();
                const bookingId = $('#rescheduleBookingId').val();
                const formData = $(this).serialize();

                // Validate date is at least 2 days in future
                const selectedDate = new Date($('#appointment_date').val());
                const minDate = new Date();
                minDate.setDate(minDate.getDate() + 2);

                if (selectedDate < minDate) {
                    alert('Please select a date at least 2 days in the future.');
                    return;
                }

                $.ajax({
                    url: `/bookings/${bookingId}/reschedule`,
                    type: 'POST',
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        rescheduleModal.hide();
                        window.location.reload();
                    },
                    error: function(error) {
                        if (error.responseJSON && error.responseJSON.message) {
                            alert(error.responseJSON.message);
                        } else {
                            alert('Failed to reschedule booking. Please try again.');
                        }
                    }
                });
            });
        });
    </script>
    @endpush

    <!-- Reschedule Modal -->
    <div class="modal fade" id="rescheduleModal" tabindex="-1" aria-labelledby="rescheduleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="rescheduleModalLabel">Reschedule Appointment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="rescheduleForm">
                        @csrf
                        <input type="hidden" id="rescheduleBookingId" name="booking_id">
                        <div class="mb-3">
                            <label for="appointment_date" class="form-label">New Date</label>
                            <input type="date" class="form-control" id="appointment_date" name="appointment_date" required
                                min="{{ now()->addDays(2)->format('Y-m-d') }}">
                            <div class="form-text">Must be at least 2 days from today.</div>
                        </div>
                        <div class="mb-3">
                            <label for="appointment_time" class="form-label">New Time</label>
                            <select class="form-control" id="appointment_time" name="appointment_time" required>
                                @foreach($timeSlots as $slot)
                                <option value="{{ $slot }}">{{ date('g:i A', strtotime($slot)) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="px-0 pb-0 modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Confirm Reschedule</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @section('content')
    <!-- Dashboard Section -->
    <section class="dashboard-section">
        <div class="container">
            <div class="row">
                <!-- Sidebar -->
                <div class="col-lg-3">
                    <div class="dashboard-sidebar">
                        <div class="text-center user-profile">
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
                            <div class="mt-2 alert alert-success">
                                {{ session('success') }}
                            </div>
                            @endif
                            @if($errors->any())
                            <div class="mt-2 alert alert-danger">
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
                                <a href="{{ route('services') }}" class="btn btn-book-appointment">
                                    <i class="fas fa-plus"></i> Book New Appointment
                                </a>
                            </div>

                            <!-- Quick Actions -->
                            <div class="quick-actions">
                                <div class="row g-4">
                                    <div class="col-md-6 col-lg-3">
                                        <div class="action-card">
                                            <div class="action-icon" style="background: #2196F3;">
                                                <i class="fas fa-calendar-check"></i>
                                            </div>
                                            <h4>{{ $upcomingAppointments->count() }}</h4>
                                            <p>Upcoming Appointments</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="action-card">
                                            <div class="action-icon" style="background: #9C27B0;">
                                                <i class="fas fa-history"></i>
                                            </div>
                                            <h4>{{ $pastAppointments->count() }}</h4>
                                            <p>Past Appointments</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="action-card">
                                            <div class="action-icon" style="background: #4CAF50;">
                                                <i class="fas fa-check-circle"></i>
                                            </div>
                                            <h4>{{ $completedSessions }}</h4>
                                            <p>Completed Sessions</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="action-card">
                                            <div class="action-icon" style="background: #FF9800;">
                                                <i class="fas fa-coins"></i>
                                            </div>
                                            <h4>{{ number_format($totalSpent, 2) }} LKR</h4>
                                            <p>Total Spent</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Upcoming Appointments -->
                            <div class="mt-4 section-card">
                                <div class="card-header">
                                    <h3>Upcoming Appointments</h3>
                                    <a
                                        href="#appointments"
                                        class="view-all"
                                        data-bs-toggle="tab">View All</a>
                                </div>
                                <div class="appointment-list">
                                    @forelse($upcomingAppointments as $appointment)
                                    <div class="appointment-item" data-booking-id="{{ $appointment->id }}">
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
                                            @if($appointment->status === 'pending')
                                            <button class="btn btn-cancel">
                                                <i class="fas fa-times"></i> Cancel
                                            </button>
                                            @elseif($appointment->status === 'confirmed')
                                            <button class="btn btn-reschedule">
                                                <i class="fas fa-calendar-alt"></i> Reschedule
                                            </button>
                                            @endif
                                        </div>
                                    </div>
                                    @empty
                                    <div class="py-4 text-center">
                                        <p>No upcoming appointments</p>
                                        <a href="{{ route('services') }}" class="mt-2 btn btn-primary">Book Now</a>
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
                                <div class="mb-4 timeline-section">
                                    <h3>Upcoming Appointments</h3>
                                    @forelse($upcomingAppointments as $appointment)
                                    <div class="appointment-item" data-booking-id="{{ $appointment->id }}">
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
                                            @if($appointment->status === 'pending')
                                            <button class="btn btn-cancel">
                                                <i class="fas fa-times"></i> Cancel
                                            </button>
                                            @elseif($appointment->status === 'confirmed')
                                            <button class="btn btn-reschedule">
                                                <i class="fas fa-calendar-alt"></i> Reschedule
                                            </button>
                                            @endif
                                        </div>
                                    </div>
                                    @empty
                                    <div class="py-4 text-center">
                                        <p>No upcoming appointments</p>
                                        <a href="{{ route('services') }}" class="mt-2 btn btn-primary">Book Now</a>
                                    </div>
                                    @endforelse
                                </div>

                                <!-- Past Appointments -->
                                <div class="timeline-section">
                                    <h3>Past Appointments</h3>
                                    @forelse($pastAppointments as $appointment)
                                    <div class="appointment-item {{ $appointment->status }}" data-booking-id="{{ $appointment->id }}">
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
                                    <div class="py-4 text-center">
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
                            <div class="mt-4 section-card">
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