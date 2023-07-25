<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Password extends Model
{
    use HasFactory;

    protected $fillable = [
		'user_id',
		'company',
		'website_id',
		'email_id',
		'username',
		'password',
		'phone_no',
    ];
}
