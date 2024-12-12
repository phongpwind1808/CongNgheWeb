<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class issue extends Model
{
    public function computers()
    {
        return $this->belongsTo(computer::class);
    }
}
