<div>
    <!-- People find pleasure in different ways. I find it in keeping my mind clear. - Marcus Aurelius -->
</div>

<section class="service-section {{ $isDark ? '' : 'bg-light' }}" id="{{ $categoryId }}">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title text-center" data-aos="fade-up">
                    <span class="subtitle">{{ $subtitle }}</span>
                    <h2>{{ $title }}</h2>
                </div>
            </div>
        </div>

        <div class="row">
            {{ $slot }}
        </div>
    </div>
</section>

@push('styles')
<style>
    .service-section {
        padding: 80px 0;
    }

    .service-section.bg-light {
        background-color: #1a1a1a !important;
    }

    .section-title .subtitle {
        color: #ffd700;
        font-size: 1.1rem;
        text-transform: uppercase;
        letter-spacing: 2px;
        margin-bottom: 10px;
        display: block;
    }

    .section-title h2 {
        color: #ffffff;
        margin-bottom: 50px;
    }
</style>
@endpush