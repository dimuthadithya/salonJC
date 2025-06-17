<x-app-layout>
    @push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/booking.css') }}">
    <style>
        .is-invalid {
            border-color: #dc3545 !important;
        }

        .is-valid {
            border-color: #198754 !important;
        }

        .error-message {
            color: #dc3545;
            font-size: 0.875rem;
            margin-top: 0.25rem;
            display: none;
        }

        .error-message.show {
            display: block;
        }
    </style>
    @endpush

    @section('content')
    <main>
        <!-- Page Header -->
        <header class="booking-header">
            <div class="container">
                <div class="row">
                    <div class="text-center col-12" data-aos="fade-up">
                        <h1>Payment Details</h1>
                        <p class="lead">Complete your booking by making the payment</p>
                    </div>
                </div>
            </div>
        </header>

        <!-- Payment Form Section -->
        <section class="payment-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <!-- Booking Summary -->
                                <div class="mb-4 booking-summary">
                                    <h4>Booking Summary</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p><strong>Service:</strong> {{ $booking->service->name }}</p>
                                            <p><strong>Date:</strong> {{ $booking->appointment_date }}</p>
                                            <p><strong>Time:</strong> {{ $booking->appointment_time }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p><strong>Base Price:</strong> {{ number_format($booking->base_price, 2) }} LKR</p>
                                            <p><strong>Service Fee (3%):</strong> {{ number_format($booking->addons_price, 2) }} LKR</p>
                                            <p><strong>Total Amount:</strong> {{ number_format($booking->total_price, 2) }} LKR</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Payment Form -->
                                <form method="POST" action="{{ route('booking.payment.process', $booking->id) }}" class="payment-form">
                                    @csrf
                                    <div class="row g-3">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="card_holder">Card Holder Name *</label>
                                                <input type="text" class="form-control" id="card_holder" name="card_holder" required>
                                                @error('card_holder')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="card_number">Card Number *</label>
                                                <input type="text" class="form-control" id="card_number" name="card_number" required
                                                    pattern="\d{16}" maxlength="16" placeholder="1234567890123456">
                                                @error('card_number')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="card_expiry">Expiry Date (MM/YY) *</label>
                                                <input type="text" class="form-control" id="card_expiry" name="card_expiry" required
                                                    pattern="\d{2}/\d{2}" maxlength="5" placeholder="MM/YY">
                                                @error('card_expiry')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="card_cvv">CVV *</label>
                                                <input type="text" class="form-control" id="card_cvv" name="card_cvv" required
                                                    pattern="\d{3}" maxlength="3" placeholder="123">
                                                @error('card_cvv')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mt-4 text-center col-12">
                                            <button type="submit" class="btn btn-primary btn-lg">Pay Now</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    @endsection

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const cardNumber = document.getElementById('card_number');
            const cardExpiry = document.getElementById('card_expiry');
            const cardCvv = document.getElementById('card_cvv');
            const cardHolder = document.getElementById('card_holder');
            const form = document.querySelector('.payment-form');

            // Add error message elements
            function addErrorMessageElement(input, message) {
                const errorDiv = document.createElement('div');
                errorDiv.className = 'error-message';
                errorDiv.id = input.id + '_error';
                errorDiv.textContent = message;
                input.parentNode.appendChild(errorDiv);
            }

            // Initialize error messages
            addErrorMessageElement(cardNumber, 'Please enter a valid 16-digit card number');
            addErrorMessageElement(cardExpiry, 'Please enter a valid expiry date (MM/YY)');
            addErrorMessageElement(cardCvv, 'Please enter a valid 3-digit CVV');
            addErrorMessageElement(cardHolder, 'Please enter the card holder name');

            // Validate card number
            cardNumber.addEventListener('input', function(e) {
                this.value = this.value.replace(/\D/g, '').substring(0, 16);
                const errorElement = document.getElementById('card_number_error');

                if (this.value.length === 16) {
                    this.classList.add('is-valid');
                    this.classList.remove('is-invalid');
                    errorElement.classList.remove('show');
                } else {
                    this.classList.add('is-invalid');
                    this.classList.remove('is-valid');
                    errorElement.classList.add('show');
                }
            });

            // Validate expiry date
            cardExpiry.addEventListener('input', function(e) {
                this.value = this.value
                    .replace(/\D/g, '')
                    .replace(/^(\d{2})/, '$1/')
                    .substring(0, 5);

                const errorElement = document.getElementById('card_expiry_error');
                const pattern = /^(0[1-9]|1[0-2])\/([0-9]{2})$/;

                if (pattern.test(this.value)) {
                    const [month, year] = this.value.split('/');
                    const now = new Date();
                    const expiry = new Date(2000 + parseInt(year), parseInt(month) - 1);

                    if (expiry > now) {
                        this.classList.add('is-valid');
                        this.classList.remove('is-invalid');
                        errorElement.classList.remove('show');
                    } else {
                        this.classList.add('is-invalid');
                        this.classList.remove('is-valid');
                        errorElement.textContent = 'Card has expired';
                        errorElement.classList.add('show');
                    }
                } else {
                    this.classList.add('is-invalid');
                    this.classList.remove('is-valid');
                    errorElement.textContent = 'Please enter a valid expiry date (MM/YY)';
                    errorElement.classList.add('show');
                }
            });

            // Validate CVV
            cardCvv.addEventListener('input', function(e) {
                this.value = this.value.replace(/\D/g, '').substring(0, 3);
                const errorElement = document.getElementById('card_cvv_error');

                if (this.value.length === 3) {
                    this.classList.add('is-valid');
                    this.classList.remove('is-invalid');
                    errorElement.classList.remove('show');
                } else {
                    this.classList.add('is-invalid');
                    this.classList.remove('is-valid');
                    errorElement.classList.add('show');
                }
            });

            // Validate card holder name
            cardHolder.addEventListener('input', function(e) {
                const errorElement = document.getElementById('card_holder_error');
                const pattern = /^[a-zA-Z\s]{3,}$/;

                if (pattern.test(this.value)) {
                    this.classList.add('is-valid');
                    this.classList.remove('is-invalid');
                    errorElement.classList.remove('show');
                } else {
                    this.classList.add('is-invalid');
                    this.classList.remove('is-valid');
                    errorElement.classList.add('show');
                }
            });

            // Form submission validation
            form.addEventListener('submit', function(e) {
                const isCardNumberValid = cardNumber.value.length === 16;
                const isExpiryValid = /^(0[1-9]|1[0-2])\/([0-9]{2})$/.test(cardExpiry.value);
                const isCvvValid = cardCvv.value.length === 3;
                const isHolderValid = /^[a-zA-Z\s]{3,}$/.test(cardHolder.value);

                if (!isCardNumberValid || !isExpiryValid || !isCvvValid || !isHolderValid) {
                    e.preventDefault();

                    if (!isCardNumberValid) {
                        cardNumber.classList.add('is-invalid');
                        document.getElementById('card_number_error').classList.add('show');
                    }
                    if (!isExpiryValid) {
                        cardExpiry.classList.add('is-invalid');
                        document.getElementById('card_expiry_error').classList.add('show');
                    }
                    if (!isCvvValid) {
                        cardCvv.classList.add('is-invalid');
                        document.getElementById('card_cvv_error').classList.add('show');
                    }
                    if (!isHolderValid) {
                        cardHolder.classList.add('is-invalid');
                        document.getElementById('card_holder_error').classList.add('show');
                    }
                }
            });
        });
    </script>
    @endpush
</x-app-layout>