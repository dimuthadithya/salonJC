<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        // Get all active categories with their services
        $categories = ServiceCategory::with(['services' => function ($query) {
            $query->where('status', true)
                ->with(['images' => function ($q) {
                    $q->where('is_primary', true);
                }]);
        }])->where('status', true)->get();

        // Map services to their respective categories
        $bridalServices = $categories->where('name', 'Bridal Services')->first()?->services ?? collect();
        $facialServices = $categories->where('name', 'Facial Services')->first()?->services ?? collect();
        $hairServices = $categories->where('name', 'Hair Services')->first()?->services ?? collect();
        $makeupServices = $categories->where('name', 'Makeup Services')->first()?->services ?? collect();
        $additionalServices = $categories->where('name', 'Additional Services')->first()?->services ?? collect();

        $servicesByCategory = $categories->mapWithKeys(function ($category) {
            return [$category->id => $category->services];
        });

        return view('services', compact(
            'categories',
            'servicesByCategory',
            'bridalServices',
            'facialServices',
            'hairServices',
            'makeupServices',
            'additionalServices'
        ));
    }
}
