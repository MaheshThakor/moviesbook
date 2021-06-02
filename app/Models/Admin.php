<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $table = 'admin';
    protected $primaryKey = 'id';
    protected $fillable = ['user_name', 'first_name', 'last_name', 'email'];
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
