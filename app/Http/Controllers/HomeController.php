<?php

namespace App\Http\Controllers;

use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Get active service categories
        $categories = ServiceCategory::where('status', true)->get();

        return view('home', compact('categories'));
    }
}
