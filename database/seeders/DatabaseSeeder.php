<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create categories
        $categories = [
            ['name' => 'Smartphone', 'slug' => 'smartphone', 'type' => 'phone'],
            ['name' => 'iPhone', 'slug' => 'iphone', 'type' => 'phone'],
            ['name' => 'HP Jadul', 'slug' => 'old-phone', 'type' => 'phone'],
            ['name' => 'Aksesoris', 'slug' => 'accessories', 'type' => 'accessory'],
            ['name' => 'Sparepart', 'slug' => 'sparepart', 'type' => 'accessory'],
            ['name' => 'Alat Kerja', 'slug' => 'tools', 'type' => 'tool'],
            ['name' => 'Proses', 'slug' => 'process', 'type' => 'process'],
        ];
        
        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}