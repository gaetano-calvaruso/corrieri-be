<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
        'tracking_code',
        'recipient_name',
        'recipient_surname',
        'pickup_point_id',
        'user_id',
        'status',
        'collected_at',
    ];

    protected function casts(): array
    {
        return [
            'collected_at' => 'datetime',
        ];
    }

    public function pickupPoint()
    {
        return $this->belongsTo(PickupPoint::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
