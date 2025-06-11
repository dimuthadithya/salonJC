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
                'description' => 'Make Your Special Day Perfect',
                'status' => true
            ],
            [
                'name' => 'Facial Services',
                'description' => 'Advanced Facial Treatments',
                'status' => true
            ],
            [
                'name' => 'Hair Services',
                'description' => 'Professional Hair Care',
                'status' => true
            ],
            [
                'name' => 'Makeup Services',
                'description' => 'Professional Makeup',
                'status' => true
            ],
            [
                'name' => 'Additional Services',
                'description' => 'Beauty Extras',
                'status' => true
            ]
        ];

        foreach ($categories as $category) {
            ServiceCategory::create($category);
        }
    }
}
