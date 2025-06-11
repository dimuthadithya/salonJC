<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    public function run(): void
    {
        // Get categories
        $bridalCategory = ServiceCategory::where('name', 'Bridal Services')->first();

        // Bridal Services
        if ($bridalCategory) {
            Service::create([
                'name' => 'Complete Bridal Package',
                'description' => 'Complete luxury bridal package for your special day',
                'duration' => 480, // 8 hours
                'price' => 75000,
                'category_id' => $bridalCategory->id,
                'status' => true,
                'features' => [
                    'Pre-bridal facial treatment',
                    'Hair spa and treatment',
                    'Wedding day makeup and hairstyling',
                    'Dress fitting assistance',
                    'Photography session support',
                    'Touch-up kit for the ceremony'
                ]
            ]);

            Service::create([
                'name' => 'Engagement Package',
                'description' => 'Beautiful engagement makeup and styling package',
                'duration' => 240, // 4 hours
                'price' => 35000,
                'category_id' => $bridalCategory->id,
                'status' => true,
                'features' => [
                    'Professional makeup application',
                    'Hairstyling and setting',
                    'Dress coordination assistance',
                    'Touch-up service during event',
                    'Basic facial treatment'
                ]
            ]);
        }

        // Other Services Categories
        $facialCategory = ServiceCategory::where('name', 'Facial Services')->first();
        if ($facialCategory) {
            Service::create([
                'name' => 'Deep Cleansing Facial',
                'description' => 'Complete pore cleansing and purification treatment',
                'duration' => 60,
                'price' => 4500,
                'category_id' => $facialCategory->id,
                'status' => true
            ]);

            Service::create([
                'name' => 'Anti-aging Treatment',
                'description' => 'Advanced treatment to reduce fine lines and wrinkles',
                'duration' => 90,
                'price' => 6500,
                'category_id' => $facialCategory->id,
                'status' => true
            ]);

            Service::create([
                'name' => 'Whitening Facial',
                'description' => 'Specialized treatment for skin brightening',
                'duration' => 75,
                'price' => 5500,
                'category_id' => $facialCategory->id,
                'status' => true
            ]);

            Service::create([
                'name' => 'Acne Treatment',
                'description' => 'Specialized care for acne-prone skin',
                'duration' => 60,
                'price' => 4000,
                'category_id' => $facialCategory->id,
                'status' => true
            ]);
        }

        // Hair Services
        $hairCategory = ServiceCategory::where('name', 'Hair Services')->first();
        if ($hairCategory) {
            Service::create([
                'name' => 'Haircut & Styling',
                'description' => 'Professional cut and style by expert stylists',
                'duration' => 60,
                'price' => 2500,
                'category_id' => $hairCategory->id,
                'status' => true
            ]);

            Service::create([
                'name' => 'Hair Coloring',
                'description' => 'Full color, highlights, or balayage',
                'duration' => 240,
                'price' => 8500,
                'category_id' => $hairCategory->id,
                'status' => true
            ]);

            Service::create([
                'name' => 'Hair Treatments',
                'description' => 'Rebonding, perming, and keratin treatments',
                'duration' => 300,
                'price' => 12000,
                'category_id' => $hairCategory->id,
                'status' => true
            ]);

            Service::create([
                'name' => 'Hair Spa',
                'description' => 'Luxury hair spa and conditioning treatments',
                'duration' => 90,
                'price' => 4500,
                'category_id' => $hairCategory->id,
                'status' => true
            ]);
        }

        // Makeup Services
        $makeupCategory = ServiceCategory::where('name', 'Makeup Services')->first();
        if ($makeupCategory) {
            Service::create([
                'name' => 'Party Makeup',
                'description' => 'Perfect look for any special occasion',
                'duration' => 60,
                'price' => 5000,
                'category_id' => $makeupCategory->id,
                'status' => true
            ]);

            Service::create([
                'name' => 'Photoshoot Makeup',
                'description' => 'Camera-ready makeup for perfect photos',
                'duration' => 90,
                'price' => 7500,
                'category_id' => $makeupCategory->id,
                'status' => true
            ]);

            Service::create([
                'name' => 'Makeup Lessons',
                'description' => 'Learn professional makeup techniques',
                'duration' => 120,
                'price' => 8500,
                'category_id' => $makeupCategory->id,
                'status' => true
            ]);

            Service::create([
                'name' => 'Professional Makeup',
                'description' => 'Full professional makeup service',
                'duration' => 75,
                'price' => 6500,
                'category_id' => $makeupCategory->id,
                'status' => true
            ]);
        }

        // Additional Services
        $additionalCategory = ServiceCategory::where('name', 'Additional Services')->first();
        if ($additionalCategory) {
            Service::create([
                'name' => 'Eyebrow Shaping',
                'description' => 'Threading and eyebrow design',
                'duration' => 20,
                'price' => 1000,
                'category_id' => $additionalCategory->id,
                'status' => true
            ]);

            Service::create([
                'name' => 'Manicure & Pedicure',
                'description' => 'Complete nail care treatment',
                'duration' => 90,
                'price' => 3500,
                'category_id' => $additionalCategory->id,
                'status' => true
            ]);

            Service::create([
                'name' => 'Body Treatments',
                'description' => 'Relaxing body spa treatments',
                'duration' => 90,
                'price' => 5500,
                'category_id' => $additionalCategory->id,
                'status' => true
            ]);

            Service::create([
                'name' => 'Beauty Consultation',
                'description' => 'Professional beauty advice and planning',
                'duration' => 45,
                'price' => 2500,
                'category_id' => $additionalCategory->id,
                'status' => true
            ]);
        }
    }
}
