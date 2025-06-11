<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Specialist extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'bio',
        'image_path',
        'status'
    ];

    protected $casts = [
        'status' => 'boolean'
    ];

    public function services(): BelongsToMany
    {
        return $this->belongsToMany(Service::class, 'service_specialist_mapping');
    }
}
