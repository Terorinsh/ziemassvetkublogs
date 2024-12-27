<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'content', 'image_path', 'published_at', 'is_active'];
    public function getImagePathAttribute($value)
    {
        if ($value) {
            return asset('storage/' . $value); 
        }
        return null; 
    }
    use HasFactory;
}
