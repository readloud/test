<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::with('category')->orderBy('order')->paginate(15);
        return view('admin.galleries.index', compact('galleries'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.galleries.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|exists:categories,id',
            'device_type' => 'required|in:android,iphone,old_phone,accessory,sparepart,tool,process',
            'order' => 'integer',
            'is_active' => 'boolean'
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('galleries', 'public');
        }

        Gallery::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
            'category_id' => $request->category_id,
            'device_type' => $request->device_type,
            'order' => $request->order ?? 0,
            'is_active' => $request->has('is_active')
        ]);

        return redirect()->route('admin.galleries.index')->with('success', 'Galeri berhasil ditambahkan');
    }

    public function edit(Gallery $gallery)
    {
        $categories = Category::all();
        return view('admin.galleries.edit', compact('gallery', 'categories'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|exists:categories,id',
            'device_type' => 'required|in:android,iphone,old_phone,accessory,sparepart,tool,process',
            'order' => 'integer',
            'is_active' => 'boolean'
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('galleries', 'public');
            $gallery->image = $imagePath;
        }

        $gallery->title = $request->title;
        $gallery->description = $request->description;
        $gallery->category_id = $request->category_id;
        $gallery->device_type = $request->device_type;
        $gallery->order = $request->order ?? 0;
        $gallery->is_active = $request->has('is_active');
        $gallery->save();

        return redirect()->route('admin.galleries.index')->with('success', 'Galeri berhasil diupdate');
    }

    public function destroy(Gallery $gallery)
    {
        $gallery->delete();
        return redirect()->route('admin.galleries.index')->with('success', 'Galeri berhasil dihapus');
    }
}