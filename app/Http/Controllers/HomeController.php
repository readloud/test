<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Testimonial;
use App\Models\Setting;

class HomeController extends Controller
{
    public function index()
    {
        $heroTitle = Setting::get('hero_title', 'Service HP Profesional');
        $heroSubtitle = Setting::get('hero_subtitle', 'Perbaikan 1 Hari Jadi');
        
        $phones = Gallery::where('is_active', true)
            ->whereIn('device_type', ['android', 'iphone', 'old_phone'])
            ->orderBy('order')
            ->take(8)
            ->get();
            
        $accessories = Gallery::where('is_active', true)
            ->where('device_type', 'accessory')
            ->orderBy('order')
            ->take(8)
            ->get();
            
        $spareparts = Gallery::where('is_active', true)
            ->where('device_type', 'sparepart')
            ->orderBy('order')
            ->take(8)
            ->get();
            
        $tools = Gallery::where('is_active', true)
            ->where('device_type', 'tool')
            ->orderBy('order')
            ->take(8)
            ->get();
            
        $processes = Gallery::where('is_active', true)
            ->where('device_type', 'process')
            ->orderBy('order')
            ->take(8)
            ->get();
            
        $testimonials = Testimonial::where('is_approved', true)
            ->orderBy('order')
            ->take(6)
            ->get();
            
        $whatsappNumber = Setting::get('whatsapp_number', '6281234567890');
        $email = Setting::get('email', 'info@hpservice.com');
        $phone = Setting::get('phone', '021-12345678');
        $address = Setting::get('address', 'Jl. Contoh No. 123, Jakarta');
        
        return view('home', compact(
            'heroTitle', 'heroSubtitle',
            'phones', 'accessories', 'spareparts', 'tools', 'processes',
            'testimonials', 'whatsappNumber', 'email', 'phone', 'address'
        ));
    }
}