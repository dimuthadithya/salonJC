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
                                <div class="booking-summary mb-4">
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

                                        <div class="col-12 text-center mt-4">
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
        $(document).ready(function() {
            // Format card expiry input
            $('#card_expiry').on('input', function() {
                let value = $(this).val().replace(/\D/g, '');
                if (value.length >= 2) {
                    value = value.slice(0, 2) + '/' + value.slice(2, 4);
                }
                $(this).val(value);
            });

            // Format card number input
            $('#card_number').on('input', function() {
                $(this).val($(this).val().replace(/\D/g, ''));
            });

            // Format CVV input
            $('#card_cvv').on('input', function() {
                $(this).val($(this).val().replace(/\D/g, ''));
            });
        });
    </script>
    @endpush
</x-app-layout>