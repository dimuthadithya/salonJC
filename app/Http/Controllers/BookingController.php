<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\Specialist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        $categories = ServiceCategory::all();
        $selectedCategory = null;
        $selectedService = null;
        $services = collect();

        // If category is selected, get its services
        if ($request->has('serviceCategory')) {
            $selectedCategory = ServiceCategory::find($request->serviceCategory);
            if ($selectedCategory) {
                $services = Service::where('category_id', $selectedCategory->id)->get();
            }
        }

        // If service is specified in URL
        if ($request->has('service')) {
            $selectedService = Service::find($request->service);
            if ($selectedService) {
                $selectedCategory = $selectedService->category;
                $services = Service::where('category_id', $selectedCategory->id)->get();
            }
        }

        $timeSlots = $this->getTimeSlots();
        return view('booking', compact(
            'categories',
            'services',
            'timeSlots',
            'selectedService',
            'selectedCategory'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fullName' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email',
            'serviceCategory' => 'required|exists:service_categories,id',
            'service' => 'required|exists:services,id',
            'appointmentDate' => 'required|date|after_or_equal:today',
            'appointmentTime' => 'required',
            'termsAccept' => 'required|accepted'
        ]);

        // Get authenticated user
        $user = Auth::user();

        $service = Service::findOrFail($request->service);
        $basePrice = $service->price;
        $serviceFee = $basePrice * 0.03; // 3% service fee
        $totalPrice = $basePrice + $serviceFee;

        $booking = Booking::create([
            'user_id' => $user ? $user->id : null,
            'full_name' => $request->fullName,
            'phone' => $request->phone,
            'email' => $request->email,
            'service_category_id' => $request->serviceCategory,
            'service_id' => $request->service,
            'appointment_date' => $request->appointmentDate,
            'appointment_time' => $request->appointmentTime,
            'stylist_id' => null,
            'special_requirements' => $request->requirements,
            'base_price' => $basePrice,
            'addons_price' => $serviceFee,
            'total_price' => $totalPrice,
            'status' => 'pending',
            'payment_status' => 'pending'
        ]);

        // Redirect to payment page with booking ID
        return redirect()->route('booking.payment', $booking->id);
    }

    private function getTimeSlots()
    {
        $slots = [];
        $start = strtotime('09:00');
        $end = strtotime('20:00');
        $interval = 30 * 60; // 30 minutes

        for ($time = $start; $time <= $end; $time += $interval) {
            $slots[] = date('H:i', $time);
        }

        return $slots;
    }

    public function showPayment($id)
    {
        $booking = Booking::findOrFail($id);

        // Only show payment page for pending payments
        if ($booking->payment_status !== 'pending') {
            return redirect()->route('dashboard')
                ->with('error', 'This booking has already been paid for.');
        }

        return view('booking.payment', compact('booking'));
    }

    public function processPayment(Request $request, $id)
    {
        $request->validate([
            'card_number' => 'required|string|size:16',
            'card_expiry' => 'required|string|size:5', // MM/YY format
            'card_cvv' => 'required|string|size:3',
            'card_holder' => 'required|string|max:255',
        ]);

        $booking = Booking::findOrFail($id);

        // Only process pending payments
        if ($booking->payment_status !== 'pending') {
            return redirect()->route('dashboard')
                ->with('error', 'This booking has already been paid for.');
        }

        // In a real application, you would process the payment with a payment gateway here
        // For this example, we'll simulate a successful payment
        $booking->update([
            'payment_status' => 'paid',
            'payment_method' => 'credit_card',
            'transaction_id' => 'TXN_' . uniqid(),
            'status' => 'confirmed',
            'confirmed_at' => now()
        ]);

        return redirect()->route('booking.payment.success', $booking->id);
    }

    public function paymentSuccess($id)
    {
        $booking = Booking::findOrFail($id);
        return view('booking.success', compact('booking'));
    }
}
