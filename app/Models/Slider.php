<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Slider extends Model
{
    protected $guarded = [];

    public function getBannerUrlAttribute()
    {
        return Storage::disk('cloudinary')->url($this->banner_public_id) ?? null;
    }

    protected $casts = [
        'status' => 'boolean',
    ];
}
