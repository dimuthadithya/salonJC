@extends('layouts.app')

@section('content')
<main class="bg-dark">
    <!-- Page Header -->
    <header class="service-header">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center" data-aos="fade-up">
                    <h1>Our Beauty Services</h1>
                    <p class="lead">
                        Experience luxury beauty treatments tailored just for you
                    </p>
                </div>
            </div>
        </div>
    </header>

    <!-- Bridal Services Section -->
    <section class="service-section" id="bridal-services">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center" data-aos="fade-up">
                        <span class="subtitle">Bridal Services</span>
                        <h2>Make Your Special Day Perfect</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach($bridalServices as $service)
                <div class="col-lg-6 mb-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="service-package-card">
                        <div class="package-header">
                            <h3>{{ $service->name }}</h3>
                            <span class="price">Starting from LKR {{ number_format($service->price, 2) }}</span>
                            <span class="duration">Duration: {{ $service->duration }} mins</span>
                        </div>
                        <div class="package-content">
                            {!! $service->description !!}
                            <button class="btn btn-book" data-package="{{ Str::slug($service->name) }}">
                                Book Package
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Beauty Treatments Section -->
    <section class="service-section bg-light" id="beauty-treatments">
        <div class="container">
            <!-- Facial Services -->
            <div class="row mb-5">
                <div class="col-12">
                    <div class="section-title text-center" data-aos="fade-up">
                        <span class="subtitle">Facial Services</span>
                        <h2>Advanced Facial Treatments</h2>
                    </div>
                </div>

                @foreach($facialServices as $service)
                <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <x-service-card
                        :title="$service->name"
                        :description="$service->description"
                        :price="'LKR ' . number_format($service->price, 2)"
                        :duration="$service->duration . ' mins'"
                        :icon="$service->images->where('is_primary', true)->first()?->image_path ?? 'fas fa-spa'" />
                </div>
                @endforeach
            </div>

            <!-- Hair Services -->
            <div class="row mb-5">
                <div class="col-12">
                    <div class="section-title text-center" data-aos="fade-up">
                        <span class="subtitle">Hair Services</span>
                        <h2>Professional Hair Care</h2>
                    </div>
                </div>

                @foreach($hairServices as $service)
                <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <x-service-card
                        :title="$service->name"
                        :description="$service->description"
                        :price="'LKR ' . number_format($service->price, 2)"
                        :duration="$service->duration . ' mins'"
                        :icon="$service->images->where('is_primary', true)->first()?->image_path ?? 'fas fa-cut'" />
                </div>
                @endforeach
            </div>

            <!-- Makeup Services -->
            <div class="row mb-5">
                <div class="col-12">
                    <div class="section-title text-center" data-aos="fade-up">
                        <span class="subtitle">Makeup Services</span>
                        <h2>Professional Makeup</h2>
                    </div>
                </div>

                @foreach($makeupServices as $service)
                <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <x-service-card
                        :title="$service->name"
                        :description="$service->description"
                        :price="'LKR ' . number_format($service->price, 2)"
                        :duration="$service->duration . ' mins'"
                        :icon="$service->images->where('is_primary', true)->first()?->image_path ?? 'fas fa-magic'" />
                </div>
                @endforeach
            </div>

            <!-- Additional Services -->
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center" data-aos="fade-up">
                        <span class="subtitle">Additional Services</span>
                        <h2>Beauty Extras</h2>
                    </div>
                </div>

                @foreach($additionalServices as $service)
                <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <x-service-card
                        :title="$service->name"
                        :description="$service->description"
                        :price="'LKR ' . number_format($service->price, 2)"
                        :duration="$service->duration . ' mins'"
                        :icon="$service->images->where('is_primary', true)->first()?->image_path ?? 'fas fa-star'" />
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Consultation CTA -->
    <section class="consultation-cta">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center" data-aos="fade-up">
                    <h2>Not Sure Which Service to Choose?</h2>
                    <p class="text-white-50">Book a free consultation with our beauty experts</p>
                    <button class="btn btn-consultation">
                        Book Free Consultation
                    </button>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection