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
                <form method="POST" action="{{ route('bookings.store') }}" class="booking-form">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="row g-4">
                                <!-- Personal Information -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fullName">Full Name *</label>
                                        <input type="text" class="form-control" id="fullName" name="fullName" required value="{{ old('fullName') }}" />
                                        @error('fullName')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone">Phone Number *</label>
                                        <input type="tel" class="form-control" id="phone" name="phone" required value="{{ old('phone') }}" />
                                        @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email Address *</label>
                                        <input type="email" class="form-control" id="email" name="email" required value="{{ old('email') }}" />
                                        @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="serviceCategory">Service Category *</label>
                                        <select class="form-control" id="serviceCategory" name="serviceCategory" required onchange="this.form.submit()">
                                            <option value="">Select a category</option>
                                            @foreach($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ request('serviceCategory') == $category->id ? 'selected' : 
                                                   ($selectedCategory && $selectedCategory->id == $category->id ? 'selected' : '') }}>
                                                {{ $category->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('serviceCategory')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="service">Service *</label>
                                        <select class="form-control" id="service" name="service" required {{ count($services) ? '' : 'disabled' }}>
                                            <option value="">Select a service</option>
                                            @foreach($services as $service)
                                            <option value="{{ $service->id }}"
                                                {{ request('service') == $service->id ? 'selected' : 
                                                   ($selectedService && $selectedService->id == $service->id ? 'selected' : '') }}
                                                data-price="{{ $service->price }}">
                                                {{ $service->name }} - {{ number_format($service->price, 2) }} LKR
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('service')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="appointmentDate">Preferred Date *</label>
                                        <input type="date" class="form-control" id="appointmentDate" name="appointmentDate" required min="{{ date('Y-m-d') }}" value="{{ old('appointmentDate') }}" />
                                        @error('appointmentDate')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="appointmentTime">Preferred Time *</label>
                                        <select class="form-control" id="appointmentTime" name="appointmentTime" required>
                                            <option value="">Select time</option>
                                            @foreach($timeSlots as $slot)
                                            <option value="{{ $slot }}" {{ old('appointmentTime') == $slot ? 'selected' : '' }}>
                                                {{ $slot }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('appointmentTime')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="requirements">Special Requirements or Allergies</label>
                                        <textarea class="form-control" id="requirements" name="requirements" rows="3">{{ old('requirements') }}</textarea>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="termsAccept" name="termsAccept" required {{ old('termsAccept') ? 'checked' : '' }} />
                                        <label class="form-check-label" for="termsAccept">
                                            I agree to the <a href="#" data-bs-toggle="modal" data-bs-target="#termsModal">terms and conditions</a>
                                        </label>
                                        @error('termsAccept')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-primary btn-lg">Book Appointment</button>
                                </div>
                            </div>
                        </div>
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
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>By booking an appointment with SalonJC, you agree to the following terms:</p>
                    <ul>
                        <li>Please arrive 10 minutes before your scheduled appointment time</li>
                        <li>A 24-hour notice is required for cancellation</li>
                        <li>Late arrivals may result in reduced service time</li>
                        <li>Prices may vary based on hair length and service complexity</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @push('scripts')
    <script>
        $(document).ready(function() {
            // Cache DOM elements
            const form = {
                date: $('#appointmentDate'),
                time: $('#appointmentTime'),
                category: $('#serviceCategory')
            };

            // Date handling functions
            function validateDateTime() {
                const selectedDate = form.date.val();
                const selectedTime = form.time.val();

                if (selectedDate && selectedTime) {
                    const now = new Date();
                    const selected = new Date(selectedDate + ' ' + selectedTime);

                    // Disable booking for past times
                    if (selected < now) {
                        alert('Please select a future date and time.');
                        form.time.val('');
                    }
                }
            }

            form.time.on('change', validateDateTime);

            // Handle category change to preserve other form fields
            form.category.on('change', function() {
                // Store all form values except category
                const formData = $('form.booking-form').serializeArray()
                    .filter(item => item.name !== 'serviceCategory' && item.name !== '_token');

                // Add hidden fields to preserve data during category change submission
                formData.forEach(function(item) {
                    if (item.value) {
                        $('<input>').attr({
                            type: 'hidden',
                            name: item.name,
                            value: item.value
                        }).appendTo('form.booking-form');
                    }
                });
            });

            // Form validation on final submit
            $('form.booking-form').on('submit', function(e) {
                // Don't validate if it's just changing category
                if (e.originalEvent && $(e.originalEvent.submitter).attr('id') === 'serviceCategory') {
                    return true;
                }

                const required = ['fullName', 'phone', 'email', 'serviceCategory', 'service', 'appointmentDate', 'appointmentTime'];
                let isValid = true;

                required.forEach(fieldId => {
                    const field = $(`#${fieldId}`);
                    const value = field.val();

                    if (!value || value.trim() === '') {
                        isValid = false;
                        field.addClass('is-invalid');
                    } else {
                        field.removeClass('is-invalid');
                    }
                });

                if (!$('#termsAccept').is(':checked')) {
                    isValid = false;
                    $('#termsAccept').addClass('is-invalid');
                }

                if (!isValid) {
                    e.preventDefault();
                    alert('Please fill in all required fields and accept the terms and conditions.');
                }
            });
        });
    </script>
    @endpush
</x-app-layout>