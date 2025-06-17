<x-admin-layout>
    @push('styles')
    <style>
        .bookings-page {
            padding: 40px 0;
            background: #f8f9fa;
            min-height: calc(100vh - 60px);
        }

        .data-table {
            background: white;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .status-badge {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
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

        .btn-action {
            padding: 0.25rem 0.5rem;
            font-size: 0.75rem;
            text-transform: uppercase;
            min-width: 60px;
            margin: 0 2px;
        }

        .btn-action i {
            font-size: 0.75rem;
            margin-right: 3px;
        }

        .filter-card {
            background: white;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.05);
            margin-bottom: 20px;
        }

        .form-select,
        .form-control {
            border-radius: 8px;
            border-color: #e2e8f0;
            font-size: 14px;
        }

        .form-label {
            font-size: 14px;
            font-weight: 500;
            color: #4a5568;
            margin-bottom: 0.5rem;
        }

        .filter-buttons {
            display: flex;
            gap: 0.5rem;
        }

        .filter-buttons .btn {
            padding: 0.5rem 1rem;
            font-size: 14px;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
    </style>
    @endpush

    @section('content')
    <div class="bookings-page">
        <div class="container-fluid">
            <div class="mb-4 d-flex justify-content-between align-items-center">
                <h2 class="mb-0">Manage Bookings</h2>
            </div>

            <div class="filter-card">
                <form action="{{ route('admin.bookings') }}" method="GET" class="row g-3">
                    <div class="col-md-4">
                        <label for="status" class="form-label">Booking Status</label>
                        <select name="status" id="status" class="form-select">
                            <option value="">All Bookings</option>
                            <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="confirmed" {{ request('status') === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                            <option value="cancelled" {{ request('status') === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            <option value="completed" {{ request('status') === 'completed' ? 'selected' : '' }}>Completed</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="payment_status" class="form-label">Payment Status</label>
                        <select name="payment_status" id="payment_status" class="form-select">
                            <option value="">All Payments</option>
                            <option value="paid" {{ request('payment_status') === 'paid' ? 'selected' : '' }}>Paid</option>
                            <option value="pending" {{ request('payment_status') === 'pending' ? 'selected' : '' }}>Pending</option>
                        </select>
                    </div>
                    <div class="col-md-4 d-flex align-items-end">
                        <div class="filter-buttons">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-filter"></i>Filter
                            </button>
                            <a href="{{ route('admin.bookings') }}" class="btn btn-secondary">
                                <i class="fas fa-undo"></i>Reset
                            </a>
                        </div>
                    </div>
                </form>
            </div>

            <div class="data-table">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Service</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Payment</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($bookings as $booking)
                            <tr>
                                <td>#{{ $booking->id }}</td>
                                <td>{{ $booking->full_name }}</td>
                                <td>{{ $booking->email }}</td>
                                <td>+{{ $booking->phone }}</td>
                                <td>{{ $booking->service->name }}</td>
                                <td>{{ \Carbon\Carbon::parse($booking->appointment_date)->format('M d, Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($booking->appointment_time)->format('g:i A') }}</td>
                                <td>{{ number_format($booking->total_price, 2) }} LKR</td>
                                <td>
                                    <span class="status-badge status-{{ $booking->status }}">
                                        {{ ucfirst($booking->status) }}
                                    </span>
                                </td>
                                <td>
                                    <span class="status-badge status-{{ $booking->payment_status }}">
                                        {{ ucfirst($booking->payment_status) }}
                                    </span>
                                </td>
                                <td>
                                    <div class="gap-1 d-flex justify-content-start">
                                        <a href="{{ route('admin.bookings.show', $booking->id) }}" class="btn btn-primary btn-action">
                                            <i class="fas fa-eye"></i>View
                                        </a>
                                        @if($booking->status === 'pending')
                                        <form action="{{ route('admin.bookings.confirm', $booking->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-success btn-action">
                                                <i class="fas fa-check"></i>OK
                                            </button>
                                        </form>
                                        <form action="{{ route('admin.bookings.reject', $booking->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-action">
                                                <i class="fas fa-times"></i>No
                                            </button>
                                        </form>
                                        @endif
                                        @if($booking->status !== 'cancelled')
                                        <form action="{{ route('admin.bookings.cancel', $booking->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" onclick="return confirm('Are you sure you want to cancel this booking?')" class="btn btn-warning btn-action">
                                                <i class="fas fa-ban"></i>Cancel
                                            </button>
                                        </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="9" class="text-center">No bookings found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endsection
</x-admin-layout>