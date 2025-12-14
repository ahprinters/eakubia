<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
    protected $fillable = [
        'name',
        'relationship',
        'phone',
        'occupation',
        'yearly_income',
        'quantity_land',
        'family_member_count',
        'permanent_address',
        'current_address',
    ];
    public function students()
    {
      return $this->hasMany(Student::class);
    }
}
