<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $fillable = ['name', 'division_id'];

    // District belongs to Division
    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    // একটি District-এর অনেক Upazila থাকে
    public function upazilas()
    {
        return $this->hasMany(Upazila::class);
    }
}