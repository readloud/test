<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalGalleries = Gallery::count();
        $totalTestimonials = Testimonial::count();
        $pendingTestimonials = Testimonial::where('is_approved', false)->count();
        
        return view('admin.dashboard', compact('totalGalleries', 'totalTestimonials', 'pendingTestimonials'));
    }
}