<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;
use App\Models\ServiceCategory;

class ServicesTableSeeder extends Seeder
{
    public function run(): void
    {
        // Get categories
        $categories = ServiceCategory::all()->keyBy('name');

        // Bridal Services
        $bridalServices = [
            [
                'name' => 'Complete Bridal Package',
                'description' => 'Pre-bridal facial treatment, Hair spa and treatment, Wedding day makeup and hairstyling, Dress fitting assistance, Photography session support, Touch-up kit for the ceremony',
                'duration' => 480, // 8 hours
                'price' => 75000.00,
                'category_id' => $categories['Bridal Services']->id,
                'status' => true
            ],
            [
                'name' => 'Engagement Package',
                'description' => 'Professional makeup application, Hairstyling and setting, Dress coordination assistance, Touch-up service during event, Basic facial treatment',
                'duration' => 240, // 4 hours
                'price' => 35000.00,
                'category_id' => $categories['Bridal Services']->id,
                'status' => true
            ]
        ];

        // Facial Services
        $facialServices = [
            [
                'name' => 'Deep Cleansing Facial',
                'description' => 'Complete pore cleansing and purification treatment',
                'duration' => 60,
                'price' => 4500.00,
                'category_id' => $categories['Facial Services']->id,
                'status' => true
            ],
            [
                'name' => 'Anti-aging Treatment',
                'description' => 'Advanced treatment to reduce fine lines and wrinkles',
                'duration' => 90,
                'price' => 6500.00,
                'category_id' => $categories['Facial Services']->id,
                'status' => true
            ],
            [
                'name' => 'Whitening Facial',
                'description' => 'Specialized treatment for skin brightening',
                'duration' => 75,
                'price' => 5500.00,
                'category_id' => $categories['Facial Services']->id,
                'status' => true
            ],
            [
                'name' => 'Acne Treatment',
                'description' => 'Specialized care for acne-prone skin',
                'duration' => 60,
                'price' => 4000.00,
                'category_id' => $categories['Facial Services']->id,
                'status' => true
            ]
        ];

        // Hair Services
        $hairServices = [
            [
                'name' => 'Haircut & Styling',
                'description' => 'Professional cut and style by expert stylists',
                'duration' => 60,
                'price' => 2500.00,
                'category_id' => $categories['Hair Services']->id,
                'status' => true
            ],
            [
                'name' => 'Hair Coloring',
                'description' => 'Full color, highlights, or balayage',
                'duration' => 240,
                'price' => 8500.00,
                'category_id' => $categories['Hair Services']->id,
                'status' => true
            ],
            [
                'name' => 'Hair Treatments',
                'description' => 'Rebonding, perming, and keratin treatments',
                'duration' => 300,
                'price' => 12000.00,
                'category_id' => $categories['Hair Services']->id,
                'status' => true
            ],
            [
                'name' => 'Hair Spa',
                'description' => 'Luxury hair spa and conditioning treatments',
                'duration' => 90,
                'price' => 4500.00,
                'category_id' => $categories['Hair Services']->id,
                'status' => true
            ]
        ];

        // Makeup Services
        $makeupServices = [
            [
                'name' => 'Party Makeup',
                'description' => 'Perfect look for any special occasion',
                'duration' => 60,
                'price' => 5000.00,
                'category_id' => $categories['Makeup Services']->id,
                'status' => true
            ],
            [
                'name' => 'Photoshoot Makeup',
                'description' => 'Camera-ready makeup for perfect photos',
                'duration' => 90,
                'price' => 7500.00,
                'category_id' => $categories['Makeup Services']->id,
                'status' => true
            ],
            [
                'name' => 'Makeup Lessons',
                'description' => 'Learn professional makeup techniques',
                'duration' => 120,
                'price' => 8500.00,
                'category_id' => $categories['Makeup Services']->id,
                'status' => true
            ],
            [
                'name' => 'Professional Makeup',
                'description' => 'Full professional makeup service',
                'duration' => 75,
                'price' => 6500.00,
                'category_id' => $categories['Makeup Services']->id,
                'status' => true
            ]
        ];

        // Additional Services
        $additionalServices = [
            [
                'name' => 'Eyebrow Shaping',
                'description' => 'Threading and eyebrow design',
                'duration' => 20,
                'price' => 1000.00,
                'category_id' => $categories['Additional Services']->id,
                'status' => true
            ],
            [
                'name' => 'Manicure & Pedicure',
                'description' => 'Complete nail care treatment',
                'duration' => 90,
                'price' => 3500.00,
                'category_id' => $categories['Additional Services']->id,
                'status' => true
            ],
            [
                'name' => 'Body Treatments',
                'description' => 'Relaxing body spa treatments',
                'duration' => 90,
                'price' => 5500.00,
                'category_id' => $categories['Additional Services']->id,
                'status' => true
            ],
            [
                'name' => 'Beauty Consultation',
                'description' => 'Professional beauty advice and planning',
                'duration' => 45,
                'price' => 2500.00,
                'category_id' => $categories['Additional Services']->id,
                'status' => true
            ]
        ];

        // Insert all services
        foreach (array_merge($bridalServices, $facialServices, $hairServices, $makeupServices, $additionalServices) as $service) {
            Service::create($service);
        }
    }
}
