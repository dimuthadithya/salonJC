<div class="service-card">
    <div class="service-icon">
        <i class="{{ $icon }}"></i>
    </div>
    <h4>{{ $title }}</h4>
    <p class="text-white-50">{{ $description }}</p>
    <div class="service-price">
        <span>{{ $price }}</span>
        <small>{{ $duration }}</small>
    </div>

    @if($showBookButton)
    <a href="{{ route('booking') }}?service={{ $serviceId }}" class="btn btn-book">Book Now</a>
    @endif
</div>