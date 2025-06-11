<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ServiceCategory;

class ServiceCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Bridal Services',
                'icon_class' => 'fas fa-crown',
                'description' => 'Make Your Special Day Perfect',
                'long_description' => 'Complete bridal makeup, hair styling, and dressing service. Make your special day even more beautiful. Transform into the bride of your dreams with our comprehensive bridal services. Our expert team ensures you look and feel absolutely stunning.',
                'start_price' => 25000.00,
                'status' => true
            ],
            [
                'name' => 'Facial Services',
                'icon_class' => 'fas fa-spa',
                'description' => 'Advanced Facial Treatments',
                'long_description' => 'Premium facial treatment with gold-infused products. Includes deep cleansing, massage, and mask. Our expert estheticians use premium products and cutting-edge techniques to give you that perfect, glowing complexion.',
                'start_price' => 5000.00,
                'status' => true
            ],
            [
                'name' => 'Hair Services',
                'icon_class' => 'fas fa-cut',
                'description' => 'Professional Hair Care',
                'long_description' => 'Professional haircut, styling, and treatment by our expert stylists. From trendy cuts to stunning colors and luxury treatments, our professional hair services cater to all your hair care needs.',
                'start_price' => 2500.00,
                'status' => true
            ],
            [
                'name' => 'Makeup Services',
                'icon_class' => 'fas fa-paint-brush',
                'description' => 'Professional Makeup',
                'long_description' => 'Professional makeup application for any occasion. Using premium beauty products. Our makeup artists create flawless looks that enhance your natural beauty using premium products and techniques.',
                'start_price' => 3500.00,
                'status' => true
            ],
            [
                'name' => 'Hair Coloring Services',
                'icon_class' => 'fas fa-magic',
                'description' => 'Premium Hair Coloring',
                'long_description' => 'Premium hair coloring service with ammonia-free products. Includes styling and consultation for the perfect color match.',
                'start_price' => 4500.00,
                'status' => true
            ],
            [
                'name' => 'Body Treatments',
                'icon_class' => 'fas fa-gem',
                'description' => 'Luxury Body Treatments',
                'long_description' => 'Luxurious body treatments and therapies for complete relaxation and rejuvenation. Our premium services will leave you feeling refreshed and renewed.',
                'start_price' => 5500.00,
                'status' => true
            ]
        ];

        foreach ($categories as $category) {
            ServiceCategory::create($category);
        }
    }
}
