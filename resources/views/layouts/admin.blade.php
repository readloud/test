<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - HP Service</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-gradient-to-b from-blue-800 to-purple-800 text-white">
            <div class="p-4">
                <h2 class="text-xl font-bold">Admin Panel</h2>
            </div>
            <nav class="mt-8">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 hover:bg-blue-700 transition">
                    <i class="fas fa-tachometer-alt w-6"></i>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('admin.galleries.index') }}" class="flex items-center px-4 py-3 hover:bg-blue-700 transition">
                    <i class="fas fa-images w-6"></i>
                    <span>Galeri</span>
                </a>
                <a href="{{ route('admin.testimonials.index') }}" class="flex items-center px-4 py-3 hover:bg-blue-700 transition">
                    <i class="fas fa-comments w-6"></i>
                    <span>Testimoni</span>
                </a>
                <a href="{{ route('admin.settings.index') }}" class="flex items-center px-4 py-3 hover:bg-blue-700 transition">
                    <i class="fas fa-cog w-6"></i>
                    <span>Pengaturan</span>
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex items-center px-4 py-3 hover:bg-blue-700 transition w-full">
                        <i class="fas fa-sign-out-alt w-6"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </nav>
        </div>
        
        <!-- Main Content -->
        <div class="flex-1 overflow-y-auto">
            <div class="p-6">
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif
                
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>