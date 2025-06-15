<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
}
