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
            padding: 0.4rem;
            font-size: 14px;
            width: 32px;
            height: 32px;
            margin: 0 2px;
            border-radius: 4px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s;
        }

        .btn-action:hover {
            transform: translateY(-1px);
        }

        .btn-action i {
            font-size: 14px;
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
                <form action="{{ route('admin.bookings') }}" method="GET" class="row g-3 align-items-end">
                    <div class="col-md-8">
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
                                        <a href="{{ route('admin.bookings.show', $booking->id) }}"
                                            class="btn btn-primary btn-action"
                                            data-bs-toggle="tooltip"
                                            data-bs-title="View Details">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        @if($booking->status === 'pending')
                                        <form action="{{ route('admin.bookings.confirm', $booking->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit"
                                                class="btn btn-success btn-action"
                                                data-bs-toggle="tooltip"
                                                data-bs-title="Confirm Booking">
                                                <i class="fas fa-check"></i>
                                            </button>
                                        </form>
                                        <form action="{{ route('admin.bookings.reject', $booking->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit"
                                                class="btn btn-danger btn-action"
                                                data-bs-toggle="tooltip"
                                                data-bs-title="Reject Booking">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </form>
                                        @endif
                                        @if($booking->status === 'confirmed')
                                        <form action="{{ route('admin.bookings.complete', $booking->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit"
                                                onclick="return confirm('Are you sure you want to mark this booking as completed?')"
                                                class="btn btn-info btn-action"
                                                data-bs-toggle="tooltip"
                                                data-bs-title="Mark as Completed">
                                                <i class="fas fa-check-circle"></i>
                                            </button>
                                        </form>
                                        @endif
                                        @if($booking->status !== 'cancelled' && $booking->status !== 'completed')
                                        <form action="{{ route('admin.bookings.cancel', $booking->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit"
                                                onclick="return confirm('Are you sure you want to cancel this booking?')"
                                                class="btn btn-warning btn-action"
                                                data-bs-toggle="tooltip"
                                                data-bs-title="Cancel Booking">
                                                <i class="fas fa-ban"></i>
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

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
            const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));
        });
    </script>
    @endpush
</x-admin-layout>