@extends('layouts.app')

@section('content')
<div class="container py-5 mt-5">
    <div class="mt-5 row justify-content-center">
        <div class="mt-5 col-md-8">
            <div class="border-0 shadow-lg card rounded-3">
                <div class="py-3 text-white card-header bg-gradient"
                    style="background: linear-gradient(to right, #2c3e50, #3498db);">
                    <h4 class="mb-0 text-center card-title">
                        <i class="fas fa-star me-2"></i>Share Your Experience
                    </h4>
                </div>
                <div class="p-4 card-body">
                    <form action="{{ route('feedback.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="booking_id" value="{{ $booking->id }}">

                        <div class="mb-4">
                            <label for="rating" class="mb-3 form-label h5">How would you rate your experience?</label>
                            <div class="mb-3 text-center rating-container">
                                <div class="gap-4 star-rating d-flex justify-content-center">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <div class="rating-item">
                                        <input type="radio" id="rating{{ $i }}" name="rating" value="{{ $i }}"
                                            class="rating-input visually-hidden" required
                                            {{ old('rating') == $i ? 'checked' : '' }}>
                                        <label class="rating-label" for="rating{{ $i }}"
                                            style="cursor: pointer; font-size: 2rem;">
                                            <i class="fas fa-star {{ old('rating') >= $i ? 'text-warning' : 'text-muted' }}"
                                                style="transition: all 0.2s ease;"></i>
                                        </label>
                                </div>
                                @endfor
                            </div>
                        </div>
                        @error('rating')
                        <div class="text-center text-danger small">{{ $message }}</div>
                        @enderror
                </div>

                <div class="mb-4">
                    <label for="comment" class="mb-3 form-label h5">Tell us about your experience</label>
                    <textarea id="comment" name="comment" rows="4"
                        class="form-control @error('comment') is-invalid @enderror"
                        style="border-radius: 15px; resize: none;"
                        placeholder="Share your thoughts about our service..."
                        required>{{ old('comment') }}</textarea>
                    @error('comment')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="gap-3 d-flex justify-content-end">
                    <a href="{{ route('dashboard') }}" class="px-4 py-2 btn btn-light rounded-pill">
                        <i class="fas fa-times me-2"></i>Cancel
                    </a>
                    <button type="submit" class="px-4 py-2 btn btn-primary rounded-pill"
                        style="background: linear-gradient(to right, #2c3e50, #3498db); border: none;">
                        <i class="fas fa-paper-plane me-2"></i>Submit Review
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<style>
    .rating-container .rating-item:hover i,
    .rating-container .rating-item:hover~.rating-item i {
        color: #ffc107 !important;
    }

    .rating-input:checked~.rating-label i {
        color: #ffc107 !important;
    }

    .form-control:focus {
        border-color: #3498db;
        box-shadow: 0 0 0 0.2rem rgba(52, 152, 219, 0.25);
    }

    .card {
        transition: transform 0.2s;
    }

    .card:hover {
        transform: translateY(-5px);
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ratingInputs = document.querySelectorAll('.rating-input');
        const ratingLabels = document.querySelectorAll('.rating-label i');

        ratingInputs.forEach((input, index) => {
            input.addEventListener('change', () => {
                ratingLabels.forEach((label, labelIndex) => {
                    if (labelIndex <= index) {
                        label.classList.remove('text-muted');
                        label.classList.add('text-warning');
                    } else {
                        label.classList.remove('text-warning');
                        label.classList.add('text-muted');
                    }
                });
            });
        });
    });
</script>
@endsection