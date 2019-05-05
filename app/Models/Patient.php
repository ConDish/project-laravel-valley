<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    // Name table
    protected $table = 'patients', $fillable = ['name', 'email', 'password', 'doctor_id', 'city_id'];
    public $timestamps = false;
}
