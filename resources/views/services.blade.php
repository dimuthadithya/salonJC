@extends('layouts.app')

@section('content')
<main class="bg-dark">
    <!-- Page Header -->
    <header class="service-header">
        <div class="container">
            <div class="row">
                <div class="text-center col-12" data-aos="fade-up">
                    <h1>Our Beauty Services</h1>
                    <p class="lead">
                        Experience luxury beauty treatments tailored just for you
                    </p>
                </div>
            </div>
        </div>
    </header>

    @foreach($categories as $category)
    @php
    $bgClass = $loop->even ? 'bg-light' : '';
    $iconClass = match($category->name) {
    'Bridal Services' => 'fa-ring',
    'Facial Services' => 'fa-spa',
    'Hair Services' => 'fa-cut',
    'Makeup Services' => 'fa-magic',
    default => 'fa-star'
    };
    @endphp

    <section class="service-section {{ $bgClass }}" id="{{ Str::slug($category->name) }}">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="text-center section-title" data-aos="fade-up">
                        <span class="subtitle">{{ $category->name }}</span>
                        <h2>{{ $category->description ?: $category->name }}</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                @if($category->name === 'Bridal Services')
                @foreach($category->services as $service)
                <div class="mb-4 col-lg-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <x-bridal-service-card
                        :title="$service->name"
                        :price="'LKR ' . number_format($service->price, 2)"
                        :duration="$service->duration . ' mins'"
                        :features="$service->features"
                        :package-type="Str::slug($service->name)"
                        :service-id="$service->id" />
                </div>
                @endforeach
                @else
                @foreach($category->services as $service)
                <div class="mb-4 col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <x-service-card
                        :title="$service->name"
                        :description="$service->description"
                        :price="'LKR ' . number_format($service->price, 2)"
                        :duration="$service->duration . ' mins'"
                        :icon="$service->images->where('is_primary', true)->first()?->image_path ?? 'fas ' . $iconClass"
                        :service-id="$service->id" />
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </section>
    @endforeach
</main>
@endsection