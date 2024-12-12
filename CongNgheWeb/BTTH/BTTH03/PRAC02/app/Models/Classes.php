<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $table = 'classes';

    public function students()
    {
        return $this->hasMany(Students::class, 'class_id', 'id');
    }
}
