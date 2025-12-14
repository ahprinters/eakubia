<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name',
    'email',
    'class',
    'phone',
    'address',
    'date_of_birth',
    'gender',
    'is_active',

    ];

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
    public function fees()
    {
        return $this->hasMany(Fee::class);
    }
    public function address()
    {
        return $this->hasOne(Address::class);
    }
    public function guardian()
    {
        return $this->belongsTo(Guardian::class);
    }

}
