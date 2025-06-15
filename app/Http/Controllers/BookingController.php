<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\Specialist;
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

        $stylists = Specialist::all();
        $timeSlots = $this->getTimeSlots();

        return view('booking', compact(
            'categories',
            'services',
            'stylists',
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

        $service = Service::findOrFail($request->service);

        $booking = Booking::create([
            'full_name' => $request->fullName,
            'phone' => $request->phone,
            'email' => $request->email,
            'service_category_id' => $request->serviceCategory,
            'service_id' => $request->service,
            'appointment_date' => $request->appointmentDate,
            'appointment_time' => $request->appointmentTime,
            'stylist_id' => $request->stylist,
            'special_requirements' => $request->requirements,
            'base_price' => $service->price,
            'addons_price' => 0,
            'total_price' => $service->price,
            'status' => 'pending',
            'payment_status' => 'pending'
        ]);

        return redirect()->route('dashboard')
            ->with('success', 'Your appointment has been booked successfully! We will confirm your booking shortly.');
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
}
