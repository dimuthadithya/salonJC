<div class="service-card {{ $isDark ? 'bg-dark' : '' }}">
    <div class="service-icon">
        <i class="{{ $icon }}"></i>
    </div>
    <h3>{{ $title }}</h3>
    <p class="mb-4 text-white-50">{{ $description }}</p>
    <div class="price-badge mb-3 text-white-50">
        <span>Starting at</span>
        <span class="price">LKR {{ number_format($startPrice, 2) }}</span>
    </div>
    <a href="{{ route('services') }}#{{ $categoryId }}" class="service-btn">View Services</a>
</div>