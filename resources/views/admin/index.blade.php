<x-admin-layout>
    @push('styles')
    <style>
        .admin-dashboard {
            padding: 40px 0;
            background: #f8f9fa;
            min-height: calc(100vh - 60px);
        }

        .stat-card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 20px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            margin-bottom: 15px;
        }

        .stat-icon.bookings {
            background: #e3f2fd;
            color: #1976d2;
        }

        .stat-icon.revenue {
            background: #e8f5e9;
            color: #2e7d32;
        }

        .stat-icon.services {
            background: #fff3e0;
            color: #f57c00;
        }

        .stat-icon.users {
            background: #fce4ec;
            color: #c2185b;
        }

        .stat-value {
            font-size: 24px;
            font-weight: 600;
            margin: 10px 0 5px;
        }

        .stat-label {
            color: #6c757d;
            font-size: 14px;
        }

        .data-table {
            background: white;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .data-table h3 {
            margin-bottom: 20px;
            color: #333;
        }

        .action-btn {
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 12px;
            text-transform: uppercase;
            font-weight: 600;
        }

        .status-badge {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
        }

        .status-pending {
            background: #fff3e0;
            color: #f57c00;
        }

        .status-confirmed {
            background: #e8f5e9;
            color: #2e7d32;
        }

        .status-cancelled {
            background: #ffebee;
            color: #c62828;
        }
    </style>
    @endpush

    @section('content')
    <div class="admin-dashboard">
        <div class="container">
            <!-- Page Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3">Admin Dashboard</h1>
                <div class="actions">
                    <a href="" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Add New Service
                    </a>
                </div>
            </div>

            <!-- Statistics Cards -->
            <div class="row g-4 mb-4">
                <div class="col-md-6 col-lg-3">
                    <div class="stat-card">
                        <div class="stat-icon bookings">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <div class="stat-value">{{ $todayBookings }}</div>
                        <div class="stat-label">Today's Bookings</div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="stat-card">
                        <div class="stat-icon revenue">
                            <i class="fas fa-money-bill-wave"></i>
                        </div>
                        <div class="stat-value">{{ number_format($totalRevenue, 2) }} LKR</div>
                        <div class="stat-label">Total Revenue</div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="stat-card">
                        <div class="stat-icon services">
                            <i class="fas fa-cut"></i>
                        </div>
                        <div class="stat-value">{{ $totalServices }}</div>
                        <div class="stat-label">Active Services</div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="stat-card">
                        <div class="stat-icon users">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="stat-value">{{ $totalCustomers }}</div>
                        <div class="stat-label">Total Customers</div>
                    </div>
                </div>
            </div>

            <!-- Recent Bookings Table -->
            <div class="data-table mb-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3>Recent Bookings</h3>
                    <a href="{{ route('admin.bookings') }}" class="btn btn-link">View All</a>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Booking ID</th>
                                <th>Customer</th>
                                <th>Service</th>
                                <th>Date & Time</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentBookings as $booking)
                            <tr>
                                <td>#{{ $booking->id }}</td>
                                <td>{{ $booking->full_name }}</td>
                                <td>{{ $booking->service->name }}</td>
                                <td>
                                    {{ \Carbon\Carbon::parse($booking->appointment_date)->format('M d, Y') }}
                                    <br>
                                    <small>{{ \Carbon\Carbon::parse($booking->appointment_time)->format('g:i A') }}</small>
                                </td>
                                <td>{{ number_format($booking->total_price, 2) }} LKR</td>
                                <td>
                                    <span class="status-badge status-{{ $booking->status }}">
                                        {{ ucfirst($booking->status) }}
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
                                <td colspan="7" class="text-center">No recent bookings found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Popular Services Table -->
            <div class="data-table">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3>Popular Services</h3>
                    <a href="{{ route('admin.services') }}" class="btn btn-link">Manage Services</a>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Service</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Bookings</th>
                                <th>Revenue</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($popularServices as $service)
                            <tr>
                                <td>{{ $service->name }}</td>
                                <td>{{ $service->category->name }}</td>
                                <td>{{ number_format($service->price, 2) }} LKR</td>
                                <td>{{ $service->bookings_count }}</td>
                                <td>{{ number_format($service->revenue, 2) }} LKR</td>
                                <td>
                                    <a href="{{ route('admin.services.edit', $service->id) }}"
                                        class="btn btn-sm btn-outline-primary action-btn">
                                        Edit
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center">No services found</td>
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