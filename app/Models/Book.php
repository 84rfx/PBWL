<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'cover',
    ];

    public function getCoverUrlAttribute()
    {
        return $this->cover ? Storage::url($this->cover) : asset('images/default-cover.png');
    }
}
