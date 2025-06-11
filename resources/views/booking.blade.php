<x-app-layout>
    @push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/booking.css') }}">
    @endpush
    @section('content')
    <main>
        <!-- Page Header -->
        <header class="booking-header">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center" data-aos="fade-up">
                        <h1>Book Your Appointment</h1>
                        <p class="lead">Schedule your beauty transformation with us</p>
                    </div>
                </div>
            </div>
        </header>

        <!-- Booking Form Section -->
        <section class="booking-section">
            <div class="container">
                <div class="booking-progress mb-5">
                    <div class="progress-step active" data-step="1">
                        <div class="step-icon">
                            <i class="fas fa-user"></i>
                        </div>
                        <span>Personal Info</span>
                    </div>
                    <div class="progress-step" data-step="2">
                        <div class="step-icon">
                            <i class="fas fa-cut"></i>
                        </div>
                        <span>Select Service</span>
                    </div>
                    <div class="progress-step" data-step="3">
                        <div class="step-icon">
                            <i class="fas fa-calendar"></i>
                        </div>
                        <span>Schedule</span>
                    </div>
                    <div class="progress-step" data-step="4">
                        <div class="step-icon">
                            <i class="fas fa-credit-card"></i>
                        </div>
                        <span>Payment</span>
                    </div>
                </div>

                <form id="bookingForm" class="booking-form">
                    <!-- Step 1: Personal Information -->
                    <div class="form-step active" id="step1">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fullName">Full Name *</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="fullName"
                                        required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Phone Number *</label>
                                    <input
                                        type="tel"
                                        class="form-control"
                                        id="phone"
                                        required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email Address *</label>
                                    <input
                                        type="email"
                                        class="form-control"
                                        id="email"
                                        required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="age">Age</label>
                                    <input type="number" class="form-control" id="age" />
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="requirements">Special Requirements or Allergies</label>
                                    <textarea
                                        class="form-control"
                                        id="requirements"
                                        rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Step 2: Service Selection -->
                    <div class="form-step" id="step2">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="serviceCategory">Service Category *</label>
                                    <select class="form-control" id="serviceCategory" required>
                                        <option value="">Select a category</option>
                                        <option value="bridal">Bridal Services</option>
                                        <option value="hair">Hair Services</option>
                                        <option value="makeup">Makeup Services</option>
                                        <option value="facial">Facial Treatments</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="specificService">Specific Service *</label>
                                    <select
                                        class="form-control"
                                        id="specificService"
                                        required
                                        disabled>
                                        <option value="">Select a service</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="service-addons">
                                    <h4>Additional Services</h4>
                                    <div class="addon-options">
                                        <!-- Dynamically populated based on main service -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="price-summary card">
                                    <div class="card-body">
                                        <h4>Price Summary</h4>
                                        <div class="price-breakdown">
                                            <div class="base-price d-flex justify-content-between">
                                                <span>Base Service:</span>
                                                <span class="amount">Rs. 0.00</span>
                                            </div>
                                            <div
                                                class="addons-price d-flex justify-content-between">
                                                <span>Add-ons:</span>
                                                <span class="amount">Rs. 0.00</span>
                                            </div>
                                            <hr />
                                            <div class="total-price d-flex justify-content-between">
                                                <strong>Total:</strong>
                                                <strong class="amount">Rs. 0.00</strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Step 3: Appointment Scheduling -->
                    <div class="form-step" id="step3">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="appointmentDate">Select Date *</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="appointmentDate"
                                        required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="appointmentTime">Select Time *</label>
                                    <select
                                        class="form-control"
                                        id="appointmentTime"
                                        required
                                        disabled>
                                        <option value="">Select a time slot</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="stylist">Preferred Stylist</label>
                                    <select class="form-control" id="stylist">
                                        <option value="">No preference</option>
                                        <option value="jessica">
                                            Jessica Chen - Master Stylist
                                        </option>
                                        <option value="sarah">
                                            Sarah Johnson - Bridal Specialist
                                        </option>
                                        <option value="maria">
                                            Maria Garcia - Makeup Artist
                                        </option>
                                        <option value="emily">
                                            Emily Taylor - Color Specialist
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="alternative-slots">
                                    <h4>Alternative Time Slots</h4>
                                    <div class="slots-container">
                                        <!-- Dynamically populated -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Step 4: Payment Information -->
                    <div class="form-step" id="step4">
                        <div class="row g-4">
                            <div class="col-12">
                                <div class="payment-summary card mb-4">
                                    <div class="card-body">
                                        <h4>Booking Summary</h4>
                                        <div class="summary-details">
                                            <!-- Dynamically populated -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="paymentMethod">Payment Method *</label>
                                    <select class="form-control" id="paymentMethod" required>
                                        <option value="">Select payment method</option>
                                        <option value="cash">Cash at Salon</option>
                                        <option value="card">Credit/Debit Card</option>
                                        <option value="online">Online Payment</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-check mb-4">
                                    <input
                                        class="form-check-input"
                                        type="checkbox"
                                        id="termsAccept"
                                        required />
                                    <label class="form-check-label" for="termsAccept">
                                        I agree to the
                                        <a
                                            href="#"
                                            data-bs-toggle="modal"
                                            data-bs-target="#termsModal">terms and conditions</a>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Navigation Buttons -->
                    <div class="form-navigation mt-4">
                        <button
                            type="button"
                            class="btn btn-secondary prev-step"
                            style="display: none">
                            Previous
                        </button>
                        <button type="button" class="btn btn-primary next-step">
                            Next
                        </button>
                        <button
                            type="submit"
                            class="btn btn-success submit-booking"
                            style="display: none">
                            Confirm Booking
                        </button>
                    </div>
                </form>
            </div>
        </section>
    </main>

    <!-- Terms and Conditions Modal -->
    <div class="modal fade" id="termsModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Terms and Conditions</h5>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <!-- Terms content -->
                </div>
            </div>
        </div>
    </div>
    @endsection
</x-app-layout>