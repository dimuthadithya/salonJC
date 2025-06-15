<x-app-layout>
    @push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/booking.css') }}">
    <style>
        .success-section {
            padding: 150px 0;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        }

        .success-icon {
            width: 100px;
            height: 100px;
            background-color: #28a745;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 30px;
            animation: scaleIn 0.5s ease-in-out;
        }

        .success-icon i {
            font-size: 50px;
            color: white;
        }

        .booking-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            margin-top: 30px;
        }

        .booking-card:hover {
            transform: translateY(-5px);
        }

        .booking-details {
            padding: 30px;
        }

        .detail-row {
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }

        .detail-row:last-child {
            border-bottom: none;
        }

        .detail-label {
            color: #6c757d;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .detail-value {
            color: #212529;
            font-size: 1.1em;
        }

        .success-message {
            color: #155724;
            font-size: 2.5rem;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .status-badge {
            padding: 8px 15px;
            border-radius: 20px;
            font-size: 0.9em;
            font-weight: 600;
        }

        .status-confirmed {
            background-color: #28a745;
            color: white;
        }

        .dashboard-button {
            margin-top: 30px;
            padding: 12px 30px;
            font-size: 1.1em;
            transition: all 0.3s ease;
        }

        .dashboard-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        @keyframes scaleIn {
            0% {
                transform: scale(0);
                opacity: 0;
            }

            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        .email-notification {
            padding: 15px;
            background-color: #e8f5e9;
            border-radius: 10px;
            margin: 20px 0;
            color: #2e7d32;
        }
    </style>
    @endpush

    @section('content')
    <main class="success-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <div class="success-icon">
                        <i class="fas fa-check"></i>
                    </div>
                    <h1 class="success-message">Payment Successful!</h1>

                    <div class="booking-card">
                        <div class="booking-details">
                            <h3 class="mb-4">Booking Details</h3>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="detail-row">
                                        <div class="detail-label">Booking ID</div>
                                        <div class="detail-value">#{{ $booking->id }}</div>
                                    </div>
                                    <div class="detail-row">
                                        <div class="detail-label">Service</div>
                                        <div class="detail-value">{{ $booking->service->name }}</div>
                                    </div>
                                    <div class="detail-row">
                                        <div class="detail-label">Date</div>
                                        <div class="detail-value">{{ date('F j, Y', strtotime($booking->appointment_date)) }}</div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="detail-row">
                                        <div class="detail-label">Amount Paid</div>
                                        <div class="detail-value">{{ number_format($booking->total_price, 2) }} LKR</div>
                                    </div>
                                    <div class="detail-row">
                                        <div class="detail-label">Transaction ID</div>
                                        <div class="detail-value">{{ $booking->transaction_id }}</div>
                                    </div>
                                    <div class="detail-row">
                                        <div class="detail-label">Status</div>
                                        <div class="detail-value">
                                            <span class="status-badge status-confirmed">Confirmed</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="email-notification">
                        <i class="fas fa-envelope me-2"></i>
                        A confirmation email has been sent to {{ $booking->email }}
                    </div>

                    <p class="mt-4">Please arrive 10 minutes before your scheduled appointment time.</p>
                    <a href="{{ route('dashboard') }}" class="btn btn-primary btn-lg dashboard-button">
                        <i class="fas fa-home me-2"></i>Go to Dashboard
                    </a>
                </div>
            </div>
        </div>
    </main>
    @endsection
</x-app-layout>