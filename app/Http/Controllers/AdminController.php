<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ServiceCategory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

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
            'features' => 'nullable|array',
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
            'features' => 'nullable|array',
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

    public function bookings(Request $request)
    {
        $query = Booking::with(['service', 'category']);

        // Apply status filter
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $bookings = $query->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.bookings.index', compact('bookings'));
    }

    public function showBooking(Booking $booking)
    {
        $booking->load(['service', 'category']);
        return view('admin.bookings.show', compact('booking'));
    }

    public function updateBookingStatus(Request $request, Booking $booking)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,confirmed,cancelled,completed',
            'payment_status' => 'required|in:pending,paid,failed'
        ]);

        $booking->update($validated);
        return redirect()->back()->with('success', 'Booking status updated successfully');
    }

    public function confirmBooking(Booking $booking)
    {
        if ($booking->status !== 'pending' || $booking->payment_status !== 'paid') {
            return redirect()->back()->with('error', 'Only pending bookings with paid status can be confirmed.');
        }

        $booking->update([
            'status' => 'confirmed',
            'confirmed_at' => now()
        ]);

        return redirect()->back()->with('success', 'Booking has been confirmed successfully.');
    }

    public function rejectBooking(Booking $booking)
    {
        if ($booking->status !== 'pending') {
            return redirect()->back()->with('error', 'Only pending bookings can be rejected.');
        }

        $booking->update([
            'status' => 'cancelled',
            'cancelled_at' => now()
        ]);

        return redirect()->back()->with('success', 'Booking has been rejected successfully.');
    }

    public function cancelBooking(Booking $booking)
    {
        if ($booking->status === 'cancelled') {
            return redirect()->back()->with('error', 'This booking is already cancelled.');
        }

        $booking->update([
            'status' => 'cancelled',
            'cancelled_at' => now()
        ]);

        return redirect()->back()->with('success', 'Booking has been cancelled successfully.');
    }

    public function completeBooking(Booking $booking)
    {
        if ($booking->status !== 'confirmed') {
            return redirect()->back()->with('error', 'Only confirmed bookings can be marked as completed.');
        }

        $booking->update([
            'status' => 'completed',
            'completed_at' => now()
        ]);

        return redirect()->back()->with('success', 'Booking has been marked as completed successfully.');
    }

    // User Management Methods
    public function users()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function createUser()
    {
        return view('admin.users.create');
    }



    public function editUser(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function updateUser(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'required|in:user,admin',
        ]);

        $updateData = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'role' => $validated['role'],
        ];

        if (!empty($validated['password'])) {
            $updateData['password'] = bcrypt($validated['password']);
        }

        $user->update($updateData);

        return redirect()->route('admin.users.index')
            ->with('user_updated', 'User updated successfully.');
    }

    public function destroyUser(User $user)
    {
        if ($user->id === auth::id()) {
            return redirect()->route('admin.users.index')
                ->with('error', 'You cannot delete your own account.');
        }

        $user->delete();

        return redirect()->route('admin.users.index')
            ->with('user_deleted', 'User deleted successfully.');
    }
}
