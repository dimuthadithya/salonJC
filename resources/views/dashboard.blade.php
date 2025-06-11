<x-app-layout>
    @section('content')
    <!-- Dashboard Section -->
    <section class="dashboard-section">
        <div class="container">
            <div class="row">
                <!-- Sidebar -->
                <div class="col-lg-3">
                    <div class="dashboard-sidebar">
                        <div class="user-profile text-center">
                            <div class="profile-image">
                                <img
                                    src="img/testimonials/client-1.jpg"
                                    alt="Profile"
                                    class="img-fluid rounded-circle" />
                                <button class="upload-btn" title="Change Photo">
                                    <i class="fas fa-camera"></i>
                                </button>
                            </div>
                            <h4 class="mt-3">Sarah Johnson</h4>
                            <p class="member-since">Member since June 2025</p>
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
                                <li class="nav-item">
                                    <a
                                        class="nav-link"
                                        href="#preferences"
                                        data-bs-toggle="tab">
                                        <i class="fas fa-sliders-h"></i> Preferences
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
                                            <h4>2</h4>
                                            <p>Upcoming Appointments</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="action-card">
                                            <div class="action-icon">
                                                <i class="fas fa-history"></i>
                                            </div>
                                            <h4>8</h4>
                                            <p>Past Appointments</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="action-card">
                                            <div class="action-icon">
                                                <i class="fas fa-tag"></i>
                                            </div>
                                            <h4>3</h4>
                                            <p>Active Offers</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="action-card">
                                            <div class="action-icon">
                                                <i class="fas fa-star"></i>
                                            </div>
                                            <h4>250</h4>
                                            <p>Loyalty Points</p>
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
                                    <div class="appointment-item">
                                        <div class="appointment-date">
                                            <span class="date">15</span>
                                            <span class="month">Jun</span>
                                        </div>
                                        <div class="appointment-info">
                                            <h4>Hair Styling & Makeup</h4>
                                            <p><i class="fas fa-clock"></i> 10:00 AM - 11:30 AM</p>
                                            <p><i class="fas fa-user"></i> with Jessica Chen</p>
                                        </div>
                                        <div class="appointment-actions">
                                            <button class="btn btn-reschedule">Reschedule</button>
                                            <button class="btn btn-cancel">Cancel</button>
                                        </div>
                                    </div>
                                    <div class="appointment-item">
                                        <div class="appointment-date">
                                            <span class="date">22</span>
                                            <span class="month">Jun</span>
                                        </div>
                                        <div class="appointment-info">
                                            <h4>Facial Treatment</h4>
                                            <p><i class="fas fa-clock"></i> 2:00 PM - 3:00 PM</p>
                                            <p><i class="fas fa-user"></i> with Maria Garcia</p>
                                        </div>
                                        <div class="appointment-actions">
                                            <button class="btn btn-reschedule">Reschedule</button>
                                            <button class="btn btn-cancel">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Special Offers -->
                            <div class="section-card mt-4">
                                <div class="card-header">
                                    <h3>Special Offers</h3>
                                </div>
                                <div class="offers-list">
                                    <div class="offer-item">
                                        <div class="offer-icon">
                                            <i class="fas fa-gift"></i>
                                        </div>
                                        <div class="offer-info">
                                            <h4>20% Off on Hair Treatments</h4>
                                            <p>Valid until June 30, 2025</p>
                                        </div>
                                        <button class="btn btn-use-offer">Use Offer</button>
                                    </div>
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
                                <div class="timeline-section">
                                    <h3>Upcoming Appointments</h3>
                                    <!-- Same appointment items as in overview -->
                                </div>

                                <!-- Past Appointments -->
                                <div class="timeline-section">
                                    <h3>Past Appointments</h3>
                                    <div class="appointment-item completed">
                                        <div class="appointment-date">
                                            <span class="date">01</span>
                                            <span class="month">Jun</span>
                                        </div>
                                        <div class="appointment-info">
                                            <h4>Hair Coloring</h4>
                                            <p><i class="fas fa-clock"></i> 11:00 AM - 1:00 PM</p>
                                            <p><i class="fas fa-user"></i> with Emily Taylor</p>
                                            <span class="status completed">Completed</span>
                                        </div>
                                        <div class="appointment-actions">
                                            <button class="btn btn-review">Write Review</button>
                                            <button class="btn btn-rebook">Book Again</button>
                                        </div>
                                    </div>
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
                                                <label for="firstName">First Name</label>
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    id="firstName"
                                                    value="Sarah" />
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
                                                    value="sarah@example.com" />
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

                        <!-- Preferences Tab -->
                        <div class="tab-pane fade" id="preferences">
                            <div class="dashboard-header">
                                <h2>My Preferences</h2>
                            </div>
                            <div class="row g-4">
                                <!-- Preferred Services -->
                                <div class="col-md-6">
                                    <div class="section-card">
                                        <h3>Preferred Services</h3>
                                        <div class="preferences-list">
                                            <div class="preference-item">
                                                <input type="checkbox" id="service1" checked />
                                                <label for="service1">Hair Styling</label>
                                            </div>
                                            <div class="preference-item">
                                                <input type="checkbox" id="service2" checked />
                                                <label for="service2">Makeup</label>
                                            </div>
                                            <div class="preference-item">
                                                <input type="checkbox" id="service3" />
                                                <label for="service3">Facial Treatments</label>
                                            </div>
                                            <div class="preference-item">
                                                <input type="checkbox" id="service4" checked />
                                                <label for="service4">Hair Coloring</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Favorite Stylists -->
                                <div class="col-md-6">
                                    <div class="section-card">
                                        <h3>Favorite Stylists</h3>
                                        <div class="stylist-list">
                                            <div class="stylist-item">
                                                <img src="img/team/stylist-1.jpg" alt="Stylist" />
                                                <div class="stylist-info">
                                                    <h4>Jessica Chen</h4>
                                                    <p>Master Stylist</p>
                                                </div>
                                                <button class="btn btn-favorite active">
                                                    <i class="fas fa-heart"></i>
                                                </button>
                                            </div>
                                            <div class="stylist-item">
                                                <img src="img/team/stylist-2.jpg" alt="Stylist" />
                                                <div class="stylist-info">
                                                    <h4>Maria Garcia</h4>
                                                    <p>Makeup Artist</p>
                                                </div>
                                                <button class="btn btn-favorite">
                                                    <i class="far fa-heart"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Communication Preferences -->
                                <div class="col-md-6">
                                    <div class="section-card">
                                        <h3>Communication Preferences</h3>
                                        <div class="preferences-list">
                                            <div class="preference-item">
                                                <input type="checkbox" id="emailNotif" checked />
                                                <label for="emailNotif">Email Notifications</label>
                                            </div>
                                            <div class="preference-item">
                                                <input type="checkbox" id="smsNotif" checked />
                                                <label for="smsNotif">SMS Notifications</label>
                                            </div>
                                            <div class="preference-item">
                                                <input type="checkbox" id="promoNotif" />
                                                <label for="promoNotif">Promotional Updates</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Special Requirements -->
                                <div class="col-md-6">
                                    <div class="section-card">
                                        <h3>Special Requirements</h3>
                                        <div class="form-group">
                                            <textarea
                                                class="form-control"
                                                rows="4"
                                                placeholder="Add any special requirements or notes here..."></textarea>
                                        </div>
                                        <button class="btn btn-save mt-3">
                                            Save Requirements
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection
</x-app-layout>