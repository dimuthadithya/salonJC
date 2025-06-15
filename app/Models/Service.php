<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'features',
        'duration',
        'price',
        'category_id',
        'status'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'duration' => 'integer',
        'status' => 'boolean',
        'features' => 'array'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(ServiceCategory::class, 'category_id');
    }

    public function images(): HasMany
    {
        return $this->hasMany(ServiceImage::class);
    }

    public function specialists(): BelongsToMany
    {
        return $this->belongsToMany(Specialist::class, 'service_specialist_mapping');
    }

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }
}
