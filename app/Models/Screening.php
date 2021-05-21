<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Screening extends Model
{
    use HasFactory;
    protected $table = 'screening';
    protected $fillable = ['theatre_id','movie_id','screening_time'];
    public $timestamps = false;
}
