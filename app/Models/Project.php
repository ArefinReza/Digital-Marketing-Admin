<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'images'];
    
    protected $casts = [
        'images' => 'array', // Ensures JSON is treated as array
    ];
    public function images()
    {
        return $this->hasMany(ProjectImage::class);
    }
}
