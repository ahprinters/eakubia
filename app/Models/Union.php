<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Union extends Model
{
    protected $fillable = ['name', 'upazila_id'];

    // Union belongs to Upazila
    public function upazila()
    {
        return $this->belongsTo(Upazila::class);
    }

    // একটি Union-এর অনেক Ward থাকে
    public function wards()
    {
        return $this->hasMany(Ward::class);
    }
}