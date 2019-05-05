<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
       // Name table
       protected $table = 'cities', $fillable = ['name'];
       public $timestamps = false;
}
