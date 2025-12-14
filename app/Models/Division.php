<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    protected $fillable = ['name'];

    // একটি Division-এর অনেক District থাকে
    public function districts()
    {
        return $this->hasMany(District::class);
    }
}