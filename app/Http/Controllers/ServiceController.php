<?php

namespace App\Http\Controllers;

use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $categories = ServiceCategory::with(['services' => function ($query) {
            $query->with('images')->where('status', true);
        }])->where('status', true)->get();

        return view('services', compact('categories'));
    }
}
