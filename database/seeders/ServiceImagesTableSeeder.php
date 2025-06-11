<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ServiceImage;
use App\Models\Service;

class ServiceImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Facial Services Icons
        $this->createServiceImage('Deep Cleansing Facial', 'fas fa-spa', true);
        $this->createServiceImage('Anti-aging Treatment', 'fas fa-clock-rotate-left', true);
        $this->createServiceImage('Whitening Facial', 'fas fa-sun', true);
        $this->createServiceImage('Acne Treatment', 'fas fa-flask', true);

        // Hair Services Icons
        $this->createServiceImage('Haircut & Styling', 'fas fa-cut', true);
        $this->createServiceImage('Hair Coloring', 'fas fa-paint-brush', true);
        $this->createServiceImage('Hair Treatments', 'fas fa-wind', true);
        $this->createServiceImage('Hair Spa', 'fas fa-spa', true);

        // Makeup Services Icons
        $this->createServiceImage('Party Makeup', 'fas fa-magic', true);
        $this->createServiceImage('Photoshoot Makeup', 'fas fa-camera', true);
        $this->createServiceImage('Makeup Lessons', 'fas fa-graduation-cap', true);
        $this->createServiceImage('Professional Makeup', 'fas fa-star', true);

        // Additional Services Icons
        $this->createServiceImage('Eyebrow Shaping', 'fas fa-eye', true);
        $this->createServiceImage('Manicure & Pedicure', 'fas fa-hand-sparkles', true);
        $this->createServiceImage('Body Treatments', 'fas fa-spa', true);
        $this->createServiceImage('Beauty Consultation', 'fas fa-comments', true);

        // Bridal Services Icons (using appropriate icons)
        $this->createServiceImage('Complete Bridal Package', 'fas fa-crown', true);
        $this->createServiceImage('Engagement Package', 'fas fa-ring', true);
    }

    private function createServiceImage($serviceName, $iconClass, $isPrimary = false)
    {
        $service = Service::where('name', $serviceName)->first();

        if ($service) {
            ServiceImage::create([
                'service_id' => $service->id,
                'image_path' => $iconClass,
                'is_primary' => $isPrimary
            ]);
        }
    }
}
