<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingsController extends Controller
{
    public function index(Request $request)
    {
        $query = Booking::with(['user', 'service']);

        // Apply status filter
        if ($request->status) {
            $query->where('status', $request->status);
        }

        // Apply payment status filter
        if ($request->payment_status) {
            $query->where('payment_status', $request->payment_status);
        }

        $bookings = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.bookings.index', compact('bookings'));
    }

    public function confirm($id)
    {
        $booking = Booking::findOrFail($id);

        if ($booking->status === 'pending') {
            $booking->update([
                'status' => 'confirmed',
                'confirmed_at' => now()
            ]);

            return redirect()->back()->with('success', 'Booking confirmed successfully.');
        }

        return redirect()->back()->with('error', 'Only pending bookings can be confirmed.');
    }
}
