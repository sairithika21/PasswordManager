<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMasterPassword extends Model
{
    use HasFactory;

    protected $fillable = [
		'user_id',
		'master_password',
		'master_password_hash',
    ];
}
