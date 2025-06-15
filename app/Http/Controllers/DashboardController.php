<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Get upcoming appointments
        $upcomingAppointments = Booking::where('user_id', $user->id)
            ->whereIn('status', ['pending', 'confirmed'])
            ->where('appointment_date', '>=', now()->format('Y-m-d'))
            ->orderBy('appointment_date')
            ->orderBy('appointment_time')
            ->with(['service', 'category'])
            ->get();

        // Get past appointments
        $pastAppointments = Booking::where('user_id', $user->id)
            ->where(function ($query) {
                $query->where('appointment_date', '<', now()->format('Y-m-d'))
                    ->orWhere('status', 'completed');
            })
            ->orderBy('appointment_date', 'desc')
            ->orderBy('appointment_time', 'desc')
            ->with(['service', 'category'])
            ->get();

        // Calculate total spent amount (only from completed and paid appointments)
        $totalSpent = Booking::where('user_id', $user->id)
            ->where('status', 'completed')
            ->where('payment_status', 'paid')
            ->sum('total_price');

        // Get completed sessions count
        $completedSessions = Booking::where('user_id', $user->id)
            ->where('status', 'completed')
            ->count();

        // Get cancelled appointments count
        $cancelledAppointments = Booking::where('user_id', $user->id)
            ->where('status', 'cancelled')
            ->count();

        return view('dashboard', compact(
            'user',
            'upcomingAppointments',
            'pastAppointments',
            'totalSpent',
            'completedSessions',
            'cancelledAppointments'
        ));
    }
}
