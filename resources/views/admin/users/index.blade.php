<x-admin-layout>


    @section('title', 'User Management')

    @section('content')
    <div class="container-fluid">
        <div class="flex-wrap pt-3 pb-2 mb-3 d-flex justify-content-between flex-md-nowrap align-items-center border-bottom">
            <h1 class="h2">User Management</h1>
        </div> @if(session('user_updated'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            {{ session('user_updated') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if(session('user_deleted'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session('user_deleted') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <!-- Users Table -->
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col">Joined Date</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <span class="badge bg-{{ $user->role === 'admin' ? 'primary' : 'secondary' }}">
                                        {{ ucfirst($user->role) }}
                                    </span>
                                </td>
                                <td>{{ $user->created_at->format('M d, Y') }}</td>
                                <td>
                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-info me-2">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mt-4">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize all modals
            var editModals = document.querySelectorAll('.modal');
            editModals.forEach(function(modal) {
                new bootstrap.Modal(modal);
            });

            // Clear form errors when modal is closed
            editModals.forEach(function(modal) {
                modal.addEventListener('hidden.bs.modal', function() {
                    var form = modal.querySelector('form');
                    if (form) {
                        var errorElements = form.querySelectorAll('.is-invalid');
                        errorElements.forEach(function(element) {
                            element.classList.remove('is-invalid');
                        });
                        var feedbackElements = form.querySelectorAll('.invalid-feedback');
                        feedbackElements.forEach(function(element) {
                            element.remove();
                        });
                    }
                });
            });
        });
    </script>
    @endpush
</x-admin-layout>