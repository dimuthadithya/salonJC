<x-admin-layout>

    @section('content')
    <div class="container py-4">
        <div class="mb-4 d-flex justify-content-between align-items-center">
            <h2 class="mb-0 ">Manage Feedbacks</h2>
        </div>

        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="shadow-sm card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User</th>
                                <th>Service</th>
                                <th>Rating</th>
                                <th>Comment</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($feedbacks as $feedback)
                            <tr>
                                <td>{{ $feedback->id }}</td>
                                <td>{{ $feedback->user->name }}</td>
                                <td>{{ $feedback->booking->service->name }}</td>
                                <td>
                                    @for($i = 1; $i <= 5; $i++)
                                        <i class="fas fa-star {{ $i <= $feedback->rating ? 'text-warning' : 'text-muted' }}"></i>
                                        @endfor
                                </td>
                                <td>{{ \Str::limit($feedback->comment, 50) }}</td>
                                <td>{{ $feedback->created_at->format('Y-m-d') }}</td>
                                <td>
                                    <span class="badge {{ $feedback->is_published ? 'bg-success' : 'bg-warning' }}">
                                        {{ $feedback->is_published ? 'Published' : 'Pending' }}
                                    </span>
                                </td>
                                <td>
                                    <form action="{{ route('admin.feedback.toggle-publish', $feedback) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-sm {{ $feedback->is_published ? 'btn-warning' : 'btn-success' }}">
                                            <i class="fas {{ $feedback->is_published ? 'fa-eye-slash' : 'fa-eye' }}"></i>
                                            {{ $feedback->is_published ? 'Unpublish' : 'Publish' }}
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-3 d-flex justify-content-end">
                    {{ $feedbacks->links() }}
                </div>
            </div>
        </div>
    </div>

    <style>
        .table td,
        .table th {
            vertical-align: middle;
        }
    </style>
    @endsection
</x-admin-layout>