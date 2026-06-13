<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'HP Service Professional')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gradient-to-br from-blue-50 via-white to-purple-50">
    <!-- Navbar -->
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="container mx-auto px-4 py-3">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-2">
                    <i class="fas fa-microchip text-3xl text-blue-600"></i>
                    <span class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">HP Service</span>
                </div>
                
                <div class="hidden md:flex space-x-8">
                    <a href="#home" class="text-gray-700 hover:text-blue-600 transition">Beranda</a>
                    <a href="#services" class="text-gray-700 hover:text-blue-600 transition">Layanan</a>
                    <a href="#gallery" class="text-gray-700 hover:text-blue-600 transition">Galeri</a>
                    <a href="#testimonials" class="text-gray-700 hover:text-blue-600 transition">Testimoni</a>
                    <a href="#contact" class="text-gray-700 hover:text-blue-600 transition">Kontak</a>
                </div>
                
                <a href="https://wa.me/{{ $whatsappNumber ?? '6281234567890' }}" 
                   class="bg-green-500 text-white px-6 py-2 rounded-full hover:bg-green-600 transition flex items-center space-x-2">
                    <i class="fab fa-whatsapp"></i>
                    <span>WhatsApp</span>
                </a>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <!-- Floating WhatsApp -->
    <a href="https://wa.me/{{ $whatsappNumber ?? '6281234567890' }}" 
       class="fixed bottom-8 right-8 bg-green-500 text-white p-4 rounded-full shadow-lg hover:bg-green-600 transition z-50">
        <i class="fab fa-whatsapp text-2xl"></i>
    </a>

    <script>
        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth' });
                }
            });
        });
    </script>
