<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sale extends Model
{
    public function medicine()
    {
        return $this->belongsTo(medicine::class);
    }
}
