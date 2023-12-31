<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserEmail extends Model
{
    use HasFactory;

    protected $fillable = [
    	'user_id',
    	'email_id',
    	'email_provider_id',
    	'active'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
