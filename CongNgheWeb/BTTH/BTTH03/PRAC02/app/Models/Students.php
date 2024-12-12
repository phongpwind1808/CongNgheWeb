<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    public function classes()
    {
        return $this->belongsTo(Classes::class, 'class_id', 'id');
    }
}
