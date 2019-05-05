<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    // Name table
    protected $table = 'doctors', $fillable = ['name'];
    public $timestamps = false;

}
