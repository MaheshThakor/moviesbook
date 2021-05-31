<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    use HasFactory;
    protected $fillable = ['name','image','bio','birth_date'];
    public $timestamps = false;

    public function movies()
    {
        return $this->belongsToMany(Movie::class,'casts');
    }
}
