<x-admin-layout>
    @push('styles')
    <style>
        .services-page {
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

        .status-active {
            background: #e8f5e9;
            color: #2e7d32;
        }

        .status-inactive {
            background: #ffebee;
            color: #c62828;
        }
    </style>
    @endpush

    @section('content')
    <div class="services-page">
        <div class="container">
            <!-- Page Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3">Manage Services</h1>
                <div class="actions">
                    <a href="{{ route('admin.services.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Add New Service
                    </a>
                </div>
            </div>

            <!-- Services Table -->
            <div class="data-table">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Service</th>
                                <th>Category</th>
                                <th>Duration</th>
                                <th>Price</th>
                                <th>Bookings</th>
                                <th>Revenue</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($services as $service)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="me-3">
                                            <i class="fas {{ $service->icon ? $service->icon->path : 'fa-spa' }} fa-2x"></i>
                                        </div>
                                        <div>
                                            <div class="fw-bold">{{ $service->name }}</div>
                                            <small class="text-muted">{{ Str::limit($service->description, 50) }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $service->category->name }}</td>
                                <td>{{ $service->duration }} min</td>
                                <td>{{ number_format($service->price, 2) }} LKR</td>
                                <td>{{ $service->bookings_count }}</td>
                                <td>{{ number_format($service->revenue ?? 0, 2) }} LKR</td>
                                <td>
                                    <span class="status-badge status-{{ $service->status ? 'active' : 'inactive' }}">
                                        {{ $service->status ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.services.edit', $service->id) }}"
                                            class="btn btn-sm btn-outline-primary action-btn me-2">
                                            Edit
                                        </a>
                                        <form action="{{ route('admin.services.destroy', $service->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this service?');"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger action-btn">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center">No services found</td>
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