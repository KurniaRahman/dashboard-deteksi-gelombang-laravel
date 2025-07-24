<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BacaSensor extends Model
{
    protected $fillable = ['pitch', 'roll', 'pressure', 'altitude', 'current', 'temperature'];
}
