<?php

namespace Database\Seeders;

use App\Models\Gallery;
use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Cek apakah data sudah ada sebelum insert
        if (Testimonial::count() == 0) {
            Testimonial::create([
                'name' => 'Sarah Wijaya',
                'device' => 'iPhone 11',
                'device_type' => 'iphone',
                'message' => 'Service sangat cepat dan profesional! iPhone 11 saya mati total, 1 hari sudah selesai. Terima kasih HP Service!',
                'rating' => 5,
                'is_approved' => true
            ]);
            
            Testimonial::create([
                'name' => 'Budi Santoso',
                'device' => 'Samsung S22 Ultra',
                'device_type' => 'android',
                'message' => 'Ganti LCD Samsung S22 Ultra, hasilnya sempurna seperti baru. Harga terjangkau dan garansi panjang.',
                'rating' => 5,
                'is_approved' => true
            ]);
            
            Testimonial::create([
                'name' => 'Linda Kartika',
                'device' => 'Xiaomi 12 Pro',
                'device_type' => 'android',
                'message' => 'Service battery Xiaomi 12 Pro, fast respon dan hasil memuaskan. Recommended banget!',
                'rating' => 5,
                'is_approved' => true
            ]);
        }
        
        // Sample Gallery Data
        if (Gallery::count() == 0) {
            // Note: Anda perlu mengupload gambar secara manual via admin panel
            // atau tambahkan gambar sample jika ada
        }
    }
}
