@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="shadow card">
                <div class="text-white card-header bg-dark">
                    <h5 class="mb-0 card-title">Write a Review</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('feedback.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="booking_id" value="{{ $booking->id }}">

                        <div class="mb-4">
                            <label for="rating" class="form-label">Rating</label>
                            <div class="gap-4 d-flex">
                                @for ($i = 1; $i <= 5; $i++)
                                    <div class="form-check">
                                    <input type="radio" id="rating{{ $i }}" name="rating" value="{{ $i }}"
                                        class="form-check-input" required
                                        {{ old('rating') == $i ? 'checked' : '' }}>
                                    <label class="form-check-label" for="rating{{ $i }}">
                                        {{ $i }} <i class="fas fa-star text-warning"></i>
                                    </label>
                            </div>
                            @endfor
                        </div>
                        @error('rating')
                        <div class="mt-1 text-danger small">{{ $message }}</div>
                        @enderror
                </div>

                <div class="mb-4">
                    <label for="comment" class="form-label">Your Review</label>
                    <textarea id="comment" name="comment" rows="4"
                        class="form-control @error('comment') is-invalid @enderror"
                        required>{{ old('comment') }}</textarea>
                    @error('comment')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="gap-2 d-flex justify-content-end">
                    <a href="{{ route('dashboard') }}" class="btn btn-light">
                        <i class="fas fa-times"></i> Cancel
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-paper-plane"></i> Submit Review
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection