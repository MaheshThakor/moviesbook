<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theatre extends Model
{
    use HasFactory;
    protected $fillable = ['city_id','theatre_name','seats_no'];
    public $timestamps = false;
}
