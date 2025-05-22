<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Spbu extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'address',
        'city',
        'province',
        'postal_code',
        'phone',
        'email',
        'google_maps_embed',
        'established_year',
        'description',
        'is_active',
        'slug',
        'hero_image',
        'thumbnail_image',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'established_year' => 'integer',
    ];

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($spbu) {
            if (empty($spbu->slug)) {
                $spbu->slug = Str::slug($spbu->name);
            }
        });

        static::updating(function ($spbu) {
            if ($spbu->isDirty('name') && empty($spbu->slug)) {
                $spbu->slug = Str::slug($spbu->name);
            }
        });
    }

    /**
     * Get the team members for the SPBU.
     */
    public function teams(): HasMany
    {
        return $this->hasMany(Team::class)->orderBy('order');
    }

    /**
     * Get the facilities for the SPBU.
     */
    public function facilities(): HasMany
    {
        return $this->hasMany(Facility::class)->orderBy('order');
    }
}