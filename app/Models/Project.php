<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    protected $fillable = [
        'title', 'slug', 'client', 'short_description', 'description',
        'thumbnail', 'gallery', 'tags', 'url', 'completed_at',
        'is_featured', 'is_active', 'sort_order',
    ];

    protected $casts = [
        'gallery' => 'array',
        'tags' => 'array',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'completed_at' => 'date',
    ];

    protected static function booted(): void
    {
        static::creating(function (Project $project) {
            if (empty($project->slug)) {
                $project->slug = Str::slug($project->title);
            }
        });
    }
}
