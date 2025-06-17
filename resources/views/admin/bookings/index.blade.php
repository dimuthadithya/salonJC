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

        .action-btn {
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 12px;
            text-transform: uppercase;
            font-weight: 600;
        }
    </style>
    @endpush

    @section('content')
    <div class="bookings-page">
        <div class="container-fluid">
            <div class="mb-4 d-flex justify-content-between align-items-center">
                <h2 class="mb-0">Manage Bookings</h2>
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
                                <th>Specialist</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($bookings as $booking)
                            <tr>
                                <td>#{{ $booking->id }}</td>
                                <td>{{ $booking->full_name }}</td>
                                <td>{{ $booking->email }}</td>
                                <td>{{ $booking->phone }}</td>
                                <td>{{ $booking->service->name }}</td>
                                <td>{{ $booking->specialist->name ?? 'Not Assigned' }}</td>
                                <td>{{ \Carbon\Carbon::parse($booking->appointment_date)->format('M d, Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($booking->appointment_time)->format('g:i A') }}</td>
                                <td>{{ number_format($booking->total_price, 2) }} LKR</td>
                                <td>
                                    <span class="status-badge status-{{ $booking->status }}">
                                        {{ ucfirst($booking->status) }}
                                    </span>
                                </td>
                                <td class="text-end">
                                    @if($booking->status === 'pending')
                                    <form action="{{ route('admin.bookings.confirm', $booking->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="action-btn btn btn-success">
                                            <i class="fas fa-check"></i> Confirm
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.bookings.reject', $booking->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="action-btn btn btn-danger">
                                            <i class="fas fa-times"></i> Reject
                                        </button>
                                    </form>
                                    @endif
                                </td>
                                <td>
                                    <span class="status-badge status-{{ $booking->payment_status }}">
                                        {{ ucfirst($booking->payment_status) }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('admin.bookings.show', $booking->id) }}"
                                        class="btn btn-sm btn-outline-primary action-btn">
                                        View
                                    </a>
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