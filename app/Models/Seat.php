<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;
    protected $table = 'seat';
    public $timestamps = false;
    protected $fillable = ['row_number','seat_number','theatre_id'];
}
