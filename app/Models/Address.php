<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'detail_address', // consistency রাখার জন্য custom_address → detail_address
        'ward_id',
    ];

    // Address belongs to Ward
    public function ward()
    {
        return $this->belongsTo(Ward::class);
    }

    // Shortcut relations using safe navigation
    public function union()
    {
        return $this->ward?->union;
    }

    public function upazila()
    {
        return $this->ward?->union?->upazila;
    }

    public function district()
    {
        return $this->ward?->union?->upazila?->district;
    }

    public function division()
    {
        return $this->ward?->union?->upazila?->district?->division;
    }
}