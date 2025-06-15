<x-admin-layout>
    @push('styles')
    <style>
        .services-page {
            padding: 40px 0;
            background: #f8f9fa;
            min-height: calc(100vh - 60px);
        }

        .form-card {
            background: white;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .service-image {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 8px;
            margin-right: 10px;
            margin-bottom: 10px;
        }

        .image-preview {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 15px;
        }

        .image-container {
            position: relative;
            margin-right: 10px;
            margin-bottom: 10px;
        }

        .delete-image {
            position: absolute;
            top: -8px;
            right: -8px;
            background: #dc3545;
            color: white;
            border: none;
            border-radius: 50%;
            width: 24px;
            height: 24px;
            font-size: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }
    </style>
    @endpush

    @section('content')
    <div class="services-page">
        <div class="container">
            <!-- Page Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3">Edit Service</h1>
                <div class="actions">
                    <a href="{{ route('admin.services') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left"></i> Back to Services
                    </a>
                </div>
            </div>

            <!-- Service Form -->
            <div class="form-card">
                <form action="{{ route('admin.services.update', $service->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">Service Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                id="name" name="name" value="{{ old('name', $service->name) }}" required>
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="category_id" class="form-label">Category</label>
                            <select class="form-select @error('category_id') is-invalid @enderror"
                                id="category_id" name="category_id" required>
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id', $service->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror"
                                id="description" name="description" rows="3" required>{{ old('description', $service->description) }}</textarea>
                            @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="duration" class="form-label">Duration (minutes)</label>
                            <input type="number" class="form-control @error('duration') is-invalid @enderror"
                                id="duration" name="duration" value="{{ old('duration', $service->duration) }}" min="1" required>
                            @error('duration')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="price" class="form-label">Price (LKR)</label>
                            <input type="number" class="form-control @error('price') is-invalid @enderror"
                                id="price" name="price" value="{{ old('price', $service->price) }}" min="0" step="0.01" required>
                            @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Features</label>
                            <div class="features-container">
                                @forelse($service->features ?? [] as $feature)
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control" name="features[]" value="{{ $feature }}">
                                    <button type="button" class="btn btn-danger remove-feature">-</button>
                                </div>
                                @empty
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control" name="features[]">
                                    <button type="button" class="btn btn-success add-feature">+</button>
                                </div>
                                @endforelse
                            </div>
                            <button type="button" class="btn btn-success add-feature">Add Feature</button>
                            @error('features')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="icon" class="form-label">Service Icon</label>
                            <input type="text" class="form-control @error('icon') is-invalid @enderror"
                                id="icon" name="icon" value="{{ old('icon', $service->icon ? $service->icon->path : '') }}"
                                placeholder="Enter Font Awesome icon class (e.g., fa-spa)" required>
                            <small class="text-muted">Enter a Font Awesome icon class (e.g., fa-spa, fa-cut, fa-massage)</small>
                            @error('icon')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-12 mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="status" name="status" value="1"
                                    {{ old('status', $service->status) ? 'checked' : '' }}>
                                <label class="form-check-label" for="status">
                                    Active Status
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Update Service</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const container = document.querySelector('.features-container');

            document.querySelector('.add-feature').addEventListener('click', function() {
                const newFeature = document.createElement('div');
                newFeature.className = 'input-group mb-2';
                newFeature.innerHTML = `
                    <input type="text" class="form-control" name="features[]" required>
                    <button type="button" class="btn btn-danger remove-feature">-</button>
                `;
                container.appendChild(newFeature);
            });

            container.addEventListener('click', function(e) {
                if (e.target.classList.contains('remove-feature')) {
                    e.target.closest('.input-group').remove();
                }
            });
        });
    </script>
    @endpush
    @endsection
</x-admin-layout>