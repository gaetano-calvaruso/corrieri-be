<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PickupPoint extends Model
{
    protected $fillable = [
        'courier',
        'name',
        'address',
        'city',
        'province',
        'postal_code',
        'lat',
        'lon',
        'phone',
        'opening_hours',
        'active',
    ];

    protected function casts(): array
    {
        return [
            'lat' => 'float',
            'lon' => 'float',
            'active' => 'boolean',
        ];
    }

    public function packages()
    {
        return $this->hasMany(Package::class);
    }

    public function favoritedByUsers()
    {
        return $this->belongsToMany(User::class, 'favorites');
    }
}
