<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Upazila extends Model
{
    protected $fillable = ['name', 'district_id'];

    // Upazila belongs to District
    public function district()
    {
        return $this->belongsTo(District::class);
    }

    // একটি Upazila-এর অনেক Union থাকে
    public function unions()
    {
        return $this->hasMany(Union::class);
    }
}