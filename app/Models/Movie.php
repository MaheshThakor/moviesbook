<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'poster', 'runtime', 'overview', 'release_year', 'is_popular', 'is_trending'];
    public $timestamps = false;

    public function actors()
    {
        return $this->belongsToMany(Actor::class, 'casts');
    }

    public function theatres()
    {
        return $this->belongsToMany(Theatre::class, 'screening');
    }
}