</body>
</html>
```

**resources/views/home.blade.php**
```blade
@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section id="home" class="min-h-screen flex items-center relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-purple-600 opacity-90"></div>
        <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?ixlib=rb-4.0.3')] bg-cover bg-center mix-blend-overlay"></div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-3xl text-white">
                <h1 class="text-5xl md:text-6xl font-bold mb-6 animate__animated animate__fadeInUp">
                    {{ $heroTitle }}
                </h1>
                <p class="text-xl md:text-2xl mb-8 animate__animated animate__fadeInUp animate__delay-1s">
                    {{ $heroSubtitle }}
                </p>
                <div class="flex flex-wrap gap-4 animate__animated animate__fadeInUp animate__delay-2s">
                    <a href="#contact" 
                       class="bg-white text-blue-600 px-8 py-3 rounded-full font-semibold hover:shadow-lg transition transform hover:scale-105">
                        Konsultasi Gratis
                    </a>
                    <a href="#gallery" 
                       class="border-2 border-white text-white px-8 py-3 rounded-full font-semibold hover:bg-white hover:text-blue-600 transition">
                        Lihat Galeri
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Layanan Kami</h2>
                <div class="w-24 h-1 bg-gradient-to-r from-blue-600 to-purple-600 mx-auto"></div>
                <p class="text-gray-600 mt-4">Service cepat & berkualitas dengan garansi</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="group bg-gradient-to-br from-blue-50 to-purple-50 p-6 rounded-2xl shadow-lg hover:shadow-2xl transition transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center mb-4 group-hover:scale-110 transition">
                        <i class="fas fa-mobile-alt text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Service HP</h3>
                    <p class="text-gray-600">Semua merk HP (Android, iPhone, HP Jadul)</p>
                </div>
                
                <div class="group bg-gradient-to-br from-green-50 to-teal-50 p-6 rounded-2xl shadow-lg hover:shadow-2xl transition transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-green-600 rounded-full flex items-center justify-center mb-4 group-hover:scale-110 transition">
                        <i class="fas fa-microchip text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Ganti Sparepart</h3>
                    <p class="text-gray-600">Sparepart original & berkualitas</p>
                </div>
                
                <div class="group bg-gradient-to-br from-purple-50 to-pink-50 p-6 rounded-2xl shadow-lg hover:shadow-2xl transition transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-purple-600 rounded-full flex items-center justify-center mb-4 group-hover:scale-110 transition">
                        <i class="fas fa-tools text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Aksesoris & Tools</h3>
                    <p class="text-gray-600">Perlengkapan service lengkap</p>
                </div>
                
                <div class="group bg-gradient-to-br from-yellow-50 to-orange-50 p-6 rounded-2xl shadow-lg hover:shadow-2xl transition transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-yellow-600 rounded-full flex items-center justify-center mb-4 group-hover:scale-110 transition">
                        <i class="fas fa-clock text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">1 Hari Jadi</h3>
                    <p class="text-gray-600">Pengerjaan cepat & tepat waktu</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section id="gallery" class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Galeri</h2>
                <div class="w-24 h-1 bg-gradient-to-r from-blue-600 to-purple-600 mx-auto"></div>
            </div>
            
            <!-- Tabs -->
            <div x-data="{ activeTab: 'phones' }" class="mb-8">
                <div class="flex flex-wrap justify-center gap-2 mb-8">
                    <button @click="activeTab = 'phones'" 
                            :class="activeTab === 'phones' ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700'"
                            class="px-6 py-2 rounded-full font-semibold transition">
                        <i class="fas fa-mobile-alt mr-2"></i>HP
                    </button>
                    <button @click="activeTab = 'accessories'" 
                            :class="activeTab === 'accessories' ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700'"
                            class="px-6 py-2 rounded-full font-semibold transition">
                        <i class="fas fa-headphones mr-2"></i>Aksesoris
                    </button>
                    <button @click="activeTab = 'spareparts'" 
                            :class="activeTab === 'spareparts' ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700'"
                            class="px-6 py-2 rounded-full font-semibold transition">
                        <i class="fas fa-microchip mr-2"></i>Sparepart
                    </button>
                    <button @click="activeTab = 'tools'" 
                            :class="activeTab === 'tools' ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700'"
                            class="px-6 py-2 rounded-full font-semibold transition">
                        <i class="fas fa-tools mr-2"></i>Alat Kerja
                    </button>
                    <button @click="activeTab = 'process'" 
                            :class="activeTab === 'process' ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700'"
                            class="px-6 py-2 rounded-full font-semibold transition">
                        <i class="fas fa-cogs mr-2"></i>Proses Pengerjaan
                    </button>
                </div>
                
                <!-- Phones Gallery -->
                <div x-show="activeTab === 'phones'" x-transition>
                    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
                        @foreach($phones as $phone)
                        <div class="group relative overflow-hidden rounded-xl shadow-lg">
                            <img src="{{ $phone->image_url }}" alt="{{ $phone->title }}" 
                                 class="w-full h-64 object-cover transition transform group-hover:scale-110">
                            <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-0 group-hover:opacity-100 transition flex items-end">
                                <div class="p-4 text-white">
                                    <h3 class="font-semibold">{{ $phone->title }}</h3>
                                    <p class="text-sm">{{ $phone->description }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                
                <!-- Similar for other tabs -->
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Testimoni Pelanggan</h2>
                <div class="w-24 h-1 bg-gradient-to-r from-blue-600 to-purple-600 mx-auto"></div>
                <p class="text-gray-600 mt-4">Apa kata mereka tentang layanan kami</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($testimonials as $testimonial)
                <div class="bg-gradient-to-br from-gray-50 to-blue-50 p-6 rounded-2xl shadow-lg hover:shadow-xl transition">
                    <div class="flex items-center mb-4">
                        <img src="{{ $testimonial->photo_url }}" alt="{{ $testimonial->customer_name }}" 
                             class="w-16 h-16 rounded-full object-cover border-4 border-blue-600">
                        <div class="ml-4">
                            <h3 class="font-bold text-gray-800">{{ $testimonial->customer_name }}</h3>
                            <div class="flex text-yellow-400">
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="fas fa-star {{ $i <= $testimonial->rating ? 'text-yellow-400' : 'text-gray-300' }}"></i>
                                @endfor
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600 italic">"{{ $testimonial->message }}"</p>
                    @if($testimonial->device_type)
                        <p class="text-sm text-blue-600 mt-2">Device: {{ $testimonial->device_type }}</p>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20 bg-gradient-to-br from-blue-900 to-purple-900 text-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold mb-4">Hubungi Kami</h2>
                <div class="w-24 h-1 bg-white mx-auto"></div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <div>
                    <div class="space-y-6">
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center">
                                <i class="fab fa-whatsapp text-xl"></i>
                            </div>
                            <div>
                                <p class="font-semibold">WhatsApp</p>
                                <p class="text-blue-200">{{ $whatsappNumber }}</p>
                            </div>
                        </div>
                        
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center">
                                <i class="fas fa-envelope text-xl"></i>
                            </div>
                            <div>
                                <p class="font-semibold">Email</p>
                                <p class="text-blue-200">{{ $email }}</p>
                            </div>
                        </div>
                        
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center">
                                <i class="fas fa-phone text-xl"></i>
                            </div>
                            <div>
                                <p class="font-semibold">Telepon</p>
                                <p class="text-blue-200">{{ $phone }}</p>
                            </div>
                        </div>
                        
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center">
                                <i class="fas fa-map-marker-alt text-xl"></i>
                            </div>
                            <div>
                                <p class="font-semibold">Alamat</p>
                                <p class="text-blue-200">{{ $address }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div>
                    <form action="https://formspree.io/f/your-form-id" method="POST" class="space-y-4">
                        @csrf
                        <input type="text" name="name" placeholder="Nama Anda" 
                               class="w-full px-4 py-3 rounded-lg bg-white/10 border border-white/20 text-white placeholder-white/70 focus:outline-none focus:border-white">
                        <input type="email" name="email" placeholder="Email" 
                               class="w-full px-4 py-3 rounded-lg bg-white/10 border border-white/20 text-white placeholder-white/70 focus:outline-none focus:border-white">
                        <textarea name="message" rows="5" placeholder="Pesan" 
                                  class="w-full px-4 py-3 rounded-lg bg-white/10 border border-white/20 text-white placeholder-white/70 focus:outline-none focus:border-white"></textarea>
                        <button type="submit" 
                                class="bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold hover:shadow-lg transition w-full">
                            Kirim Pesan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-8">
        <div class="container mx-auto px-4 text-center">
            <p>&copy; 2024 HP Service Professional. All rights reserved.</p>
            <p class="text-gray-400 mt-2">Service HP 1 Hari Jadi - Cepat, Tepat, Berpengalaman</p>
        </div>
    </footer>
@endsection