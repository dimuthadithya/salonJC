<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ServiceCategory;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        // Get today's bookings count
        $todayBookings = Booking::whereDate('appointment_date', today())->count();

        // Get total revenue
        $totalRevenue = Booking::where('payment_status', 'paid')->sum('total_price');

        // Get total active services
        $totalServices = Service::count();

        // Get total customers (unique customers from bookings)
        $totalCustomers = Booking::distinct('email')->count('email');

        // Get recent bookings
        $recentBookings = Booking::with(['service', 'category'])
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        // Get popular services
        $popularServices = Service::withCount('bookings')
            ->with('category')
            ->select('services.*')
            ->selectRaw('COUNT(bookings.id) as bookings_count')
            ->selectRaw('SUM(CASE WHEN bookings.payment_status = "paid" THEN bookings.total_price ELSE 0 END) as revenue')
            ->leftJoin('bookings', 'services.id', '=', 'bookings.service_id')
            ->groupBy('services.id')
            ->orderByDesc('bookings_count')
            ->take(5)
            ->get();

        return view('admin.index', compact(
            'todayBookings',
            'totalRevenue',
            'totalServices',
            'totalCustomers',
            'recentBookings',
            'popularServices'
        ));
    }

    public function services()
    {
        $services = Service::query()
            ->withCount('bookings')
            ->with(['category', 'icon'])
            ->select('services.*')
            ->selectRaw('SUM(CASE WHEN bookings.payment_status = "paid" THEN bookings.total_price ELSE 0 END) as revenue')
            ->leftJoin('bookings', 'services.id', '=', 'bookings.service_id')
            ->groupBy(
                'services.id',
                'services.name',
                'services.description',
                'services.features',
                'services.duration',
                'services.price',
                'services.category_id',
                'services.status',
                'services.created_at',
                'services.updated_at'
            )->orderBy('services.name')
            ->get();

        return view('admin.services.index', compact('services'));
    }

    public function createService()
    {
        $categories = ServiceCategory::all();
        return view('admin.services.create', compact('categories'));
    }

    public function storeService(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'features' => 'required|array',
            'duration' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:service_categories,id',
            'status' => 'boolean',
            'icon' => 'required|string|max:50'
        ]);

        $iconPath = $validated['icon'];
        unset($validated['icon']);

        $service = Service::create($validated);
        $service->icon()->create(['image_path' => $iconPath]);

        return redirect()->route('admin.services')->with('success', 'Service created successfully');
    }

    public function editService(Service $service)
    {
        $categories = ServiceCategory::all();
        return view('admin.services.edit', compact('service', 'categories'));
    }

    public function updateService(Request $request, Service $service)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'features' => 'required|array',
            'duration' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:service_categories,id',
            'status' => 'boolean',
            'icon' => 'required|string|max:50'
        ]);

        $iconPath = $validated['icon'];
        unset($validated['icon']);

        $service->update($validated);

        // Update or create icon
        if ($service->icon) {
            $service->icon->update(['image_path' => $iconPath]);
        } else {
            $service->icon()->create(['image_path' => $iconPath]);
        }

        return redirect()->route('admin.services')->with('success', 'Service updated successfully');
    }

    public function destroyService(Service $service)
    {
        $service->delete();
        return redirect()->route('admin.services')->with('success', 'Service deleted successfully');
    }
}
