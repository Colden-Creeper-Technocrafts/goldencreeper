<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobPosting extends Model
{
    protected $fillable = [
        'title', 'department', 'location', 'type',
        'short_description', 'description', 'requirements',
        'is_active', 'expires_at',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'expires_at' => 'datetime',
    ];
}
