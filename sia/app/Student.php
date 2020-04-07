<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public $incrementing = false;

    public function major()
    {
        return $this->belongsTo(Major::class);
    }
}
