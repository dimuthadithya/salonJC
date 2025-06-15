<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'full_name',
        'phone',
        'email',
        'service_category_id',
        'service_id',
        'appointment_date',
        'appointment_time',
        'stylist_id',
        'special_requirements',
        'base_price',
        'addons_price',
        'total_price',
        'status',
        'payment_status',
        'payment_method',
        'transaction_id',
        'confirmed_at'
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function category()
    {
        return $this->belongsTo(ServiceCategory::class, 'service_category_id');
    }
}
