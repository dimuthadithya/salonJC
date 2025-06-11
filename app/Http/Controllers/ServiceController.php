<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        // Get all categories with their services
        $categories = ServiceCategory::with(['services' => function ($query) {
            $query->with('images')->where('status', true);
        }])->where('status', true)->get();

        // Fetch services for specific categories
        $bridalServices = $categories->where('name', 'Bridal Services')->first()?->services ?? collect();
        $facialServices = $categories->where('name', 'Facial Services')->first()?->services ?? collect();
        $hairServices = $categories->where('name', 'Hair Services')->first()?->services ?? collect();
        $makeupServices = $categories->where('name', 'Makeup Services')->first()?->services ?? collect();
        $additionalServices = $categories->where('name', 'Additional Services')->first()?->services ?? collect();

        return view('services', compact(
            'categories',
            'bridalServices',
            'facialServices',
            'hairServices',
            'makeupServices',
            'additionalServices'
        ));
    }
}
