<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $fillable = [
	    'user_id',
		'line_no',
		'street',
		'county',
		'state',
		'country',
		'zipcode',
    ];
}
