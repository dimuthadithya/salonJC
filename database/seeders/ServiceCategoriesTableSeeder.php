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
                'long_description' => 'Transform into the bride of your dreams with our comprehensive bridal services. From pre-wedding treatments to the big day itself, our expert team ensures you look and feel absolutely stunning.',
                'start_price' => 35000.00,
                'status' => true
            ],
            [
                'name' => 'Facial Services',
                'icon_class' => 'fas fa-spa',
                'description' => 'Advanced Facial Treatments',
                'long_description' => 'Revitalize your skin with our advanced facial treatments. Our expert estheticians use premium products and cutting-edge techniques to give you that perfect, glowing complexion.',
                'start_price' => 4000.00,
                'status' => true
            ],
            [
                'name' => 'Hair Services',
                'icon_class' => 'fas fa-cut',
                'description' => 'Professional Hair Care',
                'long_description' => 'From trendy cuts to stunning colors and luxury treatments, our professional hair services cater to all your hair care needs. Let our skilled stylists transform your look.',
                'start_price' => 2500.00,
                'status' => true
            ],
            [
                'name' => 'Makeup Services',
                'icon_class' => 'fas fa-magic',
                'description' => 'Professional Makeup',
                'long_description' => 'Whether it\'s for a special occasion or a photoshoot, our makeup artists create flawless looks that enhance your natural beauty using premium products and techniques.',
                'start_price' => 5000.00,
                'status' => true
            ],
            [
                'name' => 'Additional Services',
                'icon_class' => 'fas fa-star',
                'description' => 'Beauty Extras',
                'long_description' => 'Complete your beauty routine with our additional services. From eyebrow shaping to relaxing body treatments, we offer everything you need for head-to-toe pampering.',
                'start_price' => 1000.00,
                'status' => true
            ]
        ];

        foreach ($categories as $category) {
            ServiceCategory::create($category);
        }
    }
}
