@extends('layouts.admin')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl p-6 text-white shadow-lg">
        <div class="flex justify-between items-center">
            <div>
                <p class="text-blue-100">Total Galeri</p>
                <h3 class="text-3xl font-bold">{{ $totalGalleries }}</h3>
            </div>
            <i class="fas fa-images text-4xl text-blue-200"></i>
        </div>
    </div>
    
    <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-xl p-6 text-white shadow-lg">
        <div class="flex justify-between items-center">
            <div>
                <p class="text-green-100">Total Testimoni</p>
                <h3 class="text-3xl font-bold">{{ $totalTestimonials }}</h3>
            </div>
            <i class="fas fa-comments text-4xl text-green-200"></i>
        </div>
    </div>
    
    <div class="bg-gradient-to-br from-yellow-500 to-yellow-600 rounded-xl p-6 text-white shadow-lg">
        <div class="flex justify-between items-center">
            <div>
                <p class="text-yellow-100">Testimoni Pending</p>
                <h3 class="text-3xl font-bold">{{ $pendingTestimonials }}</h3>
            </div>
            <i class="fas fa-clock text-4xl text-yellow-200"></i>
        </div>
    </div>
</div>

<div class="mt-8 bg-white rounded-xl shadow-lg p-6">
    <h3 class="text-xl font-bold mb-4">Quick Actions</h3>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <a href="{{ route('admin.galleries.create') }}" 
           class="bg-blue-600 text-white text-center py-3 rounded-lg hover:bg-blue-700 transition">
            <i class="fas fa-plus mr-2"></i>Tambah Galeri
        </a>
        <a href="{{ route('admin.testimonials.create') }}" 
           class="bg-green-600 text-white text-center py-3 rounded-lg hover:bg-green-700 transition">
            <i class="fas fa-plus mr-2"></i>Tambah Testimoni
        </a>
        <a href="{{ route('admin.settings.index') }}" 
           class="bg-purple-600 text-white text-center py-3 rounded-lg hover:bg-purple-700 transition">
            <i class="fas fa-cog mr-2"></i>Pengaturan
        </a>
    </div>
</div>
@endsection