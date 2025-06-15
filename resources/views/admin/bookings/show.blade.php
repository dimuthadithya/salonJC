<x-admin-layout>
    @push('styles')
    <style>
        .booking-page {
            padding: 40px 0;
            background: #f8f9fa;
            min-height: calc(100vh - 60px);
        }

        .booking-card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .status-badge {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
            display: inline-block;
            margin-bottom: 15px;
        }

        .status-pending {
            background: #fff3e0;
            color: #e65100;
        }

        .status-confirmed {
            background: #e8f5e9;
            color: #2e7d32;
        }

        .status-cancelled {
            background: #ffebee;
            color: #c62828;
        }

        .status-completed {
            background: #e3f2fd;
            color: #1565c0;
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

        .booking-actions {
            margin-top: 25px;
            padding-top: 25px;
            border-top: 2px solid #eee;
        }
    </style>
    @endpush

    @section('content')
    <div class="booking-page">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0">Booking Details</h2>
                <a href="{{ route('admin.bookings') }}" class="btn btn-outline-primary">
                    <i class="fas fa-arrow-left me-2"></i>Back to Bookings
                </a>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <div class="booking-card">
                        <!-- Status Badge -->
                        <span class="status-badge status-{{ $booking->status }}">
                            {{ ucfirst($booking->status) }}
                        </span>

                        <!-- Customer Details -->
                        <h4 class="mb-4">Customer Information</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="detail-row">
                                    <div class="detail-label">Full Name</div>
                                    <div class="detail-value">{{ $booking->full_name }}</div>
                                </div>
                                <div class="detail-row">
                                    <div class="detail-label">Email</div>
                                    <div class="detail-value">{{ $booking->email }}</div>
                                </div>
                                <div class="detail-row">
                                    <div class="detail-label">Phone</div>
                                    <div class="detail-value">{{ $booking->phone }}</div>
                                </div>
                            </div>
                        </div>

                        <!-- Service Details -->
                        <h4 class="mb-4 mt-4">Service Information</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="detail-row">
                                    <div class="detail-label">Category</div>
                                    <div class="detail-value">{{ $booking->category->name }}</div>
                                </div>
                                <div class="detail-row">
                                    <div class="detail-label">Service</div>
                                    <div class="detail-value">{{ $booking->service->name }}</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="detail-row">
                                    <div class="detail-label">Appointment Date</div>
                                    <div class="detail-value">{{ \Carbon\Carbon::parse($booking->appointment_date)->format('F j, Y') }}</div>
                                </div>
                                <div class="detail-row">
                                    <div class="detail-label">Appointment Time</div>
                                    <div class="detail-value">{{ \Carbon\Carbon::parse($booking->appointment_time)->format('g:i A') }}</div>
                                </div>
                            </div>
                        </div>

                        @if($booking->special_requirements)
                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="detail-row">
                                    <div class="detail-label">Special Requirements/Notes</div>
                                    <div class="detail-value">{{ $booking->special_requirements }}</div>
                                </div>
                            </div>
                        </div>
                        @endif

                        <!-- Payment Details -->
                        <h4 class="mb-4 mt-4">Payment Information</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="detail-row">
                                    <div class="detail-label">Base Price</div>
                                    <div class="detail-value">{{ number_format($booking->base_price, 2) }} LKR</div>
                                </div>
                                <div class="detail-row">
                                    <div class="detail-label">Service Fee</div>
                                    <div class="detail-value">{{ number_format($booking->addons_price, 2) }} LKR</div>
                                </div>
                                <div class="detail-row">
                                    <div class="detail-label">Total Amount</div>
                                    <div class="detail-value font-weight-bold">{{ number_format($booking->total_price, 2) }} LKR</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="detail-row">
                                    <div class="detail-label">Payment Status</div>
                                    <div class="detail-value">
                                        <span class="status-badge status-{{ $booking->payment_status }}">
                                            {{ ucfirst($booking->payment_status) }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Booking Actions -->
                        <div class="booking-actions">
                            <h4 class="mb-4">Update Booking Status</h4>
                            <form action="{{ route('admin.bookings.update-status', $booking->id) }}" method="POST" class="d-flex gap-2">
                                @csrf
                                @method('PUT')
                                <select name="status" class="form-select">
                                    <option value="pending" {{ $booking->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="confirmed" {{ $booking->status === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                    <option value="cancelled" {{ $booking->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                    <option value="completed" {{ $booking->status === 'completed' ? 'selected' : '' }}>Completed</option>
                                </select>
                                <select name="payment_status" class="form-select">
                                    <option value="pending" {{ $booking->payment_status === 'pending' ? 'selected' : '' }}>Payment Pending</option>
                                    <option value="paid" {{ $booking->payment_status === 'paid' ? 'selected' : '' }}>Paid</option>
                                    <option value="failed" {{ $booking->payment_status === 'failed' ? 'selected' : '' }}>Failed</option>
                                </select>
                                <button type="submit" class="btn btn-primary">Update Status</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
</x-admin-layout>