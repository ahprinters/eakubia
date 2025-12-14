<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    protected $fillable = ['name', 'union_id'];

    // Ward belongs to Union
    public function union()
    {
        return $this->belongsTo(Union::class);
    }

    // একটি Ward-এর অনেক Address থাকতে পারে
    public function addresses()
    {
        return $this->hasMany(Address::class);
    }
}