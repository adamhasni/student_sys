<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $fillable = [
        'class_name',
        'level_id',
        'status',
    ];

    public function level()
    {
        return $this->hasOne('App\Level', 'id', 'level_id');
    }
}

