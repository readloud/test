<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::orderBy('order')->paginate(15);
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:1024',
            'message' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'device_type' => 'nullable|string',
            'order' => 'integer'
        ]);

        if ($request->hasFile('customer_photo')) {
            $photoPath = $request->file('customer_photo')->store('testimonials', 'public');
        }

        Testimonial::create([
            'customer_name' => $request->customer_name,
            'customer_photo' => $photoPath ?? null,
            'message' => $request->message,
            'rating' => $request->rating,
            'device_type' => $request->device_type,
            'is_approved' => $request->has('is_approved'),
            'order' => $request->order ?? 0
        ]);

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimoni berhasil ditambahkan');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:1024',
            'message' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'device_type' => 'nullable|string',
            'order' => 'integer'
        ]);

        if ($request->hasFile('customer_photo')) {
            $photoPath = $request->file('customer_photo')->store('testimonials', 'public');
            $testimonial->customer_photo = $photoPath;
        }

        $testimonial->customer_name = $request->customer_name;
        $testimonial->message = $request->message;
        $testimonial->rating = $request->rating;
        $testimonial->device_type = $request->device_type;
        $testimonial->is_approved = $request->has('is_approved');
        $testimonial->order = $request->order ?? 0;
        $testimonial->save();

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimoni berhasil diupdate');
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        return redirect()->route('admin.testimonials.index')->with('success', 'Testimoni berhasil dihapus');
    }

    public function approve(Testimonial $testimonial)
    {
        $testimonial->is_approved = true;
        $testimonial->save();
        
        return redirect()->back()->with('success', 'Testimoni berhasil disetujui');
    }
}