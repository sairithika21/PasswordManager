<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailProvider extends Model
{
    use HasFactory;

    protected $fillable = [
		'default',
		'company',
		'website',
		'free_version',
		'notes',
		'user_id',
		'email_domain',
    ];

}
