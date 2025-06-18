<?php

namespace App\Http\Controllers;

use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Get active service categories
        $categories = ServiceCategory::where('status', true)->get()
            ->map(function ($category) {
                // If icon_class is null, provide a default icon based on category name
                if (!$category->icon_class) {
                    $category->icon_class = match ($category->name) {
                        'Bridal Services' => 'fas fa-ring',
                        'Facial Services' => 'fas fa-spa',
                        'Hair Services' => 'fas fa-cut',
                        'Makeup Services' => 'fas fa-magic',
                        'Additional Services' => 'fas fa-star',
                        default => 'fas fa-scissors'
                    };
                }

                // Ensure start_price is set
                if (!$category->start_price) {
                    // Get the minimum price from services in this category
                    $minPrice = $category->services()->min('price') ?? 0;
                    $category->start_price = $minPrice;
                }

                return $category;
            });

        return view('home', compact('categories'));
    }
}
