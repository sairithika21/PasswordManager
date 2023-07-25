<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devicesandlocation extends Model
{
    use HasFactory;
    protected $fillable = [
            'user_id',
            'ip_address',
            'location',
            'device_type',
            'active'

            ];
} 
