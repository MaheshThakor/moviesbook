<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Screening extends Model
{
    use HasFactory;

    protected $table = 'screening';
    protected $fillable = ['theatre_id', 'movie_id', 'screening_time'];
    public $timestamps = false;

    public function theatres()
    {
        return $this->belongsToMany(Screening::class);
    }

    public function movies()
    {
        return $this->belongsToMany(Screening::class);
    }
}
