<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $reviews = Feedback::with(['user', 'booking'])
            ->where('is_published', true)
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();

        return view('about', compact('reviews'));
    }
}
