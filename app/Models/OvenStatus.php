<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OvenStatus extends Model
{
    protected $table = 'oven_status';

    protected $fillable = ['batch_name', 'temperature', 'remaining_minutes', 'status'];
}
