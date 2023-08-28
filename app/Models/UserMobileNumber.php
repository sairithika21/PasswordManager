<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMobileNumber extends Model
{
    use HasFactory;

    protected $fillable = [
    	'user_id',
    	'country_code',
    	'mobile_number',
    	'active'
    ];

    public function user(){
    	return $this->belongsTo(User::class);
    }
}
