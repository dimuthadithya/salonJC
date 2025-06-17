<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    public function create(Booking $booking)
    {
        // Check if user owns this booking
        if ($booking->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        // Check if booking is completed
        if ($booking->status !== 'completed') {
            return redirect()->route('dashboard')
                ->with('error', 'You can only review completed bookings.');
        }

        // Check if booking already has feedback
        if ($booking->feedback()->exists()) {
            return redirect()->route('dashboard')
                ->with('error', 'You have already submitted a review for this booking.');
        }

        return view('feedback.create', compact('booking'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|min:10|max:500'
        ]);

        // Get the booking
        $booking = Booking::findOrFail($validated['booking_id']);

        // Check if user owns this booking
        if ($booking->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        // Check if booking is completed
        if ($booking->status !== 'completed') {
            return redirect()->route('dashboard')
                ->with('error', 'You can only review completed bookings.');
        }

        // Check if booking already has feedback
        if ($booking->feedback()->exists()) {
            return redirect()->route('dashboard')
                ->with('error', 'You have already submitted a review for this booking.');
        }

        $feedback = new Feedback($validated);
        $feedback->user_id = Auth::id();
        $feedback->booking_id = $booking->id;
        $feedback->is_published = true; // Auto-publish reviews
        $feedback->save();

        return redirect()->route('dashboard')
            ->with('success', 'Thank you for your feedback!');
    }
}
