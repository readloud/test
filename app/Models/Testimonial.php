<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name', 'customer_photo', 'message', 
        'rating', 'device_type', 'is_approved', 'order'
    ];

    protected $casts = [
        'is_approved' => 'boolean',
        'rating' => 'integer',
    ];

    public function getPhotoUrlAttribute()
    {
        if ($this->customer_photo) {
            return asset('storage/' . $this->customer_photo);
        }
        return asset('images/default-avatar.png');
    }
}